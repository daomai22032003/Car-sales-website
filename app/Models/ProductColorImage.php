<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColorImage extends Model
{
    protected $fillable = [
        'product_color_id',
        'image',
        'sort_order'
    ];

    public function color()
    {
        return $this->belongsTo(ProductColor::class,'product_color_id');
    }
}