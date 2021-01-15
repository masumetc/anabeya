@extends('Frontend.app') 
@section('main_content')
<!-- Category Section-->
	   <section>
    <div class="row recomandation_area">
        <div class="col-12">
            <div class="row sell_area">
                <div class="col-lg-6 col-xl-6 col-md-6 col-12 sell_title">
                  @if($category)
                    <h2>{{$category->name}}</h2>
                    @endif
                </div>
            </div>
        </div>
        
        <!--End Just for you Title-->
        @if(count($products) > 0) 
        @foreach($products as $key=>$product)
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
    </div>
</section>
{{ $products->onEachSide(1)->links() }}
@endsection