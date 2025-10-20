<?php

namespace App\Http\Controllers\Admin\Products\Repository;

use App\Http\Controllers\Admin\Products\Entity\ProductDTO;
use App\Http\Controllers\Admin\Products\Interfaces\IProductRepository;
use App\Models\Products\Products;
use Illuminate\Http\Request;

class ProductRepository implements IProductRepository
{
    /**
     * @param int $count
     * @return ProductDTO[]
     */
    public function getLatest(int $count): array
    {
        $products = Products::latest()->paginate($count);
        $data = [];
        foreach ($products as $product) {
            $itemProduct = new ProductDTO($product);
            $data[] = $itemProduct;
        }

        return $data;
    }

    /**
     * @param int $id
     * @return ProductDTO|null
     */
    public function getProductById(int $id): ?ProductDTO
    {
        $product = Products::where('id', $id)->first();

        if ($product === null) {
            return null;
        }

        return new ProductDTO($product);
    }

    public function save(Request $request): bool
    {
        try {
            $request->validate([
                'title' => 'required',
                'name' => 'required',
                'slug' => 'required',
            ]);

            Products::create($request->all());

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return bool
     */
    public function update(Request $request, int $id): bool
    {
        try {
            $params = [
                'title'   => $request->get('title'),
                'name'    => $request->get('name'),
                'content' => $request->get('content'),
                'slug'    => $request->get('slug')
            ];

            $product = Products::find($id);
            $product->fill($params);
            $product->save();

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }
}
