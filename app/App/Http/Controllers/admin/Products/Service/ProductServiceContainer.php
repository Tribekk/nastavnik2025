<?php

namespace App\Http\Controllers\Admin\Products\Service;

use App\Http\Controllers\Admin\Products\DataProvider\ProductDataProvider;
use App\Http\Controllers\Admin\Products\Interfaces\IProductDataProvider;
use App\Http\Controllers\Admin\Products\Repository\ProductRepository;


class ProductServiceContainer
{
    public static function factory(): IProductDataProvider
    {
        $repository = new ProductRepository();
        return new ProductDataProvider($repository);
    }
}
