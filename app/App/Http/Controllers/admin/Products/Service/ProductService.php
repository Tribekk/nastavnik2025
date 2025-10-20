<?php


namespace App\Http\Controllers\Admin\Products\Service;

use App\Http\Controllers\Admin\Products\Repository\ProductRepository;
use App\Http\Controllers\Admin\Products\Utils\CommonBody;
use App\Http\Controllers\Admin\Products\Utils\ListBody;

class ProductService {

    private $productRepository;
    private $productCreateBody;
    private $productsListBody;

    public function __construct(ProductRepository $productRepository,
                                CommonBody $productCreateBody,
                                ListBody $productsListBody) {

        $this->productRepository = $productRepository;
        $this->productCreateBody = $productCreateBody;
        $this->productsListBody = $productsListBody;

    }

    public function latest(int $numLatest): array
    {
        $products = $this->productRepository->getLatest($numLatest);

        return $this->productsListBody->create($products);
    }

}
