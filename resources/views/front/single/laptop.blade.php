@extends('layouts.front')

@section('content')
    <link rel="stylesheet" href="/css/easyzoom.min.css">
    <link rel="stylesheet" href="/css/toastr.min.css">
    <script src="/admin/js/jquery.js"></script>
    <script src="/js/toastr.min.js"></script>

    <style>
        .big {
            z-index: 10;
            width: 560px !important;
            background-color: #ffffff !important;
            height: 400px !important;
        }

        .easyzoom .small {
            border: none !important;
        }
        .form-horizontal .form-group {
            margin-left: unset!important;
            margin-right: unset!important;
        }
    </style>

    <link rel="stylesheet" href="/css/lightbox/style.css">

    <script src='/js/lightBox.js'></script>


    <div id="container">
        <div class="container">

            <ul class="breadcrumb"  style="font-size: 17px">
                <li >
                    <a href="{{route('index')}}" itemprop="url">
                        <span itemprop="title"><i class="fa fa-home"  style="font-size: 17px"></i></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('search.cat',['cat'=>$product->cat])}}">
                        <span itemprop="title"  style="font-size: 17px">{{$product->cat}}</span>
                    </a>
                </li>
                <li>
                    <a href="product.html" itemprop="url">
                        <span itemprop="title"  style="font-size: 17px">{{$product->name}}</span>
                    </a>
                </li>
            </ul>
            <br>
            <div class="row">
                <div id="content" class="col-sm-9 col-md-12">
                    <div>
                        <h1 class="title" itemprop="name">{{$product->name}}</h1>
                        <div class="row product-info">
                            <div class="col-sm-6">
                                <div class="image">
                                    <div class="zoomWrapper">
                                        <div class="easyzoom">
                                            <img class="img-responsive" src="{{$images[0]->url}}" title="{{$product->name}}">
                                        </div>
                                        <div style="background: url(&quot;image/progress.gif&quot;) center center no-repeat; height: 350px; width: 350px; z-index: 2000; position: absolute; display: none;"></div>
                                    </div>
                                </div>
                                <div class="center-block text-center"><span class="zoom-gallery">
                                        <i class="fa fa-search"></i> برای مشاهده گالری روی تصویر کلیک کنید</span>
                                </div>
                                <div class="image-additional" id="gallery_01">
                                    @foreach($images as $image)
                                        <a class="thumbnail" href="#" data-zoom-image="{{$image->url}}"
                                           data-image="{{$image->url}}">

                                            <img src="{{$image->url}}" class="js-lightBox"
                                                 data-title="Image Caption 1"
                                                 data-group="example">

                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled description" style="font-size: 17px;line-height:35px">
                                    <li><b>برند :</b> <a href="#">
                                            <span itemprop="brand" style="font-size: 20px">{{$product->brand}}</span>
                                        </a>
                                    </li>
                                    <li><b>کد محصول :</b> <span itemprop="mpn">{{$product->id}}17</span></li>
                                    <?php if($product->count == 0 || $product->count == null ){ ?>
                                    <li><b>وضعیت موجودی :</b> <span style="background-color: #e74c3c" class="instock">ناموجود</span>
                                    </li>
                                    <?php } else { ?>
                                    <li><b>وضعیت موجودی :</b> <span class="instock">موجود</span></li>
                                    <?php } ?>
                                </ul>
                                <ul class="price-box">
                                    <li class="price">
                                        <?php if(isset($product->discount)){ ?>
                                        <span class="saving" style="right: 165px">{{$product->discount}}%-</span>
                                        <?php } ?>

                                        <?php if(isset($product->discount)){ ?>
                                        <span class="price-old"> {{number_format($product->price)}} تومان </span>&nbsp;&nbsp;
                                        <?php } ?>
                                        <span>  <?php $a = 100 - $product->discount; $b = ($product->price / 100) * $a; echo number_format($b); ?>
                                            تومان</span>
                                    </li>
                                    <br>
                                </ul>
                                <form method="post" action="{{route('cart',['product'=>$product->id])}}">
                                    {{csrf_field()}}
                                    <div id="product">
                                        <h3 class="subtitle">انتخاب های در دسترس</h3>
                                        @if(sizeof($product->colors)>0)
                                            <div class="form-group required">
                                                <label class="control-label" style="font-size: 20px">رنگ</label>
