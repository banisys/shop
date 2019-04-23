@extends('layouts.front')

@section('content')
    <div id="container">
        <div class="container">
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h1 class="title">حساب کاربری ورود</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="subtitle">مشتری جدید</h2>
                            <p><strong>ثبت نام حساب کاربری</strong></p>
                            <p>با ایجاد حساب کاربری میتوانید سریعتر خرید کرده، از وضعیت خرید خود آگاه شده و تاریخچه ی
                                سفارشات خود را مشاهده کنید.</p>
                            <a href="register.html" class="btn btn-primary">ادامه</a></div>
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf
                            <div class="col-sm-6">
                                <h2 class="subtitle">مشتری قبلی</h2>
                                <p><strong>من از قبل مشتری شما هستم</strong></p>

                                <div class="form-group">
                                    <label class="control-label" for="input-email">آدرس ایمیل</label>
                                    <input type="text" name="email" placeholder="آدرس ایمیل"
                                           id="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           value="{{ old('email') }}" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <br>
                                <style>#forgot:hover{color: #c68d1e !important;}</style>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">رمز عبور</label>
                                    <a id="forgot" style="float: left" class="btn btn-link" href="{{ route('password.request') }}">رمز عبور خود را
                                        فراموش کرده ام</a>

                                    <input type="password" name="password" placeholder="رمز عبور"
                                           id="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <br>
                                    <input id="remember" type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <a style="margin-bottom: 3px">
                                        <label style="margin-top: 5px" for="remember">&nbsp; مرا به خاطر داشته باش
                                        </label>
                                    </a>
                                </div>
                                <input type="submit" value="ورود" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                <!--Middle Part End -->
                <!--Right Part Start -->

                <!--Right Part End -->
            </div>
        </div>
    </div>
@endsection
