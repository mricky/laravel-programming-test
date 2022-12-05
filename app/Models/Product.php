<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'id',
        'product_name'
    ];

    public function detail() {
        return $this->hasMany('App\Models\CartDetail', 'cart_id');
    }
    public function cartDetail() {
        return $this->belongsTo('App\Models\CartDetail', 'product_id');
    }

    public function updatetotal($itemcart, $subtotal) {
        $this->attributes['subtotal'] = $itemcart->subtotal + $subtotal;
        $this->attributes['total'] = $itemcart->total + $subtotal;
        self::save();
    }
}
