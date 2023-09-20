<?php

namespace App\Repositories;

use App\Models\Brand;

class BrandRepository
{
    public function getBrands()
    {
        return Brand::all();
    }
}
