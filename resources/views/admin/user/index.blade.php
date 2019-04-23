@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header>
            <div style="width:100%;height: 70px;display : flex;flex-direction: row;margin:6px 3px 4px 0;">

                <h3 style="font-weight:bold;margin: 19px 12px 0 0;"><i class="icon-user"></i>
                    لیست کاربران
                </h3>

                <form style="margin: 17px 725px 0 0">
                    <input class="form-control" style="width: 260px;display: unset" type="text" name="email"
                           placeholder="جستجو بر اساس ایمیل">
                    <input type="submit" value="جستجو" class="btn btn-success btn-sm">
                </form>
            </div>
        </header>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><i class="icon-user"></i> نام کاربر</th>
                <th><i class="icon-envelope-alt"></i> ایمیل</th>
                <th><i class="icon-check"></i> سطح دسترسی</th>
                <th><i class="icon-calendar"></i> تاریخ ثبت نام</th>
                <th><i class="icon-trash"></i> حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a class="btn btn-success btn-xs" href="{{route('user.edit',['id'=>$user->id])}}">مدیریت سطح
                            دسترسی</a>
                    </td>
                    <td>{{  Verta::instance($user->created_at)->format('Y/n/j')  }}</td>

                    <td>
                        <form action="{{route('user.destroy',['id'=>$user->id])}}" method="post">
                            {{ method_field('delete') }}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger btn-xs">حذف</button>
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
    <div class="text-center">
        {{$users->links()}}
    </div>
@endsection