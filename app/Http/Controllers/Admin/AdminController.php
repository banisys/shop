<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

    public function thumbnail_uploader($file)
    {
        $filename=time()."-".$file->getClientOriginalName();
        $img=Image::make($file);
        $img->resize(350,350);
        $img->save('uploads/thumbnail/'.$filename);
        return "/uploads/thumbnail/".$filename;
    }

    public function ImageUploader1($file, $paths)
    {
        $filename = time() . "-" . $file->getClientOriginalName();
        $path = public_path($paths);
        $files = $file->move($path, $filename);

        $img = Image::make($files->getRealPath());
        $img->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path . "small-" . $filename);
        return $paths . $filename;
    }
}
