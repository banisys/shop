<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'mobile',
        'state',
        'city',
        'address',
        'postcode',
        'post',
        'payment',
        'factor',
    ];

    public function order_pro()
    {
        return $this->hasMany(Order_pro::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'user_id' => 1,
        ]);
    }

    public static function search($data)
    {
        if (isset($data['email'])) {

            $user = User::where('email', $data['email'])->first();
            if (isset($user)) {
                $orders = Order::where('user_id', 'like', '%' . $user->id . '%')->orderby('id', 'DESC');
            } else {
                $orders = Order::where('id', 'far30tech');
            }
        } else {
            $orders = Order::orderby('id', 'DESC');

            if (sizeof($data) > 0) {
                $orders = $orders->where('id', 'like', '%' . $data['id'] . '%')
                    ->where('state', 'like', '%' . $data['state'] . '%');
            }
        }
        $orders = $orders->paginate(10);

        return $orders;
    }

}
