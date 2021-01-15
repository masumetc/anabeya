@extends('Frontend.app')
@section('main_content')
<!-- Category Section-->
      <section class="shipping_page" style="min-height:600px">
         <div class="row">
             <div class="col-lg-8 col-xl-8 col-md-8 col-sm-12 col-12 cart_area">
                 <div class="cart_header">
                     <h2>Shopping Cart ({{$cartCollection->count()}})</h2>
                     <p><a class="btn btn-outline-success btn-sm" href="{{url('/')}}">Continue Shopping</a></p>
                 </div>
                     @if(count($cartCollection) > 0)
                     @foreach($cartCollection as $key=>$getSingleCartProduct)
                 <div class="row cart_item">
                     <div class="col-lg-1 col-xl-1 col-md-1 col-sm-2 col-2 cart_check">
                        <input class="cart_check_input" type="checkbox" name="">
                     </div>
                     <div class="col-lg-2 col-xl-2 col-md-2 col-sm-3 col-3 cart_img">
                        <img src="{{URL::to('public/images/product')}}/{{$getSingleCartProduct->attributes->image}}">
                     </div>
                     <div class="col-lg-5 col-xl-5 col-md-4 col-sm-7 col-7 cart_title">
                        <h1>{{$getSingleCartProduct->name}}</h1>
                        <div class="cart_button">
                                <a href="#">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="{{route('product.delete-to-cart',$getSingleCartProduct->id)}}">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                        </div>
                     </div>
                     <div class="col-lg-1 col-xl-2 col-md-1 col-sm-6 col-6 cart_total">
                         <center>
                            <h1><span>Prise:</span> {{$currency->symbol}} {{$getSingleCartProduct->price * $currency->rate}}</h1>
                            <h2><span>Total:</span> {{$currency->symbol}} {{Cart::get($getSingleCartProduct->id)->getPriceSum() * $currency->rate}}</h2>
                        </center>
                     </div>
                     <div class="col-lg-2 col-xl-2 col-md-3 col-sm-6 col-6 cart_quantity">
                            <form action="{{route('product.update-cart')}}">
                                @csrf
                               <div class="input-group quantity_bar">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-number btn-sm"  data-type="minus" data-field="quantity{{$getSingleCartProduct->id}}">
                                        <i class="fas fa-minus-circle"></i>
                                            </button>
                                        </span>
                                                          
                                        <input type="text" name="quantity{{$getSingleCartProduct->id}}" class=" input-number" value="{{$getSingleCartProduct->quantity}}" min="1" max="100">
                                                          
                                        <input type="hidden" name="product_id" value="">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-number btn-sm" data-type="plus" data-field="quantity{{$getSingleCartProduct->id}}">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </span>
                                </div><br>
                                <input type="submit" name="update_product" value="update" class="btn btn-sm btn-default cart_qnt_update">

                                <input type="hidden" name="product_id" value="{{$getSingleCartProduct->id}}">
                            </form>
                     </div>
                 </div>
                     @endforeach
                     @endif
                 
             </div>
             <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 checkout_area">
                 <div class="checkouts">
                     <h2>Order Summary</h2>
                     <table width="100%">
                         <tr>
                             <td>Subtotal</td>
                             <td class="price">{{$currency->symbol}} {{Cart::getSubTotal() * $currency->rate}}</td>
                         </tr>
                         <?php $shippingCost=0; ?>
                         @foreach($cartCollection as $key=>$getSingleCartProduct)
                         <tr style="display: none;">
                             <td class="price">{{$getSingleCartProduct->attributes->unit_charge}}</td>
                            <?php
                                $shippingCost += $getSingleCartProduct->attributes->unit_charge;
                             ?>
                         </tr>
                         @endforeach
                          <tr>
                             <td>Shipping</td>
                             <td class="price">{{$currency->symbol}} {{$shippingCost * $currency->rate}}</td>
                         </tr>
    
                         @if($shippingCost)
                         <tr style="padding-top:20px; font-weight:bold;">
                             <td>Total</td>
                             <td class="price">{{$currency->symbol}} {{ (Cart::getSubTotal()+$shippingCost) * $currency->rate}}</td>
                         </tr>
                         @else 
                            <tr style="padding:30px 0; font-weight:bold; color:555;">
                             <td>Total</td>
                             <td class="price">{{$currency->symbol}} {{Cart::getTotal() * $currency->rate}}</td>
                         </tr>
                         @endif
                     </table>
                     <form action="{{route('billing.paypal')}}" method="get">
                         @csrf
                         <button class="btn btn-outline-success cart_order">Place Order</button>
                     </form>
                </div>
             </div>
         </div>
      </section>
@endsection