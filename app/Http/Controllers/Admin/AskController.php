<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ask;
use App\Models\User;
use Illuminate\Http\Request;

class AskController extends AdminController
{
    public function inbox(Request $request)
    {

        $asks = Ask::search($request->all());

        if (sizeof($asks) == 0) $x = 0;
        else $x = 1;

        return view('admin.ask.inbox', compact('asks', 'x'));
    }

    public function create()
    {
        return view('admin.ask.create');
    }

    public function store(Request $request)
    {
        $to = User::where('email', $request['to'])->first();
        $user_id = auth()->user()->id;
        Ask::create([
            'user_id' => $user_id,
            'from' => $user_id,
            'to' => $to['id'],
            'subject' => $request['subject'],
            'text' => $request['text'],
        ]);
        return redirect(route('ask.inbox'));

    }

    public function destroy(Ask $ask)
    {
        $ask->delete();

        return redirect()->back();
    }

    public function reply(Ask $ask)
    {
        $a = $ask['from'];

        $asks = Ask::where('subject', $ask['subject'])
            ->where(function ($query) use ($a) {
                $query->where('from', $a)->orWhere('to', $a);
            })
            ->orderby('created_at', 'DESC')->get();

        return view('admin.ask.reply', compact('asks', 'ask'));
    }

    public function reply_store(Request $request)
    {
        $user_id = auth()->user()->id;
        Ask::create([
            'from' => $user_id,
            'to' => $request['to'],
            'subject' => $request['subject'],
            'text' => $request['text'],
        ]);
        return redirect(route('ask.inbox'));
    }

    public function outbox(Request $request)
    {
        $asks = Ask::search2($request->all());
        if (sizeof($asks) == 0) $x = 0;
        else $x = 1;

        return view('admin.ask.outbox', compact('asks', 'x'));
    }

    public function show(Ask $ask)
    {
        $a = $ask['to'];
        $asks = Ask::where('subject', $ask['subject'])
            ->where(function ($query) use ($a) {
                $query->where('from', $a)->orWhere('to', $a);
            })->orderby('created_at', 'DESC')->get();
        return view('admin.ask.show', compact('asks'));
    }


}
