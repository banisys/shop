@extends('layouts.admin')
@section('content')
    <style>
        .table-striped>tbody>tr:nth-child(even){
            background-color: #d6ecbaa1;
        }
    </style>
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
                    <input class="form-control" style="width: 140px;display: unset" type="text" name="name"
                           placeholder="جستجو بر اساس نام">
                    <input class="form-control" style="width: 140px;display: unset" type="text" name="brand"
                           placeholder="جستجو بر اساس برند">
                    <input class="form-control" style="width: 140px;display: unset" type="text" name="id"
                           placeholder="جستجو بر اساس کد">

                    <input type="submit" value="جستجو" class="btn btn-success btn-sm">
                </form>
            </div>
        </header>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><i class="icon-list"></i> کد</th>
                <th><i class="icon-tag"></i> نام</th>
                <th><i class="icon-bookmark"></i> برند</th>
                <th><i class="icon-plus"></i> تعداد موجود</th>
                <th><i class=" icon-calendar"></i> آخرین بروزرسانی</th>
                <th><i class=" icon-picture"></i> گالری تصاویر</th>
                <th><i class="icon-edit"></i> ویرایش</th>
                <th><i class="icon-trash"></i> حذف</th>

            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->brand}}</td>
                    <td>{{$product->count}}</td>
                    <td>{{ Verta::instance($product->updated_at)->format('Y/n/j') }}</td>
                    <td>
                        <a href="{{route('laptop.gallery',['id'=>$product->id])}}" class="btn btn-info btn-xs"> تصاویر </a>
                    </td>
                    <td>
                        <a href="{{route('laptop.edit',['id'=>$product->id])}}" class="btn btn-success btn-xs"> ویرایش </a>
                    </td>
                    <td>
                        <form action="{{route('laptop.destroy',['id'=>$product->id])}}" method="post">
                            {{ method_field('delete') }}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger btn-xs"> حذف </button>
                        </form>
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
    <style>
        .dd>ul{width: 380px}
    </style>
    <div class="text-center dd">
        {{$products->links()}}

    </div>
@endsection