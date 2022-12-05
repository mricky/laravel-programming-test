<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';

    protected $fillable = [
        'code',
        'tipe',
        'operation',
        'value',
        'max_price',
        'start_time',
        'end_time',
        'max_price',
        'is_used'
    ];

    public function product() {
        return $this->hasMany('App\Models\Product', 'product_id');
    }
}
