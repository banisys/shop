@extends('layouts.front')
@section('content')
    <style>
        @media (max-width: 500px) {
            #ss {
                margin-top: 20px !important;
            }
        }

        .alert-info:focus {
            color: #484841 !important;
            outline: none !important;
        }

        .alert-info:hover {
            color: #c68d1e !important;
        }
        .alert-info{background-color:#e7e7e7 !important;color: #323232
        }
span{color: #555555
}
    </style>
    <div class="container">
        <div class="row" style="margin-top: 20px;height: 280px;overflow: hidden;border-bottom:2px solid #c68d1e">


        @foreach($products as $product)

                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;">

                    <img style="display: block;margin: 15px auto;width:100%;height:auto;position: relative"
                         src="{{$product->image}} " alt="{{$product->name}}" title="{{$product->name}}">
                    @if(isset($products[1]))
                        <a  href="{{route('compare.destroy',['product'=>$product->id])}}">
                            <i style="position: absolute;top:12px;left:12px;color: #7f8c9a" class="fa fa-times"
                               aria-hidden="true"></i>
                        </a>
                    @endif
                    <span style="display: block;text-align: center;color: #282e36">{{$product->name}}</span>
                    <a href="{{route('single.page',['product'=>$product->id])}}">
                        <button style="display: block;margin: 15px auto;width:85%;height:auto;" type="button"
                                class="btn btn-primary">مشاهده و خرید محصول
                        </button>
                    </a>

                </div>

            @endforeach
            <div class="col-md-2 col-xs-5 col-sm-5"
                 style="border:4px dashed #bbbbb4;margin-right:70px;border-radius: 15px;height:220px;margin-top:25px ">
                <a data-toggle="modal" data-target="#myModal">
                    <img style="display: block;margin: 15px auto;width:87%;height:auto;" src="/image/add-compare.png">
                    <span style="display: block;text-align: center;color:#aaaaa4">برای افزودن کالا به لیست مقایسه کلیک کنید</span>
                </a>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">نام محصول مورد نظر خود را جستجو کنید…</h4>
                        </div>
                        <div class="container">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <div class="modal-body">
                                        <form method="get"
                                              action="{{route('compare.search',['product'=>$product->id])}}"
                                              class="form-inline">
                                            {{csrf_field()}}
                                            <input type="text" name="search" style="width:71%"
                                                   class="form-control form-control-xs  mb-sm-5"/>
                                            <button type="submit" class="btn btn-success" id="ss"
                                                    style="margin-right: -4px;padding: 7px 7px 7px 7px;">
                                                <i class="fa fa-search" style="vertical-align: middle;"></i>
                                            </button>
                                            <button type="submit" class="btn btn-warning" id="ss"
                                                    style="margin-right: 5px;">محصولات این دسته
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;height: auto;position: relative">
            <i class="fa fa-sort-desc" aria-hidden="true" style="position: absolute;top: -37px;right: 158px;font-size: 27px;color: #c68d1e;"></i>
            @if(isset($products[1]))
            <i class="fa fa-sort-desc" aria-hidden="true" style="position: absolute;top: -37px;right: 424px;font-size: 27px;color: #c68d1e;"></i>
            @endif
            @if(isset($products[2]))
            <i class="fa fa-sort-desc" aria-hidden="true" style="position: absolute;top: -37px;right: 690px;font-size: 27px;color: #c68d1e;"></i>
            @endif
            @if(isset($products[3]))
            <i class="fa fa-sort-desc" aria-hidden="true" style="position: absolute;top: -37px;right: 956px;font-size: 27px;color: #c68d1e;"></i>
            @endif
            <button type="button" class="btn alert-info" data-toggle="collapse" data-target="#cpu"
                    style="display: block;margin-bottom:25px;width: 100%;text-align: right;border-right:3px solid #323232 ;">پردازنده
            </button>
            <div id="cpu" class="collapse clearfix in" style="margin-bottom:15px;">
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    <span>{{$products[0]->laptop->cpu_maker}}</span>
                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[1]))
                        <span>{{$products[1]->laptop->cpu_maker}}</span>
                    @endif

                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[2]))
                        <span>{{$products[2]->laptop->cpu_maker}}</span>
                    @endif

                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[3]))
                        <span>{{$products[3]->laptop->cpu_maker}}</span>
                    @endif

                </div>
            </div>


            <button type="button" class="btn alert-info" data-toggle="collapse" data-target="#gpu"
                    style="display: block;margin-bottom: 25px;width: 100%;text-align: right;border-right:3px solid #323232 ;">
                کارت گرافیک
            </button>
            <div id="gpu" class="collapse clearfix in" style="margin-bottom:15px;">
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    <span>{{$products[0]->laptop->cpu_maker}}</span>
                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[1]))
                        <span>{{$products[1]->laptop->cpu_maker}}</span>
                    @endif

                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[2]))
                        <span>{{$products[2]->laptop->cpu_maker}}</span>
                    @endif

                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[3]))
                        <span>{{$products[3]->laptop->cpu_maker}}</span>
                    @endif

                </div>
            </div>


            <button type="button" class="btn alert-info" data-toggle="collapse" data-target="#lcd"
                    style="display: block;margin-bottom:25px;width: 100%;text-align: right;border-right:3px solid #323232 ;"> صفحه نمایش
            </button>
            <div id="lcd" class="collapse clearfix in" style="margin-bottom:15px;">
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    <span>{{$products[0]->laptop->cpu_maker}}</span>
                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[1]))
                        <span>{{$products[1]->laptop->cpu_maker}}</span>
                    @endif

                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[2]))
                        <span>{{$products[2]->laptop->cpu_maker}}</span>
                    @endif

                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[3]))
                        <span>{{$products[3]->laptop->cpu_maker}}</span>
                    @endif

                </div>
            </div>


            <button type="button" class="btn alert-info" data-toggle="collapse" data-target="#ram"
                    style="display: block;margin-bottom:25px;width: 100%;text-align: right;border-right:3px solid #323232 ;">رم
            </button>
            <div id="ram" class="collapse clearfix in" style="margin-bottom:15px;">
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    <span>{{$products[0]->laptop->cpu_maker}}</span>
                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[1]))
                        <span>{{$products[1]->laptop->cpu_maker}}</span>
                    @endif

                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[2]))
                        <span>{{$products[2]->laptop->cpu_maker}}</span>
                    @endif

                </div>
                <div class="col-md-2 col-xs-10 col-sm-10" style="margin-right:70px;text-align: center">
                    @if(isset($products[3]))
                        <span>{{$products[3]->laptop->cpu_maker}}</span>
                    @endif

                </div>
            </div>


        </div>
    </div>

@endsection