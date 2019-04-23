<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table= 'colors';
    protected $fillable = [
        'product_id', 'color',
    ];
    public $timestamps=false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
