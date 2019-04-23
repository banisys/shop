@extends('layouts.admin')
@section('script')
@endsection
@section('content')
    <section class="panel">
        <header>
            <h3 style="font-weight:bold"><i class="icon-double-angle-left"></i> متن پیام </h3>
        </header>
<br>
    @foreach($asks as $a)
            <?php $from = Illuminate\Foundation\Auth\User::where('id', $a->from)->first(); ?>
            <div style="margin-right: 18px">
                <span style="font-size: 14px;color: #484841">{{$a->text}}</span><br>
            </div><br>
        @endforeach
    </section>
@endsection