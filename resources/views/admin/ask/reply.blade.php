@extends('layouts.admin')
@section('script')
@endsection
@section('content')
    <section class="panel">
        <header>
            <h3 style="font-weight:bold"><i class="icon-double-angle-left"></i> جزئیات تیکت </h3>
        </header>
        <br>
        <div style="width: 100%;height:300px;overflow:auto">
            @foreach($asks as $a)
                <?php $from = Illuminate\Foundation\Auth\User::where('id', $a->from)->first(); ?>
                <div style="border-right:3px solid #d0d0d0;padding:2px 11px 2px 0px;margin-right: 18px">
                    <span style="font-size: 12px;color: #7f7f7f">{{$from->email}}</span><br>
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
                  action="{{route('ask.reply_store')}}">
                {{csrf_field()}}
                <input type="text" name="to" value="{{$ask->from }}"
                       style="margin-right:48px;width:300px;display: none">
                <div>
                    <label>موضوع:</label>
                    <input type="text" name="subject" value="{{ $ask->subject }}" style="margin-right:24px;width:300px"
                           readonly>
                </div>
                <br>
                {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>--}}
                {{--<script>tinymce.init({selector: 'textarea'});</script>--}}
                <div id="editor">
                    <label style="margin-left: 10px">متن تیکت:</label>
                    <textarea id='edit' name="text" cols="150" rows="15"
                              style="direction: rtl">{{ old('text') }}</textarea>
                </div>
                <div class="bottom_lap">
                    <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">ارسال</button>
                    <button class="btn btn-danger" type="reset"> لغو</button>
                </div>
            </form>
        </div>
    </section>
@endsection