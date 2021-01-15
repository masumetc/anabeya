@extends('Frontend.app') 
@section('main_content') 
@include('Frontend._partials.slider') 
@include('Frontend._partials.banner')

<style>
.checked {
  color: orange;
}
</style>

<!-- Start Flash sell Section-->
<section>
    <div class="row flash_sell_area">
        <div class="col-12">
            <div class="row sell_area">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 mob sell_title">
                    <center><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Displayadsresponsive2mobile -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-5478758078427351"
                         data-ad-slot="3212159883"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script></center><br><br>
                </div>
                <div class="col-lg-2 col-xl-2 col-md-3 col-sm-6 col-12 sell_title">
                    <h2>Flash Sell</h2>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-4 col-sm-6 col-12 sell_end_date">
                    <h2>Ending in <span>02</span><span>28</span><span>20</span></h2>
                </div>
                <div class="col-lg-7 col-xl-7 col-md-5 col-sm-12 col-12">
                    <a class="btn btn-outline-success right" href="{{URL::to('/flash-sell')}}">Shop More</a>
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
                      
                      
                      @php
                        $review_count = $topFlashSellProduct->reviews->count();
                        $total_star = $topFlashSellProduct->reviews->sum('stars');
                      @endphp
                      
                      @if($total_star != null)
                      
                          @if( ($total_star/$review_count) > 4 || ($total_star/$review_count) == 4)
                          <span class="review">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span> ({{$review_count}}) 
                          </span>
                          
                               @elseif( ($total_star/$review_count) > 3 || ($total_star/$review_count) == 3)
                              <span class="review">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span> ({{$review_count}}) 
                              </span>
                             
                             
                             @elseif( ($total_star/$review_count) > 2 || ($total_star/$review_count) == 2)
                              <span class="review">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span> ({{$review_count}}) 
                              </span>
                              
                                @elseif( ($total_star/$review_count) > 1 || ($total_star/$review_count) == 1)
                                  <span class="review">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span> ({{$review_count}}) 
                                  </span>
                          @endif
                          
                          
                          

                          

                      
                      @endif
                      
                      @if($total_star == null)
                      <span class="review">
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span> ({{$review_count}}) 
                      </span>
                      @endif
                      
                </div>
            </a>
        </div>
        @endforeach 
        @endif
        
    </div>
</section>
<!--=== End Flash sell Section===-->

<!-- Start Just for you Section-->
<section>
    <div class="row recomandation_area">
        <div class="col-12">
            <div class="row sell_area">
                <div class="col-lg-2 col-xl-2 col-md-3 col-12 sell_title">
                    <h2>Just for you</h2>
                </div>
            </div>
        </div>
        
        <!--End Just for you Title-->
        @if(count($normalProducts) > 0) @foreach($normalProducts as $key=>$normalProduct)
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 col-6 single_product">
            <a href="{{route('product.single-product-view',$normalProduct->product_id)}}">
                <div class="product_div">
                    @foreach($normalProduct->productImages as $imgKey=>$normalProductImage)
                    @if($imgKey == 0)
                      <!--<div class="overlay"><center><h1>{{$normalProduct->title}}</h1></center></div>-->
                      <img class="product_first_img" src="{{URL::to('public/images/product/',$normalProductImage->image)}}">
                      <div class="product_fist_title">
                        <h1>{{$normalProduct->title}}</h1>
                      </div>
                      @endif
                      @endforeach

                      @foreach($normalProduct->priceCharts as $chartKey=>$priceChart)
                      @if($chartKey == 0)
                      <span class="special_price">
                        {{$currency->symbol}} {{$priceChart->discount_price * $currency->rate}}</span><br>
                                <span class="regular_price">{{$currency->symbol}} {{$priceChart->regular_price * $currency->rate}}</span><span class="discount-percent">{{$priceChart->comission}}%</span><br>
                      @endif 
                      @endforeach
                      
                      
                      @php
                        $review_count = $normalProduct->reviews->count();
                        $total_star = $normalProduct->reviews->sum('stars');
                      @endphp
                      
                      @if($total_star != null)
                      
                          @if( ($total_star/$review_count) > 4 || ($total_star/$review_count) == 4)
                          <span class="review">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span> ({{$review_count}}) 
                          </span>
                          
                               @elseif( ($total_star/$review_count) > 3 || ($total_star/$review_count) == 3)
                              <span class="review">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span> ({{$review_count}}) 
                              </span>
                             
                             
                             @elseif( ($total_star/$review_count) > 2 || ($total_star/$review_count) == 2)
                              <span class="review">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span> ({{$review_count}}) 
                              </span>
                              
                                @elseif( ($total_star/$review_count) > 1 || ($total_star/$review_count) == 1)
                                  <span class="review">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span> ({{$review_count}}) 
                                  </span>
                          @endif
                          
                          
                          

                          

                      
                      @endif
                      
                      @if($total_star == null)
                      <span class="review">
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span> ({{$review_count}}) 
                      </span>
                      @endif
                      
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</section>
{{ $normalProducts->onEachSide(1)->links() }}
<!--=== End Recomandation Section===-->
@endsection