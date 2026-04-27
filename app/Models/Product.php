<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // DN quan he dl
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
