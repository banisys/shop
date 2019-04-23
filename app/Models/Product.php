<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Product extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'cat',
        'count',
        'price',
        'suggestion',
        'popular',
        'discount',
        'status',
        'user_id',
        'image',
    ];

    public function laptop()
    {
        return $this->hasOne(Laptop::class,'product_id');
    }

    public function product_image()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }

    public function colors()
    {

        return $this->hasMany(Color::class,'product_id');
    }

    public function order_pro()
    {
        return $this->hasMany(Order_pro::class,'product_id');
    }

    public function favorite()
    {
        return $this->belongsTo(Favorite::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

}
