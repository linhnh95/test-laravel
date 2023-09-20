<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ImageRepository
{
    public function createImages(Product $product, $images)
    {
        $insert = $this->storageImages($product, $images);
        Image::insert($insert);
    }

    public function updateImages(Product $product, $images)
    {
        Image::where('product_id', $product->id)->delete();
        $insert = $this->storageImages($product, $images);
        Image::insert($insert);
    }

    public function deleteImageByProduct($productId)
    {
        Image::where('product_id', $productId)->delete();
    }

    private function storageImages($product, $images)
    {
        $insert = [];
        $i = 0;
        foreach ($images as $image) {
            $name = time() . rand(1, 100) . '.' . $image->extension();
            Storage::disk('public')->putFileAs('files', $image, $name);
            $insert[] = [
                'product_id' => $product->id,
                'is_main' => $i <= 0,
                'link' => asset('storage/files/' . $name),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $i++;
        }
        return $insert;
    }
}
