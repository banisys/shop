<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $fillable = [
        'dimensions',
        'weight',
        'cpu_maker',
        'cpu_model',
        'cpu_series',
        'cpu_speed',
        'cpu_frequency',
        'ram_capacity',
        'ram_sort',
        'hard_capacity',
        'hard_sort',
        'gpu_maker',
        'gpu_model',
        'gpu_ram',
        'screen_size',
        'screen_sort',
        'screen_material',
        'screen_resolution',
        'screen_touch',
        'disk_drive',
        'modem',
        'webcam',
        'finger_touch',
        'speaker',
        'ethernet',
        'wifi',
        'usb2',
        'usb3',
        'battery',
        'os',
        'description',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function search($data)
    {
        $products = Product::where('cat', 'laptop')->orderby('id', 'DESC');
        if (sizeof($data) > 0) {
            if (array_key_exists('name', $data)) {
                $products = $products->where('name', 'like', '%' . $data['name'] . '%')
                    ->where('brand', 'like', '%' . $data['brand'] . '%')
                    ->where('id','like','%'.$data['id'].'%');
            }
        }
        $products = $products->paginate(10);

        return $products;
    }
}
