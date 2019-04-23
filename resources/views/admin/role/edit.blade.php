@extends('layouts.admin')
@section('content')
    <section class="panel">
        <h3 style="font-weight:bold;margin-right: 10px;margin-top: 30px"><i class="icon-edit"></i>
            ویرایش سطوح دسترسی
        </h3>
        <br>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                  action="{{ route('role.update',['id'=>$role->id]) }}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 10.333333%">دسترسی</label>
                    <div class="col-sm-3">
                        <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 10.333333%">عنوان دسترسی</label>
                    <div class="col-sm-3">
                        <input type="text" name="brand" class="form-control" value="{{ $role->title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 12.333333%;">دسترسی ها</label>
                    <div class="col-sm-3">
                        <select name="permission_id[]" style="width: 120px;" multiple>
                            @foreach($permissions  as $permission)
                                <option value="{{$permission->id}}">
                                    {{$permission->title}}
                                </option>
                            @endforeach
                        </select>
                        <p style="margin-top:7px;color:#a0a0a0;margin-right:5px">برای انتخاب چند مورد از کلید ctrl
                            استفاده کنید.</p>
                        <div class="alert alert-info" role="alert">
                            <p style="color:#1a981c;">دسترسی های جاری این سطح:</p>
                            @foreach($selects  as $select)
                                <strong>{{$select->title}} ,</strong>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-offset-2 col-lg-10" style="margin-top: -26px">
                    <button style="margin-left: 8px;" class="btn btn-success btn-x" type="submit">ذخیره</button>
                    <a class="btn btn-danger" href="{{route('role.index')}}"> لغو</a>

                </div>
            </form>
        </div>
    </section>
@endsection