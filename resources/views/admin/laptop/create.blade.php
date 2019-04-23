@extends('layouts.admin')
@section('script')
@endsection
@section('content')
    <script src="/js/ckeditor.js"></script>
<style>
    .ck-content{height: 300px;direction: rtl!important; }

</style>
    <section class="panel">
        <header>
            <div style="width:100%;height:60px;display : flex;flex-direction: row;">
                <h3 style="font-weight:bold;margin-bottom: 0;"><i class="icon-laptop"></i> افزودن لپ تاپ جدید </h3>
            </div>
        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data"
                  action="{{route('laptop.store')}}">
                {{csrf_field()}}
                <label style="color: #479236;font-size:17px ;margin: 0 -10px 3px 0;">مشخصات عمومی</label>
                <div class="general_lap">
                    <div>
                        <label>نام:</label>
                        <input type="text" name="name" value="{{ old('name') }}">
                    </div>

                    <div>
                        <label>برند:</label>
                        <input type="text" name="brand" value="{{ old('brand') }}">
                    </div>

                    <div>
                        <label>قیمت:</label>
                        <input type="text" name="price" value="{{  old('price') }}">
                    </div>

                    <div>
                        <label>تخفیف:</label>
                        <input type="text" name="discount" value="{{ old('discount') }}">
                    </div>

                    <div>
                        <label>تعداد موجود:</label>
                        <input type="text" name="count" value="{{ old('count') }}">
                    </div>


                    <div>
                        <label>پیشنهاد ویژه:</label>
                        <input type="checkbox" name="suggestion" value="1">
                    </div>

                    <div style="margin:0 72px 0 0 ">
                        <label>کالای محبوب:</label>
                        <input type="checkbox" name="popular" value="1">
                    </div>
                    <style>
                        #fileUpload {
                            display: none;
                        }
                    </style>


                    <input type="file" name="image" id="fileUpload">
                    <div class="btn btn-info btn-x button" id="customButton"
                         style="height: 35px;margin: 24px 144px 0 0;"><i class=" icon-picture"></i> انتخاب تصویر
                        شاخص
                    </div>
                    <span id="fileName" style="margin: 33px 15px 0 0;color: #00abea"></span>

                    <script type="text/javascript">
                        document.getElementById("customButton").addEventListener("click", function () {
                            document.getElementById("fileUpload").click();  // trigger the click of actual file upload button
                        });

                        document.getElementById("fileUpload").addEventListener("change", function () {
                            var fullPath = document.getElementById('fileUpload').value;
                            var fileName = fullPath.split(/(\\|\/)/g).pop();  // fetch the file name
                            document.getElementById("fileName").innerHTML = fileName;  // display the file name
                        }, false);

                    </script>
                    <div style="position:relative;margin: 32px 22px 0 0;">
                        <label >رنگ:</label>
                        <select name="colors[]" style="width:135px;height:54px;position: absolute;top:-15px;right: 108px" multiple>

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
                        <input type="text" name="cpu_maker" value="{{ old('cpu_maker') }}">
                    </div>

                    <div>
                        <label>مدل:</label>
                        <input type="text" name="cpu_model" value="{{ old('cpu_model') }}">
                    </div>

                    <div>
                        <label>سری:</label>
                        <input type="text" name="cpu_series" value="{{  old('cpu_series') }}">
                    </div>

                    <div>
                        <label>سرعت:</label>
                        <input type="text" name="cpu_speed" value="{{ old('cpu_speed') }}">
                    </div>

                    <div>
                        <label>فرکانس:</label>
                        <input type="text" name="cpu_frequency" value="{{ old('cpu_frequency') }}">
                    </div>

                </div>

                <label style="color: #479236;font-size:17px ;margin: 0 -10px 3px 0;">مشخصات رم</label>
                <div class="general_lap" style="height: 115px">

                    <div>
                        <label>نوع:</label>
                        <input type="text" name="ram_sort" value="{{ old('ram_sort') }}">
                    </div>

                    <div>
                        <label>ظرفیت:</label>
                        <input type="text" name="ram_capacity" value="{{ old('ram_capacity') }}">
                    </div>


                </div>

                <label style="color: #479236;font-size:17px ;margin: 0 -10px 3px 0;">مشخصات کارت گرافیک</label>
                <div class="general_lap" style="height: 115px">

                    <div>
                        <label>سازنده:</label>
                        <input type="text" name="gpu_maker" value="{{ old('gpu_maker') }}">
                    </div>

                    <div>
                        <label>مدل:</label>
                        <input type="text" name="gpu_model" value="{{ old('gpu_model') }}">
                    </div>

                    <div>
                        <label>حافظه:</label>
                        <input type="text" name="gpu_ram" value="{{  old('gpu_ram') }}">
                    </div>

                </div>

                <label style="color: #479236;font-size:17px ;margin: 0 -10px 3px 0;">مشخصات صفحه نمایش</label>
                <div class="general_lap" style="height: 115px">

                    <div>
                        <label>اندازه:</label>
                        <input type="text" name="screen_size" value="{{ old('screen_size') }}">
                    </div>

                    <div>
                        <label>نوع:</label>
                        <input type="text" name="screen_sort" value="{{ old('screen_sort') }}">
                    </div>

                    <div>
                        <label>جنس:</label>
                        <input type="text" name="screen_material" value="{{  old('screen_material') }}">
                    </div>

                    <div>
                        <label>رزولیشن:</label>
                        <input type="text" name="screen_resolution" value="{{ old('screen_resolution') }}">
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
                        <input type="text" name="dimensions" value="{{ old('dimensions') }}">
                    </div>

                    <div>
                        <label style="margin-right: 112px;">وزن:</label>
                        <input type="text" name="weight" value="{{ old('weight') }}">
                    </div>

                    <div>
                        <label style="margin-right: 100px;">میزان هارد:</label>
                        <input type="text" name="hard_capacity" value="{{  old('hard_capacity') }}">
                    </div>

                    <div>
                        <label style="margin-right: 53px;">نوع هارد دیسک:</label>
                        <input type="text" name="hard_sort" value="{{ old('hard_sort') }}">
                    </div>

                    <div>
                        <label>نوع درایو نوری:</label>
                        <input type="text" name="disk_drive" value="{{ old('disk_drive') }}">
                    </div>

                    <div>
                        <label>نوع مودم:</label>
                        <input type="text" name="modem" value="{{ old('modem') }}">
                    </div>
                    <div>
                        <label style="margin-right: 79px;">نوع وبکم:</label>
                        <input type="text" name="webcam" value="{{ old('webcam') }}">
                    </div>
                    <div>
                        <label>نوع اسپیکر:</label>
                        <input type="text" name="speaker" value="{{ old('speaker') }}">
                    </div>
                    <div>
                        <label>تعداد usb2:</label>
                        <input type="text" name="usb2" value="{{ old('usb2') }}">
                    </div>
                    <div>
                        <label style="margin-right: 70px;">تعداد usb3:</label>
                        <input type="text" name="usb3" value="{{ old('usb3') }}">
                    </div>
                    <div>
                        <label>نوع باتری:</label>
                        <input type="text" name="battery" value="{{ old('battery') }}">
                    </div>
                    <div>
                        <label>سیستم عامل:</label>
                        <input type="text" name="os" value="{{ old('os') }}">
                    </div>


                    <div>
                        <label>تشخیص اثر انگشت:</label>
                        <input type="checkbox" name="finger_touch" value="1">
                    </div>

                    <div>
                        <label style="margin-right: 158px;">پورت شبکه:</label>
                        <input type="checkbox" name="ethernet" value="1">
                    </div>

                    <div>
                        <label style="margin-right: 190px;">wifi:</label>
                        <input type="checkbox" name="wifi" value="1">
                    </div>


                </div>
                <br><br><br><br><br>
                {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>--}}
                {{--<script>tinymce.init({ selector:'textarea' });</script>--}}
                <div id="">
                    <label style="margin-left: 10px">نقد و بررسی:</label>
                    <textarea id='editor' name="description" cols="150" rows="15">{{ old('description') }}</textarea>
                </div>



                <div class="bottom_lap">
                    <button style="margin-left: 8px" class="btn btn-success btn-x" type="submit">افزودن</button>
                    <button class="btn btn-danger" type="reset"> لغو</button>
                </div>
            </form>
        </div>
    </section>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) );
    </script>
@endsection