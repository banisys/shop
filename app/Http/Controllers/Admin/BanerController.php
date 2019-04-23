<?php

namespace App\Http\Controllers\Admin;

use App\Models\Baner;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BanerController extends AdminController
{
    public function create()
    {
        $baners = Baner::get();
        return view('admin.baner.create', compact('baners'));
    }

    public function store(Request $request, Baner $image)
    {
        $file = $request['image'];
        $filename = time() . "-" . $file->getClientOriginalName();
        $file->move('uploads/baner', $filename);
        $url = "/uploads/baner/" . $filename;

        $string_1 = $image->url;
        $string_2 = substr($string_1, 1);

        unlink($string_2);

        DB::table('baners')->where('id', $image['id'])->delete();

        Baner::create([
            'name' => $image['name'],
            'url' => $url,
            'link' => $request['link'],
        ]);

        return Redirect::back();
    }


}
