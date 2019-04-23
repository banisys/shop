@extends('layouts.admin')
@section('content')
    <section class="panel">
        <h3 style="font-weight:bold;margin-right: 10px;margin-top: 30px"><i class="icon-lock"></i>
            ویرایش دسترسی
        </h3>
        <br>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" action="{{ route('permission.update',['id'=>$permission->id]) }}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 10.333333%">دسترسی</label>
                    <div class="col-sm-3">
                        <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 10.333333%">عنوان دسترسی</label>
                    <div class="col-sm-3">
                        <input type="text" name="brand" class="form-control" value="{{ $permission->title }}">
                    </div>
                </div>
                <div class="col-lg-offset-2 col-lg-10">
                    <button style="margin-left: 8px;" class="btn btn-success btn-x" type="submit">ذخیره</button>
                    <a class="btn btn-danger" href="{{route('permission.index')}}"> لغو</a>
                </div>
            </form>
        </div>
    </section>
@endsection