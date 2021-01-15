@extends('Frontend.app')
@section('main_content')
<!-- Start Flash sell Section-->
<section>
    <div class="row flash_sell_area">
        <!--End Flash Sell Title-->
        @if(count($searchProduct) > 0) 
        @foreach($searchProduct as $key=>$product)
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 col-6 single_product">
            <a href="{{route('product.single-product-view',$product->product_id)}}">
                <div class="product_div">
                      <!--<div class="overlay"><center><h1>{{$product->title}}</h1></center></div>-->
                      <img class="product_first_img" src="{{URL::to('public/images/product/',$product->image)}}">
                      <div class="product_fist_title">
                        <h1>{{$product->title}}</h1>
                      </div>
                      <span class="special_price">
                        {{$currency->symbol}} {{$product->discount_price * $currency->rate}}</span><br>
                      <span class="regular_price">{{$currency->symbol}} {{$product->regular_price * $currency->rate}}</span><span class="discount-percent">{{$product->comission}}%</span><br>
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
        
        <div class="col-12 wrapper">
            <div class="owl-carousel owl-theme">
                <div class="item"><h4>1</h4></div>
                <div class="item"><h4>2</h4></div>
                <div class="item"><h4>3</h4></div>
                <div class="item"><h4>4</h4></div>
                <div class="item"><h4>5</h4></div>
                <div class="item"><h4>6</h4></div>
                <div class="item"><h4>7</h4></div>
                <div class="item"><h4>8</h4></div>
                <div class="item"><h4>9</h4></div>
                <div class="item"><h4>10</h4></div>
                <div class="item"><h4>11</h4></div>
                <div class="item"><h4>12</h4></div>
            </div>
        </div>
    </div>
</section>
<!--=== End Flash sell Section===-->

@endsection