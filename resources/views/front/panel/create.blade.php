@extends('layouts.panel')
@section('content')
    <style>
        #ask{color: #0b0b0b!important;}
    </style>
    <section class="panel">
        <div style="background-image:url('/image/profile-header-img.jpg');width:850px;height:80px;margin-bottom:10px;">
        <span style="background-color: #eaeaea;color: #5f5f5f;padding: 0px 10px 0px 10px;margin: 25px 26px 0 0;float: right;font-size: 20px;">
            <i class="fa  fa-comments" style="font-size: 14px;margin-left:3px;vertical-align: middle"></i>ارسال تیکت
        </span>
        </div>
        <br>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                  action="{{route('ask_user.store')}}">
                {{csrf_field()}}
                <div>
                    <label>موضوع:</label>
                    <input type="text" name="subject" value="{{ old('subject') }}" style="margin-right:24px;width:300px">
                </div><br>

                {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>--}}
                {{--<script>tinymce.init({selector: 'textarea'});</script>--}}
                <div id="editor">
                    <label style="margin-left: 10px;">متن تیکت:</label><br>
                    <textarea id='edit' name="text" cols="100" rows="15"
                              style="margin: -25px 67px 0 0;height:200px;width:580px;">{{ old('text') }}</textarea>
                </div>


                <div class="bottom_lap">
                    <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">ارسال</button>
                    <button class="btn btn-danger" type="reset"> لغو</button>
                </div>

            </form>
        </div>
    </section>
@endsection