<br>
<br>

                                                <select class="form-control" id="input-option200" name="color">
                                                    <option value=""> --- لطفا انتخاب کنید ---</option>
                                                    @foreach($product->colors as $color)
                                                        <option value="{{$color->color}}">{{$color->color}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        @endif
                                        <div class="cart">
                                            <div>
                                                <div class="qty">
                                                    <label class="control-label" for="input-quantity">تعداد:</label>
                                                    <input type="number" name="num" min="1" max="{{$product->count}}"
                                                           value="1" style="margin-top: 2px;width:70px;height: 37px;padding-right:7px"/>
                                                    <div class="clear"></div>
                                                </div>
                                                <button type="submit" id="button-cart" class="btn btn-primary btn-lg">
                                                    افزودن به سبد
                                                </button>
                                            </div>
                                            <div>
                                                <a class="wishlist" id="favorite" onclick="myFunction()" style="font-weight: bold;font-size: 17px">
                                                    <i class="fa fa-heart"></i>
                                                    افزودن به علاقه مندی ها
                                                </a><br>
                                                <script>
                                                    function myFunction() {
                                                        $(document).ready(function () {
                                                            $.ajax({
                                                                type: 'GET',
                                                                url: "{{route('favorite',['product'=>$product->id])}}",
                                                                success:
                                                                    toastr.success("افزوده شد.", "به لیست علاقه مندی ها", {
                                                                        "closeButton": false,
                                                                        "debug": false,
                                                                        "newestOnTop": false,
                                                                        "positionClass": "toast-bottom-right",
                                                                        "preventDuplicates": false,
                                                                        "onclick": null,
                                                                        "showDuration": "300",
                                                                        "hideDuration": "1000",
                                                                        "timeOut": "5000",
                                                                        "extendedTimeOut": "1000",
                                                                        "showEasing": "swing",
                                                                        "hideEasing": "linear",
                                                                        "showMethod": "fadeIn",
                                                                        "hideMethod": "fadeOut",
                                                                        "progressBar": true
                                                                    })
                                                            }).done(
                                                                function (msg) {
                                                                });
                                                        });
                                                    }
                                                </script>
                                                <a  class="wishlist" href="{{route('compare.index',['product'=>$product->id])}}" style="font-weight: bold;font-size: 17px">
                                                    <i class="fa fa-exchange"></i>  مقایسه این محصول
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- AddThis Button END -->
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a>
                            </li>
                            <li class=""><a href="#tab-specification" data-toggle="tab">مشخصات</a>
                            </li>
                            <li class=""><a href="#tab-review" data-toggle="tab">بررسی
                                    (2)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div itemprop="description" id="tab-description" class="tab-pane active">
                                <div><p style="line-height:35px"><?php echo $product->laptop->description ?></p></div>
                            </div>
                            <div id="tab-specification" class="tab-pane">
                                <div id="tab-specification" class="tab-pane">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td colspan="2"><strong>حافظه</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>تست 1</td>
                                            <td>8gb</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td colspan="2"><strong>پردازشگر</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>تعداد هسته</td>
                                            <td>1</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="tab-review" class="tab-pane">
                                <form class="form-horizontal">
                                    <div id="review">
                                        <div>
                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong><span>هاروی</span></strong></td>
                                                    <td class="text-right"><span>1395/1/20</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد
                                                            وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی
                                                            سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                                                            گیرد.</p>
                                                        <div class="rating"><span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong><span>اندرسون</span></strong></td>
                                                    <td class="text-right"><span>1395/1/20</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد
                                                            وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی
                                                            سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                                                            گیرد.</p>
                                                        <div class="rating"><span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-right"></div>
                                    </div>
                                    <h2>یک بررسی بنویسید</h2>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label for="input-name" class="control-label">نام شما</label>
                                            <input type="text" class="form-control" id="input-name" value=""
                                                   name="name">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label for="input-review" class="control-label">بررسی شما</label>
                                            <textarea class="form-control" id="input-review" rows="5"
                                                      name="text"></textarea>
                                            <div class="help-block"><span class="text-danger">توجه :</span> HTML
                                                بازگردانی نخواهد شد!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label">رتبه</label>
                                            &nbsp;&nbsp;&nbsp; بد&nbsp;
                                            <input type="radio" value="1" name="rating">
                                            &nbsp;
                                            <input type="radio" value="2" name="rating">
                                            &nbsp;
                                            <input type="radio" value="3" name="rating">
                                            &nbsp;
                                            <input type="radio" value="4" name="rating">
                                            &nbsp;
                                            <input type="radio" value="5" name="rating">
                                            &nbsp;خوب
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <div class="pull-right">
                                            <button class="btn btn-primary" id="button-review" type="button">ادامه
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <!--Middle Part End -->

            </div>
        </div>
    </div>



    <script src="/js/easyzoom.min.js"></script>
    <script>
        $('.example').easyZoom({

            position: 'left',
            background: '#ffffff',
            distance: 360,
        });
        $.DNLightBox({});
    </script>


@endsection