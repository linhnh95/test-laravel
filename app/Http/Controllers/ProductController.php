<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    public $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index($id)
    {
        $product = $this->productRepository->findProduct($id);
        $images = $product->images;
        $mainImage = $images->first(function ($image) {
            return $image->is_main === 1;
        });
        $thumbnails = $images->reject(function ($image) {
            return $image->is_main === 1;
        });
        return view('products.product-detail', [
            'product' => $product,
            'mainImage' => $mainImage,
            'thumbnails' => $thumbnails
        ]);
    }

    public function manage()
    {
        $products = $this->productRepository->getProducts();
        return view('manage.product-manage', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('manage.product-create');
    }
}
