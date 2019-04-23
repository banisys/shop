@extends('layouts.admin')
@section('content')
    <section class="panel">
        <style> body{overflow-x: hidden;}</style>

        <header>
            <div style="width:100%;height:60px;display : flex;flex-direction: row;">
                <h3 style="font-weight:bold;margin-bottom: 0;"><i class="icon-picture"></i>افزودن اسلایدر</h3>
            </div>
        </header>

        <div class="panel-body">
            <form action="{{route('slider.upload')}}" method="post" class="dropzone">
                {{csrf_field()}}
                <input type="file" name="file" style="display: none" multiple/>
            </form>

            <div style="display : flex;flex-direction: row;margin:0 3px 4px 0;align-self: right;flex-wrap: wrap;">
                @foreach($slides as $slide)
                    <div style="margin-left: 30px; margin-top: 25px;border: 1px solid rgba(126,170,85,0.71); padding: 15px" >
                        <a style="float: right" href="{{route('slider.destroy_image',['id'=>$slide->id])}}">
                            <img src="/image/cancel.png">
                        </a>
                        <img src="{{$slide->url}}" class="img-rounded" style="width: 185px">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="/js/dropzone.js"></script>
    <link rel="stylesheet" href="/css/dropzone.css">
@endsection
