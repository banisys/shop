@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header>
            <div style="width:100%;height: 70px;display : flex;flex-direction: row;margin:6px 3px 4px 0;">

            <h3 style="font-weight:bold;margin: 19px 12px 0 0;"><i class="icon-lock"></i>
                لیست دسترسی ها
            </h3>

                <a class="btn btn-success btn-xs" href="{{route('permission.create')}}" style="height: 26px;margin: 23px 16px 0 0;">
                    <i class="icon-plus"></i> افزودن دسترسی جدید
                </a>

                <form style="margin: 17px 536px 0 0">
                <input class="form-control" style="width: 260px;display: unset" type="text" name="title" placeholder="جستجو بر اساس عنوان دسترسی">
                <input type="submit" value="جستجو" class="btn btn-success btn-sm">
            </form>
            </div>
        </header>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><i class="icon-tag"></i> نام دسترسی </th>
                <th><i class="icon-bookmark"></i> عنوان دسترسی </th>
                <th><i class="icon-edit"></i> ویرایش </th>
                <th><i class="icon-trash"></i> حذف</th>
            </tr>
            </thead>
            <tbody>

            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->title }}</td>
                    <td>&nbsp;
                        <a class="btn btn-success btn-xs"  href="{{ route('permission.edit',['id'=>$permission->id]) }}">ویرایش</a>
                    </td>
                    <td>
                        <form action="{{route('permission.destroy',['id'=>$permission->id])}}" method="post">
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
                موردی یافت نشد.
            </div>
        @endif
    </section>
    <div class="text-center">
        {{$permissions->links()}}
    </div>
@endsection