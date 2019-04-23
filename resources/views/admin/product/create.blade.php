@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            افزودن محصول جدید
        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" action="{{route('product.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">نام محصول</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">برند</label>
                    <div class="col-sm-10">
                        <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">تصویر</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control round-input">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">قیمت</label>
                    <div class="col-sm-10">
                        <input type="text" name="price" class="form-control" value="{{  old('price') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">توضیحات محصول</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="" cols="80" rows="10">{{ old('body') }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">تخفیف</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="discount" value="{{ old('discount') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">تعداد موجودی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="count" value="{{ old('count') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">وضعیت محصول</label>
                    <div class="col-sm-10">
                        <input type="checkbox" name="status" value="1" checked> موجود
                    </div>
                </div>
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-danger" type="submit">Save</button>
                    <button class="btn btn-default" type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </section>
@endsection