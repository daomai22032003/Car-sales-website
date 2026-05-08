<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\ProductImage; // nhớ import

class Product extends Model
{
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function specs()
    {
        return $this->hasMany(ProductSpec::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function exteriorImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id')
                    ->where('type', 'exterior');
    }

    public function interiorImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id')
                    ->where('type', 'interior');
    }
    public function colors()
    {
        return $this->hasMany(ProductColor::class);
        
    }
    
}