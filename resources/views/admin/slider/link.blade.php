@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header>

            <div style="width:100%;height: 70px;display : flex;flex-direction: row;margin:6px 3px 4px 0;">

                <h3 style="font-weight:bold;margin: 19px 12px 0 0;"><i class="icon-link"></i>
                    لینکدار کردن تصاویر اسلایدر
                </h3>

            </div>
        </header>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><i class="icon-picture"></i> اسلاید </th>
                <th><i class="icon-link"></i>لینک</th>
                {{--<th><i class="icon-plus"></i> ثبت</th>--}}

            </tr>
            </thead>
            <tbody>
            @foreach($slides as $slide)
                <tr>
                    <form action="{{route('slider.store',['image'=>$slide->id])}}" method="post">
                        {{csrf_field()}}
                    <td><img src="{{$slide->url}}" class="img-rounded" style="width: 280px"></td>
                    <td><input style="width: 450px;direction: ltr;padding-left: 5px;"
                                type="text" name="link" placeholder="https://www.yourlink.com">
                 <button style="margin:0 -4px 0 0;background-color:#78CD51;border-radius: 0;border: none;padding: 3px 7px 3px 7px;" type="submit">
                     <i class="icon-plus" style="color: #e7e7e7"></i>
                 </button>
                    </td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>

    </section>
@endsection