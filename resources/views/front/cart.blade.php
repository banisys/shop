@extends('layouts.front')
@section('content')
    <link rel="stylesheet" href="/css/toastr.min.css">
    <script src="/js/toastr.min.js"></script>
    <style>
        .sss:hover{color: #d0d0d0 !important;}
        .sss{color: #000000 !important;font-size:18px!important;}
    </style>

    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                <li><a href="cart.html">سبد خرید</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">سبد خرید</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td class="text-center">تصویر</td>
                                <td class="text-left">نام محصول</td>
                                <td class="text-left">تعداد</td>
                                <td class="text-right">قیمت واحد</td>
                                <td class="text-right">قیمت کل</td>
                                <td class="text-right">حذف</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $sum = 0; ?>

                            @foreach($carts as $cart)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{$cart->product->image}}" alt="{{$cart->product->name}}"
                                             title="{{$cart->product->name}}"
                                             class="img-thumbnail" style="width: 150px;border: none;">
                                    </td>
                                    <td class="text-left"><a href="{{route('single.page',['product'=>$cart->product->id])}}">{{$cart->product->name}}</a>
                                        &nbsp;&nbsp;<span
                                                style="font-size: 11px">{{$cart->color}}</span>
                                    </td>
                                    <td class="text-left">
                                        <div class="input-group btn-block quantity">
                                            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                                                  action="{{route('cart',['product'=>$cart->product->id])}}" id="my_form">
                                                {{csrf_field()}}
                                                <input type="number" name="num" min="1" max="{{$cart->product->count}}"
                                                       step="1"
                                                       value="{{$cart->num}}"
                                                       style="margin-top: 2px;width:35px;height: 25px;"/>&nbsp;
                                                <input type="submit" id="refresh" style="position:relative;width:5px;height:21px;opacity:0;z-index: 5">
                                                <a style="position:absolute;right:44px;top:5px;display:block;" ><i class="fa fa-refresh" style="color: #1c7430"></i></a>
                                            </form>
                                            <span class="input-group-btn"></span>
                                        </div>
                                    </td>
                                    <td class="text-right">{{$cart->product->price}} تومان</td>
                                    <td class="text-right">{{$cart->product->price*$cart->num}} تومان</td>
                                    <td>
                                        <a style="float: right" onclick="myFunction({{$cart->product->id}})">
                                            <img src="/image/cancel.png">
                                        </a>
                                    </td>
                                    <?php $sum += $cart->product->price * $cart->num ;  ?>
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
                                    <td class="text-right"><strong>جمع کل:</strong></td>
                                    <td class="text-right">{{$sum}} تومان</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="buttons" style="overflow: unset; margin-bottom: 100px">
                        <div class="pull-left">
                            <a style="color: #f5f5f5;background-color:#c68d1e;" href="{{route('data')}}"
                               class="btn btn-default edame">ادامه خرید</a>
                        </div>
                    </div>
                </div>
                <!--Middle Part End -->
                <script>
                    function myFunction(x) {
                        $(document).ready(function () {
                            toastr.error('<a class="sss" href="/cart/destroy/'+x+'">بله</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="sss" href="/cart">خیر</a>', "آیا از حذف این محصول اطمینان دارید؟", {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-bottom-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": 0,
                                "extendedTimeOut": 0,
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "tapToDismiss": false
                            })
                        });
                    }
                </script>

            </div>
        </div>
    </div>
@endsection