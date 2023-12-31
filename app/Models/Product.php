<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['main_image'];

    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function getMainImageAttribute()
    {
        $images = $this->images() ?? [];
        if (empty($images)) {
            return "";
        }
        return $images->where('is_main', 1)->first();
    }
}
