@extends('layouts.front')
@section('content')
    <style>
        label {
            margin: 70px 60px 30px 0
        }
    </style>
    <p style="margin-right:145px;margin-top: 40px;font-size: 19px;color:#2d2d2d;border-bottom: 1px solid #e2e2e2;
    width: 800px;
    padding-bottom: 5px;"><i class="icon-check"></i>
        انتخاب شیوه پرداخت
    </p>
    <form method="post" action="{{route('finish')}}">
        {{csrf_field()}}
        <div style="margin:10px 200px 120px 0;height: 290px">
            <input type="radio" name="payment" value="اینترنتی" style="height: 18px;width: 18px"
                   id="input-company">
            <img src="/image/credit-card.png" style="width: 50px;margin: 0 45px -17px 0">
            <label for="input-company" style="font-size: 22px;position: relative">پرداخت اینترنتی ( آنلاین با تمامی
                کارت‌های
                بانکی )</label>
            <span style="position: absolute;top:345px;right:384px;font-size: 16px;color: #7f8c9a">سرعت بیشتر در ارسال و پردازش سفارش</span><br>
            <input type="radio" name="payment" value="در محل" style="height: 18px;width: 18px" id="input-company2">
            <img src="/image/point-of-service.png" style="width: 50px;margin: 0 45px -17px 0">
            <label for="input-company2" style="font-size: 22px">پرداخت در محل</label>
            <span style="position: absolute;top:465px;right:384px;font-size: 16px;color: #7f8c9a">پرداخت در محل با کارت بانکی</span>
            <div class="buttons" style="margin: 50px 550px 20px 0">
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary" value="ثبت نهایی سفارش">
                </div>
            </div>
        </div>
    </form>
@endsection

