@extends('layouts.panel')
@section('content')
    <style>
        #ask{color: #0b0b0b!important;}

    </style>
    <div style="background-image:url('/image/profile-header-img.jpg');width:850px;height:80px;margin-bottom:30px;">
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
    </section>
@endsection