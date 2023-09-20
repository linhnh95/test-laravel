<?php

namespace Tests\Unit;

use App\Models\Brand;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Faker\Factory as Faker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    protected $faker;
    protected $product;
    protected $productRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $brand = Brand::factory(1)->create();
        $this->product = [
            'brand_id' => $brand[0]->id,
            'name' => $this->faker->name,
            'price' => $this->faker->randomNumber(3),
            'description' => $this->faker->name
        ];
        $this->productRepository = new ProductRepository();
    }

    public function testCreateProduct(): void
    {
        $product = $this->productRepository->createProduct($this->product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->product['name'], $product->name);
        $this->assertEquals($this->product['price'], $product->price);
        $this->assertEquals($this->product['description'], $product->description);
    }

    public function testFindProduct(): void
    {
        $product = $this->productRepository->createProduct($this->product);
        $found = $this->productRepository->findProduct($product->id);
        $this->assertInstanceOf(Product::class, $found);
        $this->assertEquals($found->name, $product->name);
        $this->assertEquals($found->price, $product->price);
        $this->assertEquals($found->description, $product->description);
    }

    public function testUpdateProduct(): void
    {
        $product = $this->productRepository->createProduct($this->product);
        $newData = [
            'name' => 'Test 1',
            'price' => 10,
            'description' => 'Test 1'
        ];
        $newProduct = $this->productRepository->updateProduct($product->id, $newData);
        $this->assertInstanceOf(Product::class, $newProduct);
        $this->assertEquals($newProduct->name, $newData['name']);
        $this->assertEquals($newProduct->price, $newData['price']);
        $this->assertEquals($newProduct->description, $newData['description']);
    }

    public function testDeleteProduct(): void
    {
        $product = $this->productRepository->createProduct($this->product);
        $this->productRepository->deleteProduct($product->id);
        $found = $this->productRepository->findProduct($product->id);
        $this->assertNull($found);
    }
}
