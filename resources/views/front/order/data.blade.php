@extends('layouts.front')
@section('content')
    <script language="javascript" src="/js/city.js"></script>
    <style>
        .form-group {
            margin-bottom: 20px!important;
        }
    </style>
    <div id="container">
        <div class="container">
            <div class="row">
                <!--Middle Part Start-->
                <div class="col-sm-10" id="content">
                    <form class="form-horizontal" method="post" action="{{route('payment')}}">
                        {{csrf_field()}}
                        <fieldset id="address">
                            <legend style="color:#2d2d2d">انتخاب آدرس تحویل سفارش</legend>
                            <div class="form-group">
                                <label for="input-company" class="col-sm-2 control-label">نام تحویل گیرنده</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-company" placeholder="" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-address-1" class="col-sm-2 control-label">شماره موبایل</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-address-1" placeholder="آدرس 1"
                                           name="mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-country" class="col-sm-2 control-label">استان</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="input-country"  name="state" onChange="iranwebsv(this.value);">
                                        <option value=""> --- لطفا انتخاب کنید ---</option>
                                        <option value="0">لطفا استان را انتخاب نمایید</option>
                                        <option value="تهران">تهران</option>
                                        <option value="گیلان">گیلان</option>
                                        <option value="آذربایجان شرقی">آذربایجان شرقی</option>
                                        <option value="خوزستان">خوزستان</option>
                                        <option value="فارس">فارس</option>
                                        <option value="اصفهان">اصفهان</option>
                                        <option value="راسان رضوی">خراسان رضوی</option>
                                        <option value="قزوین">قزوین</option>
                                        <option value="سمنان">سمنان</option>
                                        <option value="قم">قم</option>
                                        <option value="مرکزی">مرکزی</option>
                                        <option value="زنجان">زنجان</option>
                                        <option value="مازندران">مازندران</option>
                                        <option value="گلستان">گلستان</option>
                                        <option value="اردبیل">اردبیل</option>
                                        <option value="آذربایجان غربی">آذربایجان غربی</option>
                                        <option value="همدان">همدان</option>
                                        <option value="کردستان">کردستان</option>
                                        <option value="کرمانشاه">کرمانشاه</option>
                                        <option value="لرستان">لرستان</option>
                                        <option value="بوشهر">بوشهر</option>
                                        <option value="کرمان">کرمان</option>
                                        <option value="هرمزگان">هرمزگان</option>
                                        <option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
                                        <option value="یزد">یزد</option>
                                        <option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
                                        <option value="ایلام">ایلام</option>
                                        <option value="کهگلویه و بویراحمد">کهگلویه و بویراحمد</option>
                                        <option value="خراسان شمالی">خراسان شمالی</option>
                                        <option value="خراسان جنوبی">خراسان جنوبی</option>
                                        <option value="البرز">البرز</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-zone" class="col-sm-2 control-label">شهر</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="city" id="city">
                                        <option value=""> --- لطفا انتخاب کنید ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-city" class="col-sm-2 control-label">آدرس پستی</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-city" placeholder="شهر" name="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-postcode" class="col-sm-2 control-label">کد پستی</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-postcode" placeholder="کد پستی" name="postcode">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-zone" class="col-sm-2 control-label">شیوه ارسال سفارش</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="input-zone" name="post">
                                        <option value=""> --- لطفا انتخاب کنید ---</option>
                                        <option value="پیشتاز">پست پیشتاز</option>
                                        <option value="سفارشی">پست سفارشی</option>
                                        <option value="اکسپرس">پست اکسپرس</option>
                                        <option value="عادی">پست عادی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-factor" class="col-sm-2 control-label">درخواست ارسال فاکتور</label>
                                <div class="col-sm-10">
                                    <input style="margin-top: 10px" type="checkbox" value="1" name="factor" id="input-factor">
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons" style="float: left">
                            <div class="pull-right">
                                <input type="submit" class="btn btn-primary" value="تایید و ادامه ثبت سفارش">
                            </div>
                        </div>
                    </form>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>
@endsection