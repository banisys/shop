<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('cookie', $_COOKIE['favorite'])->paginate(10);
        if (sizeof($favorites) == 0) $x = 0;
        else $x = 1;

        return view('front.panel.favorite', compact('favorites','x'));
    }

    public function favorite(Product $product)
    {
        if (isset($_COOKIE['favorite'])) {
            $x = Favorite::where('cookie', $_COOKIE['favorite'])->where('product_id', $product['id'])->get();
            if (sizeof($x) == 0) {
                Favorite::create([
                    'product_id' => $product['id'],
                    'cookie' => $_COOKIE['favorite'],
                ]);
            }
        } else {
            $cookie = microtime(true) . rand(1, 10000);
            setcookie('favorite', $cookie, time() + 60 * 60 * 24 * 365, '/');
            Favorite::create([
                'product_id' => $product['id'],
                'cookie' => $cookie,
            ]);
        }
    }

    public function destroy_favorite(Product $product)
    {
        Favorite::where('product_id', $product['id'])->delete();

        return Redirect::back();
    }

}
