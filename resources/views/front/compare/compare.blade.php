@extends('layouts.front')
@section('content')

    <div id="container">
        <div class="container">
            <h3 style="margin-top: 20px;margin-bottom:40px" class="title">محصول مورد نظر خود را جهت مقایسه انتخاب
                نمایید.
            </h3>
            <div class="row">
                <div id="content" class="col-sm-12">
                    <div class="row products-category">
                    @foreach($products as $product)
                            <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <div class="product-thumb">
                                    <div class="image">
                                        <a href="{{route('compare',['product'=>$product->id])}}">
                                            <img style="width: 200px" src="{{$product->image}}"
                                                    alt="{{$product->name}}" title="{{$product->name}}"
                                                    class="img-responsive">
                                        </a>
                                    </div>
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
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-sm-6 text-left">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/custom.js"></script>

@endsection