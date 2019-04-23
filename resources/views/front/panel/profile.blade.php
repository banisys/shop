@extends('layouts.panel')
@section('content')
    <style>
        #profile {
            color: #0b0b0b !important;
        }

        .profile {
            margin: 0 0 0 0;
        }

        .panel span {
            padding: 6px
        }

    </style>
    <div style="background-image:url('/image/profile-header-img.jpg');width:850px;height:80px;margin-bottom:10px;">
        <span style="background-color: #eaeaea;color: #5f5f5f;padding: 0px 10px 0px 10px;margin: 25px 26px 0 0;float: right;font-size: 20px;">
            <i class="fa  fa-inbox" style="font-size: 14px;margin-left:3px;vertical-align: middle"></i>پروفایل
        </span>
    </div>
    <section class="panel" style="width: 850px">
        <div class="container" style="margin:25px 10px 0 0;border-right: 2px solid #ddd">
            <div class="profile"><i class="icon-user" style="font-size:20px"></i>
                <span>نام:</span><span style="color: #6dbff7;margin-right:46px">{{$user->name}}</span>
            </div>
            <br>
            <div class="profile"><i class="icon-user" style="font-size:20px"></i>
                <span>نام خانوادگی:</span><span style="color: #6dbff7">{{$user->family}}</span>
            </div>
            <br>
            <div class="profile"><i class="icon-user" style="font-size:20px"></i>
                <span>نام کاربری:</span><span style="color: #6dbff7;margin-right:13px">{{$user->nickname}}</span>
            </div>
            <br>
            <div class="profile"><i class="icon-envelope-alt" style="font-size:20px;"></i>
                <span>ایمیل:</span><span style="color: #6dbff7;margin-right:31px">{{$user->email}}</span>
            </div>
            <br>
            <div class="profile"><i class="icon-mobile-phone" style="font-size:30px;"></i>
                <span>موبایل:</span><span style="color: #6dbff7;margin-right:34px">{{$user->mobile}}</span>
            </div>
        </div>
    </section>
@endsection