@extends('layouts.admin')
@section('content')
    <section class="panel">
        <h3 style="font-weight:bold;margin-right: 10px;margin-top: 30px"><i class="icon-lock"></i>
            افزودن دسترسی جدید
        </h3>
        <br>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                  action="{{route('permission.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-1 control-label">نام دسترسی</label>
                    <div class="col-sm-3">
                        <input type="text" name="name" class="form-control khata"
                               placeholder=" @if ($errors->has('name')) {{ $errors->first('name') }} @endif"
                               value="{{ old('name') }}" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">عنوان</label>
                    <div class="col-sm-3">
                        <input type="text" name="title" class="form-control khata"
                               placeholder="@if ($errors->has('title')) {{ $errors->first('title') }} @endif"
                               value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col-lg-offset-1 col-lg-10">
                    <button style="margin-left: 8px;" class="btn btn-success btn-x" type="submit">ذخیره</button>
                    <button class="btn btn-danger" type="reset"> لغو</button>
                </div>
            </form>
        </div>
        @if(Session::has('store'))
            <div class="alert alert-success" style="margin-top: 10px;">
                مورد با موفقیت ثبت شد.
            </div>
        @endif


    </section>
@endsection