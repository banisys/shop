<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public static function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('front.panel.profile', compact('user'));
    }

    public static function edit()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('front.panel.profile_edit', compact('user'));
    }

    public function update(Request $request)
    {
        User::where('id', auth()->user()->id)->update([
            'name' => $request['name'],
            'family' => $request['family'],
            'mobile' => $request['mobile'],
        ]);

        return redirect(route('profile'));
    }

}
