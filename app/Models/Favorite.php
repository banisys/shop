<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'cookie', 'product_id',
    ];

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

}
