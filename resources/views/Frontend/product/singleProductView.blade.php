@extends('Frontend.app')
@section('main_content')
<!-- Category Section-->
	    <section class="product">
	        <div class="row">
	            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 single_page">
	                <div class="row category">
	                    <div class="col-12">
	                         <!--<span>Fashon</span> > <span>Men</span> > <span>Casual</span> > <span>T-Shirt</span>-->
	                    </div>
	                </div>
                     @if(count($getSingleProducts) > 0)
                    @foreach($getSingleProducts as $key=>$getSingleProduct)
	                <div class="row single_product_div">
	                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 single_image">
	                       <figure>
	                           <center>
	                               <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                      <div class="carousel-inner">
                                        <?php $i=0; ?>
                                        @foreach($getSingleProduct->productImages as $imgKey=>$getSingleProductImage)
                                        <div class="carousel-item @if($i==0){{'active'}}@endif">
                                            <img class="d-block" src="{{url('public/images/product',$getSingleProductImage->image)}}" width="159px" height="378px">
                                        </div>
                                        <?php $i+=1;?>
                                        @endforeach
                                      </div>
                                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                      </a>
                                      <div class="container pt-1 pb-1">
                                        <div class="row carousel-indicators nav_corosul nav_corousle_height">
                                        <?php $i=0; ?>
                                        @foreach($getSingleProduct->productImages as $imgKey=>$getSingleProductImage)
                                          <div class="col-md-2 item">
                                                <img src="{{url('public/images/product',$getSingleProductImage->image)}}" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"/>
                                          </div>
                                        <?php $i+=1;?>
                                        @endforeach
                                        </div>
                                      </div>
                                    </div>
                                    <style>
                                        .nav_corosul .item{
                                            width:60px;
                                            height:70px;
                                            padding:5px;
                                            background:#fff;
                                        }
                                        .item.active {
                                            background:#f5f5f5;
                                        }
                                        .nav_corosul .item img{
                                            width:50px;
                                            height:60px;
                                            padding:5px;
                                            border:none;
                                        }
                                        .carousel-indicators {
                                            position: static;
                                      
                                      .item {
                                        
                                        &.active {
                                          background: #fff;
                                          
                                          img {
                                            opacity: 0.7;
                                          }
                                        }
                                      }
                                    }
                                    
                                    
                                    rating {
                                        float:right;
                                    }
                                    
                                    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
                                       follow these rules. Every browser that supports :checked also supports :not(), so
                                       it doesn’t make the test unnecessarily selective */
                                    .rating:not(:checked) > input {
                                        position:absolute;
                                        top:-9999px;
                                        clip:rect(0,0,0,0);
                                    }
                                    
                                    .rating:not(:checked) > label {
                                        float:right;
                                        width:1em;
                                        padding:0 .1em;
                                        overflow:hidden;
                                        white-space:nowrap;
                                        cursor:pointer;
                                        font-size:200%;
                                        line-height:1.2;
                                        color:#ddd;
                                        text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
                                    }
                                    
                                    .rating:not(:checked) > label:before {
                                        content: '★ ';
                                    }
                                    
                                    .rating > input:checked ~ label {
                                        color: #f70;
                                        text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
                                    }
                                    
                                    .rating:not(:checked) > label:hover,
                                    .rating:not(:checked) > label:hover ~ label {
                                        color: gold;
                                        text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
                                    }
                                    
                                    .rating > input:checked + label:hover,
                                    .rating > input:checked + label:hover ~ label,
                                    .rating > input:checked ~ label:hover,
                                    .rating > input:checked ~ label:hover ~ label,
                                    .rating > label:hover ~ input:checked ~ label {
                                        color: #ea0;
                                        text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
                                    }
                                    
                                    .rating > label:active {
                                        position:relative;
                                        top:2px;
                                        left:2px;
                                    }
                                    
                                    
                                    
                                    .checked {
                                          color: orange;
                                        }
                                    </style>
	                               </center>
	                       </figure>
	                    </div>
	                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 single_details">
        	                <form action="{{route('product.add-to-cart')}}" method="post">
                            @csrf
        	                    <h3>{{$getSingleProduct->title}}</h3>
        	                    



                      @php
                        $review_count = $getSingleProduct->reviews->count();
                        $total_star = $getSingleProduct->reviews->sum('stars');
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

            	                
            	                
            	                
                              @foreach($getSingleProduct->priceCharts as $pricekey=>$singleProductPrice)
                              @if($pricekey == 0)
            	                <h3 class="single_price">{{$currency->symbol}} {{$singleProductPrice->discount_price * $currency->rate}} <span class="regular_price">{{$currency->symbol}} {{$singleProductPrice->regular_price * $currency->rate}}</span> <span class="discount">{{$singleProductPrice->comission}}%</span></h3>
                              @endif
                              @endforeach
        	                    <!--<p> Cupon <input class="form-control" type="text" name="cupon"></p>-->
        	                    
        	                    <table class="info_section">
        	                        <tr>
        	                            <td class="info_section_title">Color</td>
        	                            <td>
                    	                    <div class="form-check single_color" id="col_img">
                    	                        <?php $i=0; ?>
                                          @foreach($getSingleProduct->priceCharts as $chartKey=>$priceChartColorImage)
                                              <input class="form-check-input" type="radio" name="color" id="p_color1" value="option1">
                                              <label class="product_active" for="p_color1">
                                                <img class="p_color @if($i==0){{'selected'}}@endif" src="{{url('public/images/color_image',$priceChartColorImage->color_image)}}">
                                              </label>
                                              <?php $i+=1;?>
                                            @endforeach
                                            <style>
                                                .selected{
                                                    padding:1px !important;
                                                    border:2px solid #12400a;
                                                    margin-right:0px !important;
                                                    box-shadow: 1px 2px 3px 0 rgba(65, 241, 34, 0.02), 1px 2px 3px 0 rgba(65, 241, 34, 0.02) !important;
                                                }
                                            </style>
                                            </div>
                                        </td>
        	                        </tr>
        	                        <tr height="8px"></tr>
        	                        <tr>
        	                            <td class="info_section_title">Size</td>
        	                            <td>
                    	                    <!-- <div class="form-check single_size"> 
                    	                        <?php $i=0; ?> 
                                            @foreach($getSingleProduct->priceCharts as $chartKey=>$priceChartSize)
                                              <input class="form-check-input" type="radio" name="size" id="p_size1" value="option1">
                                              <label class="@if($i==0){{'selected'}}@endif" for="p_size1">
                                                {{$priceChartSize->size}}
                                              </label>
                                              <?php $i+=1;?>
                                              @endforeach
                                            </div> -->

                                            <div class="form-check single_size" id="product_size">  
                                            @foreach($getSingleProduct->priceCharts as $chartKey=>$priceChartSize)
                                            <?php 
                                              $getSize = explode(',',$priceChartSize->size);
                                             ?>
                                              @endforeach
                                              <?php $i=0; ?> 
                                              @foreach($getSize as $key=>$size)
                                              <input class="form-check-input" type="radio" name="size" id="p_size1" value="option1">
                                              <label class="p_size @if($i==0){{'selected'}}@endif" for="p_size1">
                                                {{$size}}
                                              </label>
                                              <?php $i+=1;?>
                                              @endforeach
                                            </div>
                                        </td>
        	                        </tr>
        	                        <tr height="8px"></tr>
        	                        <tr>
        	                            <td class="info_section_title">Quantity</td>
        	                            <td>
                    	                   <div class="quantity_div">
                                             <div class="input-group quantity_bar">
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-number"  data-type="minus" data-field="quantity">
                                                        <i class="fas fa-minus-circle"></i>
                                                      </button>
                                                  </span>
                                                  
                                             @foreach($getSingleProduct->priceCharts as $stockKey=>$chartStock)
                                              @if($stockKey == 0)
                                                  <input type="text" name="quantity" class=" input-number" value="1" min="1" max="{{$chartStock->stock}}">
                                                  @endif
                                              @endforeach
                                              
                                                  <input type="hidden" name="product_id" value="{{$getSingleProduct->product_id}}">
                                                  <span class="input-group-btn">
                                                      <button type="button" class="btn btn-number" data-type="plus" data-field="quantity">
                                                          <i class="fas fa-plus-circle"></i>
                                                      </button>
                                                  </span>
                                              </div> 
                                              @foreach($getSingleProduct->priceCharts as $stockKey=>$chartStock)
                                              @if($stockKey == 0)
                                              <div class="availablequantity"><span>{{$chartStock->stock}} Pieces available</span></div>
                                              @endif
                                              @endforeach
                                           </div>
                                        </td>
        	                        </tr>
        	                        <tr height="8px"></tr>
        	                        <tr>
        	                            <td class="info_section_title">Select a courier</td>
        	                            <td>
                                            <select class="curiar" multiple name="curier_id" id="curier_id" required="">
                                      @if($results)
                                      @foreach($results as $key=>$result)
                                      <?php 
                                      $unitChargeAndUserId = explode("#", $key);
                                      $unitCharge = $unitChargeAndUserId[0];
                                      $userId = $unitChargeAndUserId[1];
                                       ?>
                                      @foreach($result as $unitKey=>$curier)
                                         <option value="{{$curier[0]->curier_id}}">{{$curier[0]->name}}    ({{$unitCharge * $currency->rate}} {{$currency->symbol}})</option>
                                      @endforeach
                                      @endforeach
                                      @endif
                                      
                                </select> <p></p>
                                        </td>
        	                        </tr>
        	                    </table>
                                </p>
                                <div class="order_submit">
                                @guest
                                    <div class="buy_now">
                                        <a href="#" data-target="#login" data-toggle="modal" class="btn btn-outline-danger btn-sm">Buy Now</a>
                                    </div>
                                    <div class="add_cart">
                                        <a href="#" data-target="#login" data-toggle="modal" class="btn btn-outline-warning btn-sm">Add to cart</a>
                                    </div>  
                                @else       
                                    <div class="buy_now">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Buy Now</button>
                                    </div>
                                    <div class="add_cart">
                                        <button type="submit" class="btn btn-outline-warning btn-sm">Add to cart</button>
                                    </div>
                                @endauth
                                    <div class="love">
                                        <p><a href="{{route('wish.edit',$getSingleProduct->product_id)}}" class="btn btn-light"><i class="far fa-heart"></i>ADD</button></a></p>
                                    </div>
                                </div>
        	                </form>
	                    </div>
	                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 single_tab">
	                      <div class=" mt-3">
                            <div class="card-header tab-card-header">
                              <ul class="nav nav-tabs card-header-tabs overview_tab" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Customer reviews</a>
                                </li>
                              </ul>
                            </div>
                    
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                                <p>{!! $getSingleProduct->description !!}</p>             
                              </div>
                              <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                                
                                @foreach($reviews as $review)
                                <div>
                                     <h3>Name: MD Masum</h3>
                                     
                                     @if($review->stars == '1')
                                     <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                     </div>
                                     @endif
                                     
                                     @if($review->stars == '2')
                                     <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                     </div>
                                     @endif
                                     
                                    @if($review->stars == '3')
                                     <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                     </div>
                                     @endif
                                     
                                     @if($review->stars == '4')
                                     <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                     </div>
                                     @endif
                                     
                                     @if($review->stars == '5')
                                     <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                     </div>
                                     @endif
                                     <p>
                                        {!! $review->details !!}
                                     </p>
                                </div>
                                 <hr>
                                 @endforeach

                                    {{ $reviews->links() }}

                                 <hr>
                                 <br>
                                 <br>
                                 <br>
                                 
                                 <div>
                                     <h3>ADD YOUR REVIEW</h3>
                                     <form action="{{route('rating')}}" method="post">
                                         @csrf
                                         <input type="hidden" name="product_id" value="{{$getSingleProduct->product_id}}">
                                         
                                         <div>
                                             <label>Your Review Details</label>
                                             <textarea class="form-control" name="details" required>
                                                 
                                             </textarea>
                                         </div>
                                          <br>
                                          
                                          <div>
                                            <fieldset class="rating">
                                                <legend>Please rate:</legend>
                                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                                            </fieldset>
                                          </div>
                                         


                                         
                                         
                                         <br>
                                         <div>
                                             <button type="submit" class="btn btn-outline-success btn-sm">Reviw</button>
                                         </div>
                                     </form>
                                 </div>
                                 
                                 
                              </div>
                            </div>
                          </div>
	                    </div>
	                </div>
                  @endforeach
                  @endif
	            </div>

	            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 recomandation_product">
	                <center><h4>Rcomandet For You</h4></center>
	                <div class="row">
                    @if(count($recomandedProducts) > 0)
                    @foreach($recomandedProducts as $key=> $product)
	                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-6 card_div">
                            <a href="{{route('product.single-product-view',$product->product_id)}}"><div class="product_div">
                                <!--<div class="overlay"><h3>{{$product->title}}</h3></div>-->
                              @foreach($product->productImages as $imgKey=>$productImg)
                              @if($imgKey == 0)
                              <center><img class="side_img" src="{{url('public/images/product',$productImg->image)}}" class="card-img-top" alt="..."></center>
                              @endif
                              @endforeach
                              <div class="card_info">
                                <h3>{{$product->title}}</h3>
                                @foreach($product->priceCharts as $chartKey=>$priceChart)
                                @if($chartKey == 0)
            	                <span class="special_price">{{$currency->symbol}} {{$priceChart->discount_price * $currency->rate}}</span><br>
            	                <span class="regular_price">{{$currency->symbol}} {{$priceChart->regular_price * $currency->rate}}</span> - <span>{{$priceChart->commission}}%</span><br>
            	                
            	                
            	                
            	                
            	                
            	                
            	                
            	                
            	                
                      @php
                        $review_count = $product->reviews->count();
                        $total_star = $product->reviews->sum('stars');
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
            	                
            	                
            	                
            	                
            	                
            	                
            	                
            	                
            	                
            	                
            	                
                              @endif
                              @endforeach
                              </div>
                            </div></a>
                        </div>
                      @endforeach  
                      @endif
	                 </div>
	            </div>
	        </div>
	    </section>
	   
	   
	                                      <div id="login" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                        
                                        <div class="modal-content">
                                          <div class="modal-body">
                                            <button data-dismiss="modal" class="close">&times;</button>
                                            <h4>Login</h4>
                                            <form  method="POST" action="{{ route('login') }}">
                                                @csrf
                                              <input type="text" name="email" class="email form-control my-control" placeholder="email"/>
                                              <input type="password" name="password" class="password form-control my-control" placeholder="password"/>
                                              <input class="btn login" type="submit" value="Login" /><a style="border-radius:50px; margin-left:10px;margin-top:20px;height:35px" href="{{URL::to('register')}}" class="btn btn-outline-warning">Registration</a>
                                            </form>
                                          </div>
                                        </div>
                                      </div>  
                                    </div>
@endsection