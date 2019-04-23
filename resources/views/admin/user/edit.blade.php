@extends('layouts.admin')
@section('content')
    <section class="panel">
        <h3 style="font-weight:bold;margin-right: 10px;margin-top: 30px"><i class="icon-edit"></i>
            ویرایش سطوح دسترسی {{ $user->name }}
        </h3>
        <br>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                  action="{{route('user.update',['id'=>$user->id])}}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 9.333333%;">نام </label>
                    <div class="col-sm-3">
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 9.333333%;">ایمیل</label>
                    <div class="col-sm-3">
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" style="width: 9.333333%;">سطح دسترسی</label>
                    <div class="col-sm-3">
                        <select name="role_id[]" style="width: 120px;" multiple>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">
                                    {{$role->title}}
                                </option>
                            @endforeach
                        </select>

                        <p style="margin-top:7px;color:#a0a0a0;margin-right:5px">برای انتخاب چند مورد از کلید ctrl
                            استفاده کنید.</p>
                        <div class="alert alert-info" role="alert">
                            <p style="color:#1a981c;">سطوح دسترسی این کاربر:</p>
                            @foreach($selects  as $select)
                                <strong>{{$select->title}} ,</strong>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-offset-2 col-lg-10" style="margin-top: -26px">
                    <button style="margin-left: 8px;" class="btn btn-success btn-x" type="submit">ذخیره</button>
                    <a class="btn btn-danger" href="{{route('user.index')}}"> لغو</a>
                </div>
            </form>
        </div>
    </section>
@endsection