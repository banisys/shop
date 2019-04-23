@extends('layouts.panel')
@section('content')
    <style>
        #fav{color: #0b0b0b!important;}
    </style>
    <div style="background-image:url('/image/profile-header-img.jpg');width:850px;height:80px;margin-bottom:10px;">
        <span style="background-color: #eaeaea;color: #5f5f5f;padding: 0px 10px 0px 10px;margin: 25px 26px 0 0;float: right;font-size: 20px;">
            <i class="fa  fa-inbox" style="font-size: 14px;margin-left:3px;vertical-align: middle"></i>لیست علاقه مندی ها
        </span>
    </div>
    <section class="panel" style="width: 850px">
        <table class="table">
            <thead style="background-color: #2d2d2d;color:#e8e8e8;font-weight: bold">
            <tr>
                <td>تصویر</td>
                <td>نام محصول</td>
                <td>دسته بندی</td>
                <td>موجودی</td>
                <td>قیمت</td>
                <td>عملیات</td>
            </tr>
            </thead>
            <tbody  style="direction: rtl">
            @foreach($favorites as $favorite)
                <tr>
                    <td class="text-center" >
                        <img src="{{$favorite->product->image}}" alt="{{$favorite->product->name}}"
                             title="{{$favorite->name}}"
                             class="img-thumbnail" style="width: 100px;border: none;">
                    </td>
                    <td>
                        <a href="{{route('single.page',['product'=>$favorite->product->id])}}">{{$favorite->product->name}}</a>
                    </td>
                    <td>{{$favorite->product->cat}}</td>
                    <td>@if($favorite->product->count==0)
                            <span style="color: #dc3545">ناموجود</span>
                        @else
                            <span style="color: #05ac00">موجود</span>
                        @endif
                    </td>
                    <td class="text-right">{{$favorite->product->price}} تومان</td>
                    <td>
                        <a style="float: right"
                           href="{{route('single.page',['product'=>$favorite->product->id])}}">
                            <i class="icon-shopping-cart" style="font-size: 19px"></i>
                        </a>
                        <a style="float: right"
                           href="{{route('favorite.destroy',['product'=>$favorite->product->id])}}">
                            <img src="/image/cancel.png" style="margin-right: 10px">
                        </a>
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
        {{$favorites->links()}}
    </div>

@endsection