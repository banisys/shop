@extends('layouts.front')

@section('content')
    <style>
        .fa-heart{color: #dc3545!important;}
    </style>
        <div id="container">
            <div class="container">
                <div class="row">
                    <!--Middle Part Start-->
                    <div id="content" class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-8">
                                <!-- Slideshow Start-->
                                <div class="slideshow single-slider owl-carousel">
                                    @foreach($sliders as $slider)
                                        <div class="item">
                                            <a href="{{$slider->link}}">
                                                <img class="img-responsive" src="{{$slider->url}}" alt="banner 1" />
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Slideshow End-->
                            </div>
                            <div class="col-sm-4 pull-right flip">
                                <div class="marketshop-banner">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a href="#"><img title="sample-banner1" alt="sample-banner1" src="{{$banners[0]->url}}"></a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a href="#"><img title="sample-banner" alt="sample-banner" src="{{$banners[1]->url}}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- پرفروش ها محصولات Start-->
                        <h3 class="subtitle">پرفروش ها</h3>

                        <div class="owl-carousel product_carousel">
                            @foreach($populars as $popular)
                                <div class="product-thumb clearfix">
                                    <div class="image">
                                        <a href="{{route('single.page',['product'=>$popular->id])}}">
                                            <img src="{{$popular->image}}" alt="{{$popular->name}}" title="{{$popular->name}}" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h4><a href="{{route('single.page',['product'=>$popular->id])}}">{{$popular->name}}</a></h4>
                                        <p class="price"> <span class="price-new">
                                                <?php $a=100-$popular->discount; $b=($popular->price/100)*$a; echo number_format($b); ?> تومان
                                            </span>
                                            <?php if(isset($popular->discount)){ ?>
                                            <span class="price-old">{{number_format($popular->price)}} تومان </span>
                                            <?php } ?>

                                            <?php if(isset($popular->discount)){ ?>
                                            <span class="saving">{{$popular->discount}}%-</span>
                                            <?php } ?>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Featured محصولات End-->
                        <!-- Banner Start-->
                        <div class="marketshop-banner">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="#"><img title="بنر نمونه 2" alt="بنر نمونه 2" src="{{$banners[2]->url}}"></a></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="#"><img title="بنر نمونه" alt="بنر نمونه" src="{{$banners[3]->url}}"></a></div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="#"><img title="بنر نمونه 3" alt="بنر نمونه 3" src="{{$banners[4]->url}}"></a></div>
                            </div>
                        </div>

                        <div class="marketshop-banner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <a href="#"><img title="1 Block Banner" alt="1 Block Banner" src="{{$banners[5]->url}}"></a></div>
                            </div>
                        </div>
                        <!-- Banner End -->
                        <!-- برند Logo Carousel Start-->
                        <div id="carousel" class="owl-carousel nxt">
                            <div class="item text-center"> <a href="#"><img src="/image/product/apple_logo-100x100.jpg" alt="پالم" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/image/product/canon_logo-100x100.jpg" alt="سونی" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/image/product/apple_logo-100x100.jpg" alt="کنون" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/image/product/canon_logo-100x100.jpg" alt="اپل" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/image/product/apple_logo-100x100.jpg" alt="اچ تی سی" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/image/product/canon_logo-100x100.jpg" alt="اچ پی" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/image/product/apple_logo-100x100.jpg" alt="brand" class="img-responsive" /></a> </div>
                            <div class="item text-center"> <a href="#"><img src="/image/product/canon_logo-100x100.jpg" alt="brand1" class="img-responsive" /></a> </div>
                        </div>
                        <!-- برند Logo Carousel End -->
                    </div>
                    <!--Middle Part End-->
                </div>
            </div>
        </div>
        <!-- Feature Box Start-->
        <div class="container">
            <div class="custom-feature-box row">
                <div class="col-sm-4 col-xs-12">
                    <div class="feature-box fbox_1">
                        <div class="title">ارسال رایگان</div>
                        <p>برای خرید های بیش از 100 هزار تومان</p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="feature-box fbox_3">
                        <div class="title">کارت هدیه</div>
                        <p>بهترین هدیه برای عزیزان شما</p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="feature-box fbox_4">
                        <div class="title">امتیازات خرید</div>
                        <p>از هر خرید امتیاز کسب کرده و از آن بهره بگیرید</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Box End-->
        <!--Footer Start-->
    <script>
        $(".btn-primary").click(function () {
            id=$(this).attr('id');
            $.ajax({type:'get',url:'admin/baner/test'});

        })
    </script>
@endsection