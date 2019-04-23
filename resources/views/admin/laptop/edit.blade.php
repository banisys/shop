@extends('layouts.admin')
@section('content')

    <section class="panel" >
        <header class="panel-heading" style="padding: 0px;margin: 5px 10px 0 0;">
            <div style="width:100%;height:60px;display : flex;flex-direction: row;">
                <h3 style="font-weight:bold;margin-bottom: 0;"><i class="icon-edit"></i> ویرایش {{ $laptop->name }}</h3>

            </div>

        </header>
        <div class="panel-body" >
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                  action="{{route('laptop.update',['id'=> $laptop->id])}}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <label style="color: #479236;font-size:17px ;margin: 0 -10px 3px 0;">مشخصات عمومی</label>
                <div class="general_lap">
                    <div>
                        <label>نام:</label>
                        <input type="text" name="name" value="{{ $laptop->name }}">
                    </div>

                    <div>
                        <label>برند:</label>
                        <input type="text" name="brand" value="{{ $laptop->brand }}">
                    </div>

                    <div>
                        <label>قیمت:</label>
                        <input type="text" name="price" value="{{$laptop->price}}">
                    </div>

                    <div>
                        <label>تخفیف:</label>
                        <input type="text" name="discount" value="{{ $laptop->discount }}">
                    </div>

                    <div>
                        <label>تعداد موجود:</label>
                        <input type="text" name="count" value="{{ $laptop->count }}">
                    </div>


                    <div>
                        <label>پیشنهاد ویژه:</label>
                        <input type="checkbox" name="suggestion"
                               value="1" @if($laptop->suggestion==1) {{"checked"}} @endif>
                    </div>

                    <div>
                        <label style="margin-right: 134px">کالای محبوب:</label>
                        <input type="checkbox" name="popular"
                               value="1" @if($laptop->popular==1) {{"checked"}} @endif>
                    </div>

                    <div style="position:relative;margin: 32px 83px 0 0;">
                        <label>رنگ:</label>
                        <select name="colors[]"
                                style="width:135px;height:54px;position: absolute;top:-15px;right: 108px" multiple>
                            <option value="مشکی">مشکی</option>
                            <option value="سفید">سفید</option>
                            <option value="نقره ای">نقره ای</option>
                            <option value="آبی">آبی</option>
                            <option value="قرمز">قرمز</option>
                        </select>

                    </div>
                </div>


                <label style="color: #479236;font-size:17px ;margin: 35px -10px 3px 0;">مشخصات پردازنده</label>
                <div class="general_lap" style="height: 115px">

                    <div>
                        <label>سازنده:</label>
                        <input type="text" name="cpu_maker" value="{{ $laptop->laptop->cpu_maker }}">
                    </div>

                    <div>
                        <label>مدل:</label>
                        <input type="text" name="cpu_model" value="{{ $laptop->laptop->cpu_model }}">
                    </div>

                    <div>
                        <label>سری:</label>
                        <input type="text" name="cpu_series" value="{{  $laptop->laptop->cpu_series }}">
                    </div>

                    <div>
                        <label>سرعت:</label>
                        <input type="text" name="cpu_speed" value="{{ $laptop->laptop->cpu_speed }}">
                    </div>

                    <div>
                        <label>فرکانس:</label>
                        <input type="text" name="cpu_frequency" value="{{ $laptop->laptop->cpu_frequency }}">
                    </div>

                </div>

                <label style="color: #479236;font-size:17px ;margin: 0 -10px 3px 0;">مشخصات رم</label>
                <div class="general_lap" style="height: 115px">

                    <div>
                        <label>نوع:</label>
                        <input type="text" name="ram_sort" value="{{ $laptop->laptop->ram_sort }}">
                    </div>

                    <div>
                        <label>ظرفیت:</label>
                        <input type="text" name="ram_capacity" value="{{ $laptop->laptop->ram_capacity }}">
                    </div>


                </div>

                <label style="color: #479236;font-size:17px ;margin: 0 -10px 3px 0;">مشخصات کارت گرافیک</label>
                <div class="general_lap" style="height: 115px">

                    <div>
                        <label>سازنده:</label>
                        <input type="text" name="gpu_maker" value="{{ $laptop->laptop->gpu_maker }}">
                    </div>

                    <div>
                        <label>مدل:</label>
                        <input type="text" name="gpu_model" value="{{ $laptop->laptop->gpu_model }}">
                    </div>

                    <div>
                        <label>حافظه:</label>
                        <input type="text" name="gpu_ram" value="{{  $laptop->laptop->gpu_ram }}">
                    </div>

                </div>

                <label style="color: #479236;font-size:17px ;margin: 0 -10px 3px 0;">مشخصات صفحه نمایش</label>
                <div class="general_lap" style="height: 115px">

                    <div>
                        <label>اندازه:</label>
                        <input type="text" name="screen_size" value="{{ $laptop->laptop->screen_size }}">
                    </div>

                    <div>
                        <label>نوع:</label>
                        <input type="text" name="screen_sort" value="{{ $laptop->laptop->screen_sort }}">
                    </div>

                    <div>
                        <label>جنس:</label>
                        <input type="text" name="screen_material" value="{{  $laptop->laptop->screen_material }}">
                    </div>

                    <div>
                        <label>رزولیشن:</label>
                        <input type="text" name="screen_resolution" value="{{ $laptop->laptop->screen_resolution }}">
                    </div>

                    <div>
                        <label>لمسی:</label>
                        <input type="checkbox" name="screen_touch" value="1">
                    </div>


                </div>

                <label style="color: #479236;font-size:17px ;margin: 0 -10px 3px 0;">دیگر مشخصات</label>
                <div class="general_lap others" style="height: 250px;">

                    <div>
                        <label>ابعاد:</label>
                        <input type="text" name="dimensions" value="{{ $laptop->laptop->dimensions }}">
                    </div>

                    <div>
                        <label style="margin-right: 112px;">وزن:</label>
                        <input type="text" name="weight" value="{{ $laptop->laptop->weight }}">
                    </div>

                    <div>
                        <label style="margin-right: 100px;">میزان هارد:</label>
                        <input type="text" name="hard_capacity" value="{{  $laptop->laptop->hard_capacity }}">
                    </div>

                    <div>
                        <label style="margin-right: 53px;">نوع هارد دیسک:</label>
                        <input type="text" name="hard_sort" value="{{ $laptop->laptop->hard_sort }}">
                    </div>

                    <div>
                        <label>نوع درایو نوری:</label>
                        <input type="text" name="disk_drive" value="{{ $laptop->laptop->disk_drive }}">
                    </div>

                    <div>
                        <label>نوع مودم:</label>
                        <input type="text" name="modem" value="{{ $laptop->laptop->modem }}">
                    </div>
                    <div>
                        <label style="margin-right: 79px;">نوع وبکم:</label>
                        <input type="text" name="webcam" value="{{ $laptop->laptop->webcam }}">
                    </div>
                    <div>
                        <label>نوع اسپیکر:</label>
                        <input type="text" name="speaker" value="{{ $laptop->laptop->speaker }}">
                    </div>
                    <div>
                        <label>تعداد usb2:</label>
                        <input type="text" name="usb2" value="{{ $laptop->laptop->usb2 }}">
                    </div>
                    <div>
                        <label style="margin-right: 70px;">تعداد usb3:</label>
                        <input type="text" name="usb3" value="{{ $laptop->laptop->usb3 }}">
                    </div>
                    <div>
                        <label>نوع باتری:</label>
                        <input type="text" name="battery" value="{{ $laptop->laptop->battery }}">
                    </div>
                    <div>
                        <label>سیستم عامل:</label>
                        <input type="text" name="os" value="{{ $laptop->laptop->os }}">
                    </div>


                    <div>
                        <label>تشخیص اثر انگشت:</label>
                        <input type="checkbox" name="finger_touch"
                               value="1" @if($laptop->laptop->finger_touch==1) {{"checked"}} @endif>
                    </div>

                    <div>
                        <label style="margin-right: 158px;">پورت شبکه:</label>
                        <input type="checkbox" name="ethernet"
                               value="1" @if($laptop->laptop->ethernet==1) {{"checked"}} @endif>
                    </div>

                    <div>
                        <label style="margin-right: 190px;">wifi:</label>
                        <input type="checkbox" name="wifi"
                               value="1" @if($laptop->laptop->wifi==1) {{"checked"}} @endif >
                    </div>


                </div>
                <br><br><br><br><br>
                <div>
                    <label style="margin-left: 10px">نقد و بررسی:</label>
                    <textarea name="description" id="" cols="150"
                              rows="15">{{ $laptop->laptop->description }}</textarea>
                </div>


                <div class="bottom_lap">
                    <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">افزودن</button>
                    <button class="btn btn-danger" type="reset"> لغو</button>
                </div>
            </form>

            <style>
                #fileUpload {
                    display: none;
                }
            </style>
            <label style="color: #479236;font-size:17px ;margin: 40px -10px 3px 0;">تصویر شاخص</label>
            <form class="form-horizontal tasi-form general_lap" method="post" enctype="multipart/form-data" id="form"
                  action="{{route('laptop.store_thumbnail',['image'=>$laptop->id])}}" style="margin:0 -28px 0 0;">
                {{csrf_field()}}
                <div style="width:300px;height:34px;display : flex;flex-direction: row;margin: 40px 32px 300px 0;">
                    <input type="file" id="fileUpload" name="pic">
                    <div class="btn btn-info btn-x button" id="customButton"><i class=" icon-picture"></i> انتخاب تصویر
                        شاخص
                    </div>
                    <span id="fileName" style="margin: 8px 11px 0 0;color: #00abea"></span>

                    @if(isset($laptop->image))
                        <div style="width:300px;height:253px;display : flex;flex-direction: row;margin: 0 50px 0 0">
                            <div style="width: 230px;border: 1px solid rgba(126,170,85,0.71); padding: 15px">
                                <a style="float: right"
                                   href="{{route('laptop.destroy_thumbnail',['image'=>$laptop->id])}}"
                                   name="pic">
                                    <img src="/image/cancel.png">
                                </a>

                                <img src="{{ $laptop->image}} " class="img-rounded" style="width: 185px">

                            </div>
                        </div>
                    @endif
                </div>
            </form>

            <script type="text/javascript">
                document.getElementById("customButton").addEventListener("click", function () {
                    document.getElementById("fileUpload").click();  // trigger the click of actual file upload button
                });

                document.getElementById("fileUpload").addEventListener("change", function () {
                    var fullPath = document.getElementById('fileUpload').value;
                    var fileName = fullPath.split(/(\\|\/)/g).pop();  // fetch the file name
                    document.getElementById("fileName").innerHTML = fileName;  // display the file name
                }, false);
                document.getElementById("fileUpload").onchange = function () {
                    document.getElementById("form").submit();
                };

            </script>


        </div>
    </section>
    <?php $laptop->save() ?>

@endsection
