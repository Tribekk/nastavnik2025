<?php

namespace App\Http\Controllers\Admin\Products\DataProvider;

use App\Http\Controllers\Admin\Products\Entity\ProductDTO;
use App\Http\Controllers\Admin\Products\Interfaces\IProductDataProvider;
use App\Http\Controllers\Admin\Products\Interfaces\IProductRepository;
use Illuminate\Http\Request;

class ProductDataProvider implements IProductDataProvider
{
    /**
     * @var IProductRepository
     */
    private IProductRepository $repository;

    public function __construct(IProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $num
     * @return ProductDTO[]
     */
    public function getLatestProducts(int $num): array
    {
        return $this->repository->getLatest($num);
    }

    /**
     * @param int $id
     * @return ?ProductDTO
     */
    public function showProductById(int $id): ?ProductDTO
    {
        return $this->repository->getProductById($id);
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function saveProduct(Request $request): bool
    {
        return $this->repository->save($request);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return bool
     */
    public function updateProduct(Request $request, int $id): bool
    {
        return $this->repository->update($request, $id);
    }
}
