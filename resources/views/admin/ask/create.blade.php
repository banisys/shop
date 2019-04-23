@extends('layouts.admin')
@section('script')
@endsection
@section('content')
    <section class="panel">
        <header>
            <div style="width:100%;height:60px;display : flex;flex-direction: row;">
                <h3 style="font-weight:bold;margin-bottom: 0;"><i class="icon-question-sign"></i> ارسال تیکت </h3>
            </div>
        </header>
        <br>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                  action="{{route('ask.store')}}">
                {{csrf_field()}}

                    <div>
                        <label>به:</label>
                        <input type="text" name="to" value="{{ old('to') }}" style="margin-right:48px;width:300px">
                    </div><br>

                    <div>
                        <label>موضوع:</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" style="margin-right:24px;width:300px">
                    </div><br>

                    {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>--}}
                    {{--<script>tinymce.init({selector: 'textarea'});</script>--}}
                    <div id="editor">
                        <label style="margin-left: 10px">متن تیکت:</label>
                        <textarea id='edit' name="text" cols="150" rows="15">{{ old('text') }}</textarea>
                    </div>


                    <div class="bottom_lap">
                        <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">ارسال</button>
                        <button class="btn btn-danger" type="reset"> لغو</button>
                    </div>

            </form>
        </div>
    </section>
@endsection