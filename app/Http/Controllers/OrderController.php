<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function data()
    {
        return view('front.order.data');
    }

    public function payment(Request $request)
    {
        session()->put('name', $request['name']);
        session()->put('mobile', $request['mobile']);
        session()->put('state', $request['state']);
        session()->put('city', $request['city']);
        session()->put('address', $request['address']);
        session()->put('postcode', $request['postcode']);
        session()->put('post', $request['post']);
        session()->put('factor', $request['factor']);

        return view('front.order.payment');
    }

    public function finish(Request $request)
    {
        $user_id = auth()->user()->id;
        $order = Order::create([
            'user_id' => $user_id,
            'name' => session()->get('name'),
            'mobile' => session()->get('mobile'),
            'state' => session()->get('state'),
            'city' => session()->get('city'),
            'address' => session()->get('address'),
            'postcode' => session()->get('postcode'),
            'post' => session()->get('post'),
            'factor' => session()->get('factor'),
            'payment' => $request['payment'],
        ]);

        $carts = Cart::where('cookie', $_COOKIE['cart'])->get();
        foreach ($carts as $cart) {
            $order->order_pro()->create([
                'product_id' => $cart->product->id,
                'num' => $cart->num,
                'color' => $cart->color,
            ]);
        }
        return view('front.order.finish', compact('carts'));
    }

    public function factor()
    {
        $order = Order::where('user_id', auth()->user()->id)->latest()->first();
        return view('front.order.factor', compact('order'));
    }

    public function admin_list(Request $request)
    {

        $orders = Order::search($request->all());
        if (sizeof($orders) == 0) $x = 0;
        else $x = 1;

        return view('admin.orders.index', compact('orders', 'x'));
    }

    public function admin_factor(Order $o)
    {

        Order::where('id', $o['id'])->update(['read' => 1]);
        $order = Order::where('id', $o['id'])->first();

        return view('front.order.factor', compact('order'));
    }

    public function destroy(Order $o)
    {
        $o->delete();

        return redirect()->back();
    }

    public function status(Request $request, Order $order)
    {
        Order::where('id', $order['id'])->update(['status' => $request['status']]);
        return redirect()->back();
    }

}
