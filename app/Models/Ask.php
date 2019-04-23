<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    protected $fillable = [
       'user_id', 'from', 'to', 'subject', 'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function search($data)
    {
        $asks = Ask::where('to', auth()->user()->id)->orderby('created_at', 'DESC');

        if (isset($data['from_email'])) {
            $user = User::where('email', $data['from_email'])->first();
            if (isset($user)) {
                $asks = $asks->where('from', $user['id']);
            } else {
                $asks = Order::where('id', 'far30tech');
            }
        }
        $asks = $asks->paginate(10);

        return $asks;
    }

    public static function search2($data)
    {
        $asks = Ask::where('from', auth()->user()->id)->orderby('created_at', 'DESC');

        if (sizeof($data) > 0) {
            if (array_key_exists('name', $data)) {
                $asks = $asks->where('name', 'like', '%' . $data['name'] . '%')
                    ->where('brand', 'like', '%' . $data['brand'] . '%')
                    ->where('id', 'like', '%' . $data['id'] . '%');
            }
        }
        $asks = $asks->paginate(10);
        return $asks;
    }
}
