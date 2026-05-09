<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = "vendors";

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'website',
        'address',
        'province',
        'image',
        'open_time',
        'manager_name',
        'description',
        'map_url',
        'position',
        'is_active'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}