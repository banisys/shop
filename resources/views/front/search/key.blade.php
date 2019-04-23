@extends('layouts.front')
@section('content')
    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="search.html">جستجو</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <h3 class="title"> {{$key}}</h3>
            <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title=""
                            data-original-title="لیستی"><i class="fa fa-th-list"></i></button>
                    <button type="button" id="grid-view" class="btn btn-default selected" data-toggle="tooltip" title=""
                            data-original-title="پنجره ای"><i class="fa fa-th"></i></button>
                </div>
            </div>
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">

                    <div class="row products-category">
                        @foreach($products as $product)

                            <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <div class="product-thumb">
                                    <div class="image"><a href="{{route('single.page',['product'=>$product->id])}}"><img
                                                    style="width: 200px" src="{{$product->image}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive"></a></div>
                                    <div class="caption">
                                        <h4><a href="product.html">{{$product->name}}</a></h4>
                                        <p class="price"> <span class="price-new">
                                                <?php $a = 100 - $product->discount; $b = ($product->price / 100) * $a; echo $b; ?>
                                            </span>
                                            <?php if(isset($product->discount)){ ?>
                                            <span class="price-old">{{$product->price}}</span>
                                            <?php } ?>

                                            <?php if(isset($product->discount)){ ?>
                                            <span class="saving">{{$product->discount}}%-</span>
                                            <?php } ?>
                                        </p>
                                    </div>
                                    <div class="button-group">
                                        <div class="add-to-links">
                                            <button type="button" data-toggle="tooltip" title="" onclick=""
                                                    data-original-title="افزودن به علاقه مندی ها"><i
                                                        class="fa fa-heart"></i></button>
                                            <button type="button" data-toggle="tooltip" title="" onclick=""
                                                    data-original-title="مقایسه این محصول"><i
                                                        class="fa fa-exchange"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-sm-6 text-left">
                        {{$products->links()}}
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/custom.js"></script>

@endsection