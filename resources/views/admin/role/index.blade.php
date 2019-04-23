@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header>
            <div style="width:100%;height: 70px;display : flex;flex-direction: row;margin:6px 3px 4px 0;">
                <h3 style="font-weight:bold;margin: 19px 12px 0 0;"><i class="icon-check"></i>
                    لیست سطوح دسترسی
                </h3>

                <a class="btn btn-success btn-xs" href="{{route('role.create')}}" style="height: 26px;margin: 23px 16px 0 0;">
                    <i class="icon-plus"></i> افزودن سطح دسترسی جدید
                </a>

                <form style="margin: 17px 466px 0 0">
                    <input class="form-control" style="width: 260px;display: unset" type="text" name="title"
                           placeholder="جستجو بر اساس عنوان سطح دسترسی">
                    <input type="submit" value="جستجو" class="btn btn-success btn-sm">
                </form>
            </div>
        </header>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><i class="icon-tag"></i> نام سطح دسترسی</th>
                <th><i class="icon-bookmark"></i> عنوان سطح دسترسی</th>
                <th><i class="icon-edit"></i> ویرایش</th>
                <th><i class="icon-trash"></i> حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->title}}</td>
                    <td>
                        <a class="btn btn-success btn-xs" href="{{ route('role.edit',['id'=>$role->id]) }}">ویرایش</a>
                    </td>
                    <td>
                        <form action="{{ route('role.destroy',['id'=>$role->id])}}" method="post">
                            {{ method_field('delete') }}
                            {{csrf_field()}}
                            <button class="btn btn-danger btn-xs" type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($x == 0)
            <div class="alert alert-danger" style="margin-top: 10px;">
                موردی یافت نشد.
            </div>
        @endif

    </section>
    <div class="text-center">
        {{$roles->links()}}
    </div>

@endsection