@extends('layouts.panel')
@section('content')
    <style>
        #ask{color: #0b0b0b!important;}
        #back {
            background:
                    url(/image/profile-header-img.jpg) bottom left no-repeat,
        }
    </style>
    <div id="back" style="width:850px;height:80px;margin-bottom:30px;">
        <span style="background-color: #eaeaea;color: #5f5f5f;padding: 0px 10px 0px 10px;margin: 25px 26px 0 0;float: right;font-size: 20px;">
            <i class="fa  fa-comments" style="font-size: 14px;margin-left:3px;vertical-align: middle"></i>جزئیات تیکت
        </span>
    </div>
        <div style="width: 100%;height:300px;overflow:auto">
            @foreach($asks as $a)
                <?php $from = Illuminate\Foundation\Auth\User::where('id', $a->from)->first(); ?>
                <div style="border-right:3px solid #d0d0d0;padding:2px 11px 2px 0px;margin-right: 5px">
                    <span style="font-size: 12px;color: #7f7f7f">{{$from->name}}</span><br>
                    <span style="font-size: 16px"><?php echo $a->text ?></span><br>
                    <span style="font-size: 12px;color: #7f7f7f">{{ Verta::instance($a->created_at)->format('Y/n/j (H:i)') }}</span>
                </div><br>
            @endforeach
        </div>
        <header>
            <h3 style="font-weight:bold"><i class="icon-double-angle-left"></i> پاسخ تیکت </h3>
        </header>

        <div class="panel-body" style="margin-top:20px">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                  action="{{route('ask_user.reply_store')}}">
                {{csrf_field()}}
                <input type="text" name="to" value="{{$ask->from }}"
                       style="margin-right:48px;width:300px;display: none">
                <div>
                    <label>موضوع:</label>
                    <input type="text" name="subject" value="{{ $ask->subject }}" style="margin-right:24px;width:300px;"
                           readonly>
                </div>
                <br>
                {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>--}}
                {{--<script>tinymce.init({selector: 'textarea'});</script>--}}
                <div id="editor">
                    <label style="margin-left: 10px">متن تیکت:</label>
                    <textarea id='edit' name="text" cols="100" rows="15"
                              style="direction: rtl;height:200px">{{ old('text') }}</textarea>
                </div>
                <div class="bottom_lap">
                    <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">ارسال</button>
                    <button class="btn btn-danger" type="reset"> لغو</button>
                </div>
            </form>
        </div>
    </section>
@endsection