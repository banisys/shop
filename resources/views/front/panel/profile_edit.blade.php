@extends('layouts.panel')
@section('content')
    <style>
        #profile {
            color: #0b0b0b !important;
        }

        .profile {
            margin: 0 0 0 0;
        }
        .panel span{padding:6px}

    </style>
    <div style="background-image:url('/image/profile-header-img.jpg');width:850px;height:80px;margin-bottom:10px;">
        <span style="background-color: #eaeaea;color: #5f5f5f;padding: 0px 10px 0px 10px;margin: 25px 26px 0 0;float: right;font-size: 20px;">
            <i class="fa  fa-edit" style="font-size: 14px;margin-left:3px;vertical-align: middle"></i>تصحیح پروفایل
        </span>
    </div>
    <section class="panel" style="width: 850px">
        <form class="form-horizontal tasi-form" method="post" action="{{route('profile.update')}}">
            {{csrf_field()}}
            <div class="container" style="margin:25px 10px 0 0;border-right: 2px solid #ddd">
                <div class="profile"><i class="icon-user" style="font-size:20px"></i><span>نام:</span>
                    <input type="text" name="name" value="{{$user->name}}" style="margin-right: 48px">
                </div>
                <br>
                <div class="profile"><i class="icon-user" style="font-size:20px"></i><span>نام خانوادگی:</span>
                    <input type="text" name="family" value="{{$user->family}}" style="margin-right: 0">
                </div>
                <br>
                <div class="profile"><i class="icon-mobile-phone" style="font-size:30px;"></i><span>موبایل:</span>
                    <input type="text" name="mobile" value="{{$user->mobile}}" style="margin-right:33px">
                </div>
                <div class="bottom_lap">
                    <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">ذخیره تغییرات</button>
                    <a href="{{route('profile')}}" class="btn btn-danger" type="reset"> لغو</a>
                </div>
            </div>
        </form>
    </section>
@endsection