<?php

namespace App\Http\Controllers\Admin\Products\Interfaces;

use App\Http\Controllers\Admin\Products\Entity\ProductDTO;
use Illuminate\Http\Request;

interface IProductRepository
{
    /**
     * @param int $count
     * @return ProductDTO[]
     */
    public function getLatest(int $count): array;

    /**
     * @param int $id
     * @return ?ProductDTO
     */
    public function getProductById(int $id): ?ProductDTO;

    /**
     * @param Request $request
     * @return bool
     */
    public function save(Request $request): bool;

    /**
     * @param Request $request
     * @param int $id
     * @return bool
     */
    public function update(Request $request, int $id): bool;
}
