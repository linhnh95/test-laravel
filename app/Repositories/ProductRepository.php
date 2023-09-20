<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function findProduct(int $id)
    {
        return Product::with(['brand', 'images'])->where('id', $id)->first();
    }

    public function getProducts(array $relations = [])
    {
        return Product::with($relations)->orderBy('id', 'DESC')->get();
    }

    public function createProduct(array $params = [])
    {
        return Product::create($params);
    }

    public function updateProduct(int $id, array $params = [])
    {
        $product = Product::find($id);
        foreach ($params as $key => $value) {
            $product->$key = $value;
        }
        $product->save();
        return $product;
    }

    public function deleteProduct(int $id)
    {
        Product::where('id', $id)->delete();
    }
}
