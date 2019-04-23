{{--@extends('layouts.admin')--}}
{{--@section('content')--}}
    {{--<section class="panel">--}}
        {{--<header>--}}

            {{--<div style="width:100%;height: 70px;display : flex;flex-direction: row;margin:6px 3px 4px 0;">--}}

                {{--<h3 style="font-weight:bold;margin: 19px 12px 0 0;"><i class="icon-user"></i>--}}
                    {{--لیست لپ تاپ ها--}}
                {{--</h3>--}}

                {{--<a class="btn btn-success btn-xs" href="{{route('laptop.create')}}"--}}
                   {{--style="height: 26px;margin: 23px 16px 0 0;">--}}
                    {{--<i class="icon-plus"></i> افزودن لپ تاپ جدید--}}
                {{--</a>--}}

                {{--<form style="margin: 17px 532px 0 0">--}}
                    {{--<input class="form-control" style="width: 140px;display: unset" type="text" name="email"--}}
                           {{--placeholder="جستجو بر اساس نام">--}}
                    {{--<input class="form-control" style="width: 140px;display: unset" type="text" name="email"--}}
                           {{--placeholder="جستجو بر اساس برند">--}}

                    {{--<input type="submit" value="جستجو" class="btn btn-success btn-sm">--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</header>--}}
        {{--<table class="table table-striped table-advance table-hover">--}}
            {{--<thead>--}}
            {{--<tr>--}}

                {{--<th><i class="icon-bullhorn"></i> نام</th>--}}
                {{--<th><i class="icon-question-sign"></i> برند</th>--}}
                {{--<th><i class="icon-bullhorn"></i> وضعیت</th>--}}
                {{--<th><i class=" icon-edit"></i> قیمت</th>--}}
                {{--<th><i class=" icon-edit"></i> آخرین بروزرسانی</th>--}}
                {{--<th> ویرایش</th>--}}
                {{--<th> حذف</th>--}}

            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@foreach($products as $product)--}}
                {{--<tr>--}}
                    {{--{{$product->mobile->camera}}--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td><a href="#">{{$product->name}}</a></td>--}}
                    {{--<td class="hidden-phone">{{$product->brand}}</td>--}}

                    {{--<td>{{number_format($product->price)}}</td>--}}

                    {{--<td>--}}
                        {{--&nbsp;--}}
                        {{--<a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-success btn-xs"><i--}}
                                    {{--class="icon-ok"></i>ویرایش</a>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<form action="{{route('product.destroy',['id'=>$product->id])}}" method="post">--}}
                            {{--{{ method_field('delete') }}--}}
                            {{--{{csrf_field()}}--}}
                            {{--<button type="submit" class="btn btn-success btn-xs"><i class="icon-ok"></i>حذف</button>--}}
                        {{--</form>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--</section>--}}
    {{--<div class="text-center">--}}
        {{--{{$products->links()}}--}}
    {{--</div>--}}
{{--@endsection--}}