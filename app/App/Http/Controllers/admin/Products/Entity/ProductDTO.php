<?php

namespace App\Http\Controllers\Admin\Products\Entity;

use App\Models\Products\Products;

class ProductDTO
{
    /**
     * @var int
     */
    public int $id;
    /**
     * @var string
     */
    public string $title;
    /**
     * @var string
     */
    public string $slug;
    /**
     * @var string
     */
    public string $name;
    /**
     * @var string
     */
    public string $content;

    public function __construct(Products $products)
    {
        $this->setId($products->id);
        $this->setTitle($products->title);
        $this->setSlug($products->slug);
        $this->setName($products->name);
        $this->setContent($products->content);
    }

    /**
     * @param int $id
     */
    private function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    private function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $slug
     */
    private function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $content
     */
    private function setContent(string $content): void
    {
        $this->content = $content;
    }
}
