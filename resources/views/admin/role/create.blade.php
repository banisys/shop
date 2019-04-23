@extends('layouts.admin')
@section('content')
    <section class="panel">
        <h3 style="font-weight:bold;"><i class="icon-check"></i>
            افزودن سطح دسترسی جدید
        </h3>
        <br>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" action="{{route('role.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 12.333333%;">نام سطح دسترسی</label>
                    <div class="col-sm-3">
                        <input type="text" name="name" class="form-control khata"
                               placeholder=" @if ($errors->has('name')) {{ $errors->first('name') }} @endif"
                               value="{{ old('name') }}" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 12.333333%;">عنوان</label>
                    <div class="col-sm-3">
                        <input type="text" name="title" class="form-control khata"
                               placeholder="@if ($errors->has('title')) {{ $errors->first('title') }} @endif"
                               value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 12.333333%;">دسترسی ها</label>
                    <div class="col-sm-3">
                        <select name="permission_id[]" style="width: 120px" multiple>
                            @foreach($permissions  as $permission)
                                <option value="{{$permission->id}}">
                                    {{$permission->title}}
                                </option>
                            @endforeach
                        </select>
                        <p style="margin-top:7px;color:#a0a0a0;margin-right:5px">برای انتخاب چند مورد از کلید Ctrl استفاده کنید.</p>
                    </div>
                </div>
                <div class="col-lg-offset-2 col-lg-10">
                    <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">افزودن</button>
                    <button class="btn btn-danger" type="reset">  لغو </button>
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