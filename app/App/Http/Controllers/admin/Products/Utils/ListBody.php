<?php

namespace App\Http\Controllers\Admin\Products\Utils;

class ListBody {

    private $product;

    public function __construct() {

        $this->product = [];

    }

    public function create($products): array {

        foreach ($products as $product) {
            $this->set_id('id', $product);
            $this->set_title('title', $product);
            $this->set_slug('slug', $product);
            $this->set_name('name', $product);
            $this->set_content('content', $product);
        }

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
