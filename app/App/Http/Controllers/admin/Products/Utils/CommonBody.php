<?php

namespace App\Http\Controllers\Admin\Products\Utils;

use App\Models\Products\Products;

class CommonBody {

    private $product;

    public function __construct() {

        $this->product = [];

    }

    public function create(Products $products): array {

        $this->set_id('id', $products);
        $this->set_title('title', $products);
        $this->set_slug('slug', $products);
        $this->set_name('name', $products);
        $this->set_content('content', $products);

        return $this->product;
    }

    private function get_id($key, $product): int {
        return (int) $product->{$key};
    }

    private function get_title($key, $product): string {
        return $product->{$key};
    }

    private function get_slug($key, $product): string {
        return $product->{$key};
    }

    private function get_name($key, $product): string {
        return $product->{$key};
    }

    private function get_content($key, $product): string {
        return $product->{$key};
    }

    private function set_id($key, $product): void {
        $this->product[$product->id][$key] = $this->get_id($key, $product);
    }

    private function set_title($key, $product): void {
        $this->product[$product->id][$key] = $this->get_title($key, $product);
    }

    private function set_slug($key, $product): void {
        $this->product[$product->id][$key] = $this->get_slug($key, $product);
    }

    private function set_name($key, $product): void {
        $this->product[$product->id][$key] = $this->get_name($key, $product);
    }

    private function set_content($key, $product): void {
        $this->product[$product->id][$key] = $this->get_content($key, $product);
    }
}
