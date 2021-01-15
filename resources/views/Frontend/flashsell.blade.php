@extends('Frontend.app') 
@section('main_content') 

<!-- Start Flash sell Section-->
<section>
    <div class="row flash_sell_area">
        <div class="col-12">
            <div class="row sell_area">
                <div class="col-lg-2 col-xl-2 col-md-3 col-sm-4 col-12 sell_title">
                    <h2>Flash Sell</h2>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-4 col-sm-4 col-12 sell_end_date">
                    <h2>Ending in <span>02</span><span>28</span><span>20</span></h2>
                </div>
            </div>
        </div>
        <!--End Flash Sell Title-->
        @if(count($topFlashSellProducts) > 0) @foreach($topFlashSellProducts as $key=>$topFlashSellProduct)
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 col-6 single_product">
            <a href="{{route('product.single-product-view',$topFlashSellProduct->product_id)}}">
                <div class="product_div">
                      @foreach($topFlashSellProduct->productImages as $imgKey=>$image)
                      @if($imgKey == 0)
                      <!--<div class="overlay"><center><h1>{{$topFlashSellProduct->title}}</h1></center></div>-->
                      <img class="product_first_img" src="{{URL::to('public/images/product/',$image->image)}}">
                      <div class="product_fist_title">
                        <h1>{{$topFlashSellProduct->title}}</h1>
                      </div>
                      @endif
                      @endforeach
                      @foreach($topFlashSellProduct->priceCharts as $chartKey=>$priceChart)
                      @if($chartKey == 0)
                      <span class="special_price">
                        {{$currency->symbol}} {{$priceChart->discount_price * $currency->rate}}</span><br>
                      <span class="regular_price">{{$currency->symbol}} {{$priceChart->regular_price * $currency->rate}}</span><span class="discount-percent">{{$priceChart->comission}}%</span><br>
                       @endif 
                      @endforeach
                      <span class="review">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i> (2)
                      </span>
                </div>
            </a>
        </div>
        @endforeach 
        @endif
        
    </div>
</section>
<!--=== End Flash sell Section===-->

<!--=== End Recomandation Section===-->
@endsection