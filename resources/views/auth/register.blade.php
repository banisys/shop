@extends('layouts.front')

@section('content')

    <style>
        .err::placeholder {
            color: #ff6262
        }
    </style>
    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="login.html">حساب کاربری</a></li>
                <li><a href="register.html">ثبت نام</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div class="col-sm-9" id="content">
                    <h1 class="title">ثبت نام حساب کاربری</h1>
                    <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.html">صفحه لاگین</a> مراجعه
                        کنید.</p>
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}"
                          aria-label="{{ __('Register') }}">
                        @csrf
                        <fieldset id="account">
                            <legend>اطلاعات شخصی شما</legend>
                            <div style="display: none;" class="form-group required">
                                <label class="col-sm-2 control-label">گروه مشتری</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" checked="checked" value="1" name="customer_group_id">
                                            پیشفرض</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                                <div class="col-sm-5">
                                    <input type="text"
                                           placeholder="@if ($errors->has('name')) {{ $errors->first('name') }} @endif"
                                           id="name"
                                           class="err form-control form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" autofocus>


                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                                <div class="col-sm-5">
                                    <input type="text"
                                           class="err form-control {{ $errors->has('family') ? ' is-invalid' : '' }}"
                                           id="input-lastname"
                                           placeholder="@if ($errors->has('family')) {{ $errors->first('family') }} @endif"
                                           value="{{ old('family') }}" name="family">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-lastname" class="col-sm-2 control-label">نام کاربری</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control mobile err" id="input-lastname"
                                           placeholder="@if ($errors->has('nickname')) {{ $errors->first('nickname') }} @endif"
                                           name="nickname">
                                </div>
                            </div>

                            <div class="form-group required">
                                <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                                <div class="col-sm-5">
                                    <input type="text"
                                           placeholder="@if ($errors->has('email')) {{ $errors->first('email') }} @endif"
                                           name="email" id="email"
                                           class="err form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-telephone" class="col-sm-2 control-label">شماره موبایل</label>
                                <div class="col-sm-5">
                                    <input type="tel"
                                           class="err form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                           id="input-telephone"
                                           placeholder="@if ($errors->has('mobile')) {{ $errors->first('mobile') }} @endif"
                                           value="" name="mobile">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>رمز عبور شما</legend>
                            <div class="form-group required">
                                <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                                <div class="col-sm-5">
                                    <input type="password"
                                           placeholder="@if ($errors->has('password')) {{ $errors->first('password') }} @endif"
                                           id="password"
                                           class="err form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password-confirm"
                                           name="password_confirmation">
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons">
                            <div class="col-sm-10">
                                <input type="checkbox" value="1" name="agree">&nbsp;&nbsp;<a> من </a>
                                <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق
                                    هستم</a>
                                <button type="submit" class="btn btn-primary" style="float: left;margin-left:204px"
                                        onclick="if(!this.form.agree.checked){alert('سیاست های حریم خصوصی را تایید کنید.');return false}">
                                    ثبت نام
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
