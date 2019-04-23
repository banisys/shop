<?php

namespace App\Http\Controllers;

use App\Models\Ask;
use Illuminate\Http\Request;

class Ask_userController extends Controller
{
    public function inbox()
    {
        $asks = Ask::where('to', auth()->user()->id)->orderby('created_at', 'DESC')->paginate(10);
        if (sizeof($asks) == 0) $x = 0;
        else $x = 1;

        return view('front.panel.inbox', compact('asks','x'));
    }

    public function reply(Ask $ask)
    {
        $a = $ask['to'];
        $asks = Ask::where('subject', $ask['subject'])
            ->where(function ($query) use ($a) {
                $query->where('from', $a)->orWhere('to', $a);
            })->orderby('created_at', 'DESC')->get();

        return view('front.panel.reply', compact('asks', 'ask'));
    }

    public function reply_store(Request $request)
    {
        $user_id = auth()->user()->id;
        Ask::create([
            'from' => $user_id,
            'to' => 1,
            'subject' => $request['subject'],
            'text' => $request['text'],
        ]);
        return redirect(route('ask_user.inbox'));
    }

    public function create()
    {
        return view('front.panel.create');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        Ask::create([
            'user_id' => $user_id,
            'from' => $user_id,
            'to' => 1,
            'subject' => $request['subject'],
            'text' => $request['text'],
        ]);
        return redirect(route('ask_user.inbox'));
    }

    public function outbox()
    {
        $asks = Ask::where('from', auth()->user()->id)->orderby('created_at', 'DESC')->paginate(10);
        if (sizeof($asks) == 0) $x = 0;
        else $x = 1;


        return view('front.panel.outbox', compact('asks','x'));
    }

    public function show(Ask $ask)
    {
        $a = $ask['from'];
        $asks = Ask::where('subject', $ask['subject'])
            ->where(function ($query) use ($a) {
                $query->where('from', $a)->orWhere('to', $a);
            })->orderby('created_at', 'DESC')->get();
        return view('front.panel.show', compact('asks'));
    }
}
