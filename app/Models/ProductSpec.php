<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpec extends Model
{
    protected $fillable = [
        'product_id',
        'key',
        'value'
    ];

    // Quan hệ ngược lại (optional nhưng nên có)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
