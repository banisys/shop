<?php

namespace App\Http\Controllers;

use App\Models\Compare;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompareController extends Controller
{
    public function index(Product $product)
    {
        if (isset($_COOKIE['compare'])) {
            Compare::where('cookie', $_COOKIE['compare'])->delete();
        }
        $cookie = microtime(true) . rand(1, 10000);
        setcookie('compare', $cookie, time() + 60 * 60 * 24 * 365, '/');
        Compare::create([
            'product_id' => $product['id'],
            'cookie' => $cookie,
        ]);
        $products = Product::where('id', $product['id'])->get();
        $products=$products->all();

        return view('front.compare.index', compact('products'));
    }

    public static function compare_search(Request $request, Product $product)
    {
        $key = $request['search'];
        $products = Product::where('name', 'like', '%' . $key . '%')->where('cat', $product->cat)->latest()->paginate(12);
        if (sizeof($products) == 0) {
            $products = Product::where('brand', 'like', '%' . $key . '%')->where('cat', $product->cat)->latest()->paginate(12);
            if (sizeof($products) == 0) {
                $products = Product::where('cat', 'like', '%' . $key . '%')->where('cat', $product->cat)->latest()->paginate(12);
            }
        }
        return view('front.compare.compare', compact('products', 'key'));
    }

    public function compare(Product $product)
    {
        $repeat = Compare::where('cookie', $_COOKIE['compare'])->latest()->first();

        if ($repeat['product_id'] == $product['id']) {

            $compares = Compare::where('cookie', $_COOKIE['compare'])->get();
            $n = 0;
            $c = array();
            foreach ($compares as $pro) {
                $c[$n] = $pro->product_id;
                $n++;
            }
            $products = array();
            $m = 0;
            foreach ($c as $d) {
                $products[$m] = Product::where('id', $d)->get()->first();
                $m++;
            }

            return view('front.compare.index', compact('products'));

        } else {
            Compare::create([
                'product_id' => $product['id'],
                'cookie' => $_COOKIE['compare'],
            ]);
            $compares = Compare::where('cookie', $_COOKIE['compare'])->get();
            $n = 0;
            $c = array();
            foreach ($compares as $pro) {
                $c[$n] = $pro->product_id;
                $n++;
            }
            $products = array();
            $m = 0;
            foreach ($c as $d) {
                $products[$m] = Product::where('id', $d)->get()->first();
                $m++;
            }

            return view('front.compare.index', compact('products'));
        }
    }


    public function destroy(Product $product)
    {

        Compare::where('product_id', $product['id'])->delete();

        $compares = Compare::where('cookie', $_COOKIE['compare'])->get();
        $n = 0;
        $c = array();
        foreach ($compares as $pro) {
            $c[$n] = $pro->product_id;
            $n++;
        }
        $products = array();
        $m = 0;
        foreach ($c as $d) {
            $products[$m] = Product::where('id', $d)->get()->first();
            $m++;
        }

        return view('front.compare.index', compact('products'));

    }


}
