@extends('layouts.front')
@section('content')
    <style>
        .form-group {
            margin-top: 35px;
        }

        .control-label {
            border-right: 3px #72d273 solid
        }

        th {
            border: #72d273 1px solid !important;
        }

        td {
            border: #72d273 1px solid !important;
        }

        label {
            font-weight: bold;
        }
    </style>
    <div id="container">
        <div class="container">
            <div class="row">
                <div class="alert alert-success" style="margin-top: 10px;">
                    سفارش شما با موفقیت ثبت شد.
                </div>

                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead style="background-color:#dff0d8;font-weight: bold;">
                            <tr>
                                <td class="text-left">نام محصول</td>
                                <td class="text-left">تعداد</td>
                                <td class="text-right">قیمت واحد</td>
                                <td class="text-right">قیمت کل</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  use App\Models\Cart;$sum = 0; ?>
                            @foreach($carts as $cart)
                                <tr>
                                    <td class="text-left">{{$cart->product->name}}</td>
                                    <td class="text-right"> {{$cart->num}}</td>
                                    <td class="text-right">{{$cart->product->price}} تومان</td>
                                    <td class="text-right">{{$cart->product->price*$cart->num}} تومان</td>
                                    <?php $sum += $cart->product->price * $cart->num  ?>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td class="text-right" style="background-color:#dff0d8 "><strong>جمع کل:</strong>
                                    </td>
                                    <td class="text-right">{{$sum}} تومان</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10" id="content">
                            <fieldset id="address">
                                <div class="form-group">
                                    <label for="input-company" class="col-sm-2 control-label">نام تحویل گیرنده:</label>
                                    <div class="col-sm-10">
                                        {{session()->get('name')}}
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="input-address-1" class="col-sm-2 control-label">شماره موبایل:</label>
                                    <div class="col-sm-10">
                                        {{session()->get('mobile')}}
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="input-country" class="col-sm-2 control-label">استان:</label>
                                    <div class="col-sm-10">
                                        {{session()->get('state')}}
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="input-zone" class="col-sm-2 control-label">شهر:</label>
                                    <div class="col-sm-10">
                                        {{session()->get('city')}}
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="input-city" class="col-sm-2 control-label">آدرس پستی:</label>
                                    <div class="col-sm-10">
                                        {{session()->get('address')}}
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="input-postcode" class="col-sm-2 control-label">کد پستی:</label>
                                    <div class="col-sm-10">
                                        {{session()->get('postcode')}}
                                    </div>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label for="input-zone" class="col-sm-2 control-label">شیوه ارسال سفارش:</label>
                                    <div class="col-sm-10">
                                        {{session()->get('post')}}
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="buttons" style="overflow: unset; margin-bottom: 100px">
                        <div class="pull-left">
                            <a style="color: #f5f5f5;background-color:#c68d1e;" href="{{route('factor')}}"
                               class="btn btn-default edame">مشاهده فاکتور</a>
                        </div>
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>
    <?php
    Cart::where('cookie', $_COOKIE['cart'])->delete();
    unset($_COOKIE['cart']);
    ?>

@endsection