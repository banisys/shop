@extends('layouts.panel')
@section('content')
    <style>
        #ask{color: #0b0b0b!important;}
    </style>
    <div style="background-image:url('/image/profile-header-img.jpg');width:850px;height:80px;margin-bottom:10px;">
        <span style="background-color: #eaeaea;color: #5f5f5f;padding: 0px 10px 0px 10px;margin: 25px 26px 0 0;float: right;font-size: 20px;">
            <i class="fa  fa-inbox" style="font-size: 14px;margin-left:3px;vertical-align: middle"></i>پیام های دریافتی
        </span>
    </div>
    <a href="{{route('ask_user.create')}}" class="btn btn-success btn-xs" style="color: #0b0b0b;margin:10px 10px 20px 0;padding:2px 15px 2px 15px">
        <i class="fa fa-plus" style="vertical-align: middle"></i>
        ایجاد تیکت جدید
    </a>
    <section class="panel" style="width: 850px">
        <table class="table table-bordered">
            <thead style="background-color: #2d2d2d;color:#e8e8e8;">
            <tr>
                <th><i class="icon-list"></i> کد</th>
                <th><i class="icon-tag"></i> فرستنده</th>
                <th><i class="icon-bookmark"></i> موضوع</th>
                <th><i class="icon-calendar"></i> تاریخ</th>
                <th><i class="icon-comment-alt"></i> جزئیات تیکت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($asks as $ask)
                <tr>
                    <td>{{$ask->id}}</td>
                    <td><span>پشتیبانی</span></td>
                    <td>{{$ask->subject}}</td>
                    <td>{{ Verta::instance($ask->created_at)->format('Y/n/j') }}</td>
                    <td>
                        <a href="{{route('ask_user.reply',['id'=>$ask->id])}}" class="btn btn-info btn-xs"> جزئیات تیکت </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($x == 0)
            <div class="alert alert-danger" style="margin-top: 10px;">
                موردی یافت نشد
            </div>
        @endif

    </section>
    <div class="text-center">
        {{$asks->links()}}
    </div>
@endsection