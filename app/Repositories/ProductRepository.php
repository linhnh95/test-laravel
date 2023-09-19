<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function findProduct(int $id)
    {
        $product = Product::with(['brand', 'images'])->where('id', $id)->first();
        if (!$product) {
            abort(404);
        }
        return $product;
    }

    public function getProducts()
    {
        return Product::all();
    }
}
