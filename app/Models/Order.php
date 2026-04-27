<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // relationship one to many
    public function details()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'order_status_id', 'id');
    }
}
