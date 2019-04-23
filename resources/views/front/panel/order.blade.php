@extends('layouts.panel')
@section('content')
    <style>
        #order{color: #0b0b0b!important;}
    </style>
    <div style="background-image:url('/image/profile-header-img.jpg');width:850px;height:80px;margin-bottom:10px;">
        <span style="background-color: #eaeaea;color: #5f5f5f;padding: 0px 10px 0px 10px;margin: 25px 26px 0 0;float: right;font-size: 20px;">
            <i class="fa  fa-edit" style="font-size: 14px;margin-left:3px;vertical-align: middle"></i>سفارشات
        </span>
    </div>
    <section class="panel" style="width: 850px">
        <table class="table table-bordered">
            <thead style="background-color: #2d2d2d;color:#e8e8e8;">
            <tr>
                <th><i class="icon-list"></i> کد</th>
                <th><i class=" icon-calendar"></i> تاریخ</th>
                <th><i class="icon-file-text-alt"></i> فاکتور</th>
                <th><i class="icon-eye-open"></i> وضعیت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{ Verta::instance($order->created_at)->format('Y/n/j') }}</td>
                    <td><?php if (isset($order->status)) echo $order->status; else echo "در صف بررسی"; ?></td>
                    <td>
                        <a href="{{route('order.admin_factor',['o'=>$order->id])}}" class="btn btn-info btn-xs">
                            فاکتور </a>
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
        {{$orders->links()}}
    </div>
@endsection