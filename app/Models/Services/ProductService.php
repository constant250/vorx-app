<?php

namespace App\Models\Services;

use App\Models\Product;

class ProductService extends ModelService
{
    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->model = $product;
    }

   
}
