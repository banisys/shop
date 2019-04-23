@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header>

            <div style="width:100%;height: 70px;display : flex;flex-direction: row;margin:6px 3px 4px 0;">

                <h3 style="font-weight:bold;margin: 19px 12px 0 0;"><i class="icon-user"></i>
                    لیست لپ تاپ ها
                </h3>

                <a class="btn btn-success btn-xs" href="{{route('laptop.create')}}"
                   style="height: 26px;margin: 23px 16px 0 0;">
                    <i class="icon-plus"></i> افزودن لپ تاپ جدید
                </a>

                <form style="margin: 17px 400px 0 0">
                    <input class="form-control" style="width: 120px;display: unset" type="text" name="id"
                           placeholder="جستجو بر اساس کد">
                    <input class="form-control" style="width: 140px;display: unset" type="text" name="state"
                           placeholder="جستجو بر اساس استان">
                    <input class="form-control" style="width: 160px;display: unset" type="text" name="email"
                           placeholder="جستجو بر اساس متقاضی">

                    <input type="submit" value="جستجو" class="btn btn-success btn-sm">
                </form>
            </div>
        </header>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><i class="icon-list"></i> کد</th>
                <th><i class="icon-user"></i> متقاضی</th>
                <th><i class="icon-tag"></i> پست</th>
                <th><i class="icon-location-arrow"></i> استان</th>
                <th><i class=" icon-calendar"></i> تاریخ</th>
                <th><i class="icon-file-text-alt"></i> فاکتور</th>
                <th><i class="icon-eye-open"></i> وضعیت</th>
                <th><i class="icon-trash"></i> حذف</th>

            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td style="background-color: <?php if ($order->read == 1) echo '#d0ffc2'; else echo '#ffdaa5'; ?>">{{$order->id}}</td>
                    <td>{{$order->user->email}}</td>
                    <td>{{$order->post}}</td>
                    <td>{{$order->state}}</td>
                    <td>{{ Verta::instance($order->created_at)->format('Y/n/j') }}</td>
                    <td>
                        <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                              action="{{route('order.status',['order'=>$order->id])}}" id="my_form">
                            {{csrf_field()}}
                            <select name="status" style="padding-right:15px">
                                <option value="در صف بررسی" <?php if($order->status == "در صف بررسی") echo "selected"?>>در صف بررسی</option>
                                <option value="آماده ارسال" <?php if($order->status == "آماده ارسال") echo "selected"?>>آماده ارسال</option>
                                <option value="ارسال شد" <?php if($order->status == "ارسال شد") echo "selected"?>>ارسال شد</option>
                            </select>
                            <input type="submit" id="refresh" style="width:5px;height:21px;opacity:0;z-index: 5">
                            <a style="margin-right:-18px;" ><i class="icon-refresh" style="color: #1c7430"></i></a>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('order.admin_factor',['o'=>$order->id])}}"
                           class="btn btn-info btn-xs">فاکتور</a>
                    </td>

                    <td>
                        <a href="{{route('order.destroy',['o'=>$order->id])}}" class="btn btn-danger btn-xs"> حذف</a>
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