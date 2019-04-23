<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $sliders = Slider::get();
        $banners = Baner::get();
        $populars = Product::where('popular', '1')->get();


        return view('welcome', compact('sliders', 'banners', 'populars'));
    }

    public function single(Product $product)
    {
        $cat = $product->cat;
        $view = 'front.single.' . $cat;
        $images = ProductImage::where('product_id', $product->id)->get();
        return view($view, compact('product', 'images'));
    }


    public function search_cat($key)
    {
        $products = Product::where('cat', $key)->latest()->paginate(20);

        return view('front.search.key', compact('products', 'key'));
    }


    public function cart(Request $request, Product $product)
    {
        if (isset($_COOKIE['cart'])) {
            $x = Cart::where('cookie', $_COOKIE['cart'])->where('product_id', $product['id'])->get();

            if (sizeof($x) == 0) {
                Cart::create([
                    'product_id' => $product['id'],
                    'cookie' => $_COOKIE['cart'],
                    'num' => $request['num'],
                    'color' => $request['color'],
                ]);
            } else {
                Cart::where('cookie', $_COOKIE['cart'])->where('product_id', $product['id'])->update(['num' => $request['num']]);
            }
        } else {
            $cookie = microtime(true) . rand(1, 10000);
            setcookie('cart', $cookie, time() + 60 * 60 * 24 * 365, '/');
            Cart::create([
                'product_id' => $product['id'],
                'cookie' => $cookie,
                'num' => $request['num'],
                'color' => $request['color'],
            ]);
            return redirect(route('cart.index'));
        }
        $carts = Cart::where('cookie', $_COOKIE['cart'])->get();

        return view('front.cart', compact('carts'));
    }


    public function cart_index()
    {
        $carts = Cart::where('cookie', $_COOKIE['cart'])->get();

        if (sizeof($carts) > 0) {

            return view('front.cart', compact('carts'));
        } else {
            return redirect('/');
        }

    }


    public function destroy_cart(Product $product)
    {
        Cart::where('product_id', $product['id'])->delete();

        return redirect(route('cart.index'));
    }


    public function ref_num(Request $request, Product $product)
    {
        Cart::where('cookie', $_COOKIE['cart'])->where('product_id', $product['id'])->update(['num' => $request['num']]);
        return redirect(route('cart.index'));
    }

    public static function search_index(Request $request)
    {
        $key = $request['search'];
        $products = Product::where('name', 'like', '%' . $key . '%')->latest()->paginate(20);
        if (sizeof($products) == 0) {
            $products = Product::where('brand', 'like', '%' . $key . '%')->latest()->paginate(20);
            if (sizeof($products) == 0) {
                $products = Product::where('cat', 'like', '%' . $key . '%')->latest()->paginate(20);
            }
        }
        return view('front.search.key', compact('products', 'key'));
    }

    public static function panel_order()
    {
//        $orders = Order::where('user_id', auth()->user()->id)->orderby('id', 'DESC')->paginate(10);
        $orders = auth()->user()->orders()->orderby('created_at', 'DESC')->paginate(10);
        if (sizeof($orders) == 0) $x = 0;
        else $x = 1;

        return view('front.panel.order', compact('orders', 'x'));
    }


    public function index3()
    {


        $users = DB::table('favorites')->get();
        $users->groupBy('product_id');

        dd($users);
        return "ok";
    }
}
