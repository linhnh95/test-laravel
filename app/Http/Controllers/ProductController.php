<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Repositories\BrandRepository;
use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public $productRepository;
    public $brandRepository;
    public $imageRepository;

    public function __construct(
        ProductRepository $productRepository,
        BrandRepository   $brandRepository,
        ImageRepository   $imageRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        $products = Cache::get('products');
        if (!$products) {
            $products = $this->productRepository->getProducts(['brand', 'images']);
            Cache::put('products', $products);
        }
        return view('products.product-list', [
            'products' => $products
        ]);
    }

    public function show($id)
    {
        $product = $this->productRepository->findProduct($id);
        if (!$product) {
            abort(404);
        }
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
        $products = $this->productRepository->getProducts(['brand', 'images']);
        return view('manage.product-manage', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $brands = $this->brandRepository->getBrands();
        return view('manage.product-create', [
            'brands' => $brands
        ]);
    }

    public function store(CreateProductRequest $request)
    {
        $params = $request->validated();
        $images = $request->file('images');
        unset($params['images']);
        $product = $this->productRepository->createProduct($params);
        $this->imageRepository->createImages($product, $images);
        Cache::forget('products');
        return redirect('/manage');
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProduct($id);
        if (!$product) {
            abort(404);
        }
        $brands = $this->brandRepository->getBrands();
        return view('manage.product-update', [
            'product' => $product,
            'brands' => $brands
        ]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $params = $request->validated();
        $images = $request->file('images');
        unset($params['images']);
        $product = $this->productRepository->updateProduct($id, $params);
        $this->imageRepository->updateImages($product, $images);
        Cache::forget('products');
        return back()->with('success', 'Update product successfully');
    }

    public function delete($id)
    {
        $this->productRepository->deleteProduct($id);
        $this->imageRepository->deleteImageByProduct($id);
        Cache::forget('products');
        return redirect('/manage');
    }
}
