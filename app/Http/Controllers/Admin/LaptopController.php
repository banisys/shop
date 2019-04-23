<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Models\Laptop;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LaptopController extends AdminController
{

    public function index(Request $request)
    {
        $products = Laptop::search($request->all());
        if (sizeof($products) == 0) $x = 0;
        else $x = 1;

        return view('admin.laptop.index', compact('products', 'x'));
    }

    public function create()
    {
        return view('admin.laptop.create');
    }

    public function store(Request $request)
    {

        if (isset($request['image'])) {
            $img = $this->thumbnail_uploader($request['image']);
        } else {
            $img = null;
        }
        $user_id = auth()->user()->id;
        $pro = Product::create([
            'name' => $request['name'],
            'brand' => $request['brand'],
            'cat' => 'laptop',
            'count' => $request['count'],
            'price' => $request['price'],
            'suggestion' => $request['suggestion'],
            'popular' => $request['popular'],
            'discount' => $request['discount'],
            'image' => $img,
            'user_id' => $user_id,

        ]);

        $pro->laptop()->create([
            'dimensions' => $request['dimensions'],
            'weight' => $request['weight'],
            'cpu_maker' => $request['cpu_maker'],
            'cpu_model' => $request['cpu_model'],
            'cpu_series' => $request['cpu_series'],
            'cpu_speed' => $request['cpu_speed'],
            'cpu_frequency' => $request['cpu_frequency'],
            'ram_capacity' => $request['ram_capacity'],
            'ram_sort' => $request['ram_sort'],
            'hard_capacity' => $request['hard_capacity'],
            'hard_sort' => $request['hard_sort'],
            'gpu_maker' => $request['gpu_maker'],
            'gpu_model' => $request['gpu_model'],
            'gpu_ram' => $request['gpu_ram'],
            'screen_size' => $request['screen_size'],
            'screen_sort' => $request['screen_sort'],
            'screen_material' => $request['screen_material'],
            'screen_resolution' => $request['screen_resolution'],
            'screen_touch' => $request['screen_touch'],
            'disk_drive' => $request['disk_drive'],
            'modem' => $request['modem'],
            'webcam' => $request['webcam'],
            'finger_touch' => $request['finger_touch'],
            'speaker' => $request['speaker'],
            'ethernet' => $request['ethernet'],
            'wifi' => $request['wifi'],
            'usb2' => $request['usb2'],
            'usb3' => $request['usb3'],
            'battery' => $request['battery'],
            'os' => $request['os'],
            'description' => $request['description'],
        ]);

        foreach ($request['colors'] as $color) {
            $pro->colors()->create([
                'color' => $color,
            ]);
        }


        return redirect(route('laptop.index'));

    }

    public function edit(Product $laptop)
    {

        return view('admin.laptop.edit', compact('laptop'));
    }

    public function update(Request $request, Product $laptop)
    {

        $data = $request->all();
        $laptop->update($data);

        $attr = $laptop->laptop;
        $attr->product_id = $laptop->id;
        $attr->dimensions = $request['dimensions'];
        $attr->weight = $request['weight'];
        $attr->cpu_maker = $request['cpu_maker'];
        $attr->cpu_model = $request['cpu_model'];
        $attr->cpu_series = $request['cpu_series'];
        $attr->cpu_speed = $request['cpu_speed'];
        $attr->cpu_frequency = $request['cpu_frequency'];
        $attr->ram_capacity = $request['ram_capacity'];
        $attr->ram_sort = $request['ram_sort'];
        $attr->hard_capacity = $request['hard_capacity'];
        $attr->hard_sort = $request['hard_sort'];
        $attr->gpu_maker = $request['gpu_maker'];
        $attr->gpu_model = $request['gpu_model'];
        $attr->gpu_ram = $request['gpu_ram'];
        $attr->screen_size = $request['screen_size'];
        $attr->screen_sort = $request['screen_sort'];
        $attr->screen_material = $request['screen_material'];
        $attr->screen_resolution = $request['screen_resolution'];
        $attr->screen_touch = $request['screen_touch'];
        $attr->disk_drive = $request['disk_drive'];
        $attr->modem = $request['modem'];
        $attr->webcam = $request['webcam'];
        $attr->finger_touch = $request['finger_touch'];
        $attr->speaker = $request['speaker'];
        $attr->ethernet = $request['ethernet'];
        $attr->wifi = $request['wifi'];
        $attr->usb2 = $request['usb2'];
        $attr->usb3 = $request['usb3'];
        $attr->battery = $request['battery'];
        $attr->os = $request['os'];
        $attr->description = $request['description'];
        $attr->save();

        DB::table('colors')->where('product_id', $laptop['id'])->delete();
        foreach ($request['colors'] as $color) {
            Color::create([
                'product_id'=> $laptop['id'],
                'color' => $color,
            ]);
        }


        return redirect(route('laptop.index'));
    }


    public function gallery(Product $product)
    {
        $images = ProductImage::where('product_id', $product['id'])->get();

        return view('admin.laptop.gallery', compact('product', 'images'));
    }

    public function upload(Request $request, Product $product)
    {
        $id = $product['id'];
        $files = $request['file'];


        $name = rand() . "-" . $id . "-" . $files->getClientOriginalName();

        if ($files->move('uploads/gallery', $name)) {

            $pro = Product::find($id);
            $pro->product_image()->create([
                'url' => '/uploads/gallery/' . $name,
            ]);

        }
    }

    public function destroy(Product $laptop)
    {
        $string_1 = $laptop->image;
        $string_2 = substr($string_1, 1);

        unlink($string_2);
        $laptop->laptop()->delete();
        $laptop->delete();

        return redirect(route('laptop.index'));
    }


    public function destroy_image(ProductImage $image)
    {
        $pro = Product::where('id', $image['product_id'])->first();

        DB::table('product_images')->where('id', $image['id'])->delete();

        $string_1 = $image['url'];
        $string_2 = substr($string_1, 1);
        unlink($string_2);

        return redirect(route('laptop.gallery', ['galley' => $pro['id']]));
    }

    public function destroy_thumbnail(Product $image)
    {
        $string_1 = $image['image'];
        $string_2 = substr($string_1, 1);
        unlink($string_2);

        $image->image = null;
        $image->save();
        return redirect(url()->previous() . '#fileName');
    }

    public function store_thumbnail(Request $request, Product $image)
    {

        if (isset($request['pic'])) {
            $img = $this->thumbnail_uploader($request['pic']);
        } else {
            $img = null;
        }

        $image->image = $img;
        $image->save();
        return redirect(url()->previous() . '#pic');

    }

}
