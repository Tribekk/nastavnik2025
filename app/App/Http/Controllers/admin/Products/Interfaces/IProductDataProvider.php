<?php

namespace App\Http\Controllers\Admin\Products\Interfaces;

use App\Http\Controllers\Admin\Products\Entity\ProductDTO;
use Illuminate\Http\Request;

interface IProductDataProvider
{
    /**
     * @param int $num
     * @return array
     */
    public function getLatestProducts(int $num): array;

    /**
     * @param int $id
     * @return ?ProductDTO
     */
    public function showProductById(int $id): ?ProductDTO;

    /**
     * @param Request $request
     * @return bool
     */
    public function saveProduct(Request $request): bool;

    /**
     * @param Request $request
     * @param int $id
     * @return bool
     */
    public function updateProduct(Request $request, int $id): bool;
}
