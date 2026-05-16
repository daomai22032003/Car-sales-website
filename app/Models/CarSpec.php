<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarSpec extends Model
{
    protected $fillable = [

        'product_id',
        'group_name',
        'spec_name',
        'spec_value',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}