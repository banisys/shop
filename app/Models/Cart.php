<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'cookie', 'color','num','product_id',
    ];

    public $timestamps=false;

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
