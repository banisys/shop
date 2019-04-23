<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SliderController extends AdminController
{
    public function create()
    {
        $slides = Slider::get();
        return view('admin.slider.create', compact('slides'));
    }

    public function upload(Request $request)
    {
        $files = $request['file'];
        $name = rand() . "-" . $files->getClientOriginalName();

        if ($files->move('uploads/slider', $name)) {
            Slider::create([
                'url' => '/uploads/slider/' . $name,
            ]);
        }
    }

    public function destroy_image(Slider $image)
    {
        $string_1 = $image->url;
        $string_2 = substr($string_1, 1);
        unlink($string_2);

        $image->delete();
        return Redirect::back();
    }

    public function store(Request $request, Slider $image)
    {
        $data = $request->all();
        $image->update($data);
        return Redirect::back();
    }

    public function link()
    {
        $slides = Slider::get();
        return view('admin.slider.link', compact('slides'));
    }


}
