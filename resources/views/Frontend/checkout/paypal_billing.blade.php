@extends('Frontend.app')


@section('main_content')
    <!-- Category Section-->
    <section class="shipping_page" style="min-height:600px">
        <div class="row">
            <div class="col-sm-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <div class="col-sm-12">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
            </div>
            <form class="needs-validation" action="{{route('paypal.checkout')}}" method="post" novalidate>
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <div class="billing_form">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">{{$cartCollection->count()}}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php $shippingCost=0; ?>
                            @if(count($cartCollection) > 0)
                                @foreach($cartCollection as $key=>$getSingleCartProduct)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{$getSingleCartProduct->name}}</h6>
    
                                </div>
                                <span class="text-muted">{{$currency->symbol}} {{$getSingleCartProduct->price * $currency->rate}}</span>
                            </li>
                                        <?php
                                        $shippingCost += $getSingleCartProduct->attributes->unit_charge;
                                        ?>
                                @endforeach
                            @endif

                                @if($shippingCost)
                                                            <li class="list-group-item d-flex justify-content-between">
                                <span>Shipping: </span>
                                <strong>{{$currency->symbol}} {{$shippingCost * $currency->rate}}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total ({{$currency->symbol}})</span>
                                <strong>{{$currency->symbol}} {{ (Cart::getSubTotal()+$shippingCost) * $currency->rate}}</strong>
                            </li>

                            @else
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total ({{$currency->symbol}})</span>
                                    <strong>{{$currency->symbol}} {{Cart::getTotal() * $currency->rate}}</strong>
                                </li>
                            @endif
                        </ul>
    
                        <!--<form class="card p-2">-->
                        <!--    <div class="input-group">-->
                        <!--        <input type="text" class="form-control" placeholder="Promo code">-->
                        <!--        <div class="input-group-append">-->
                        <!--            <button type="submit" class="btn btn-secondary">Redeem</button>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</form>-->
                    </div>
                    <button name="paypal" value="paypal" class="btn btn-outline-success btn-lg btn-block payment_pay" type="submit">Pay With Paypal</button>

                    <button name="stripe" value="stripe" class="btn btn-outline-warning btn-lg btn-block payment_pay" type="submit">Pay With Credit Cards</button>

                    <button name="tbc" value="stripe" class="btn btn-outline-danger btn-lg btn-block payment_pay" type="submit">Tbc</button>
                    
                    <button name="local" value="local" class="btn btn-outline-primary btn-lg btn-block payment_pay" type="submit"><img width="200" height="30" src="{{url('public/images/uttara.png')}}">Bank transfer</button>
                </div>
                <div class="col-md-8 order-md-1">
                    <div class="billing_form">
                        <h4 class="mb-3">Billing address</h4>

                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control border-primary @error('first_name') is-invalid @enderror" id="first_name" placeholder="" value="{{Auth::user()->name}}" name="first_name" required>
                                    <div class="invalid-feedback">
                                        @if($errors->has('first_name'))
                                            <div class="alert alert-danger">
                                                {{$errors->first('first_name')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control border-primary @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{Auth::user()->last_name}}" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        @if($errors->has('last_name'))
                                            <div class="alert alert-danger">
                                                {{$errors->first('last_name')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
    
    
                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted">*</span></label>
                                <input type="email" class="form-control border-primary @error('email') is-invalid @enderror" value="{{Auth::user()->email}}" id="email" name="email">
                                <div class="invalid-feedback">
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <label for="address1">Address</label>
                                <input type="text" class="form-control border-primary @error('address1') is-invalid @enderror" value="{{Auth::user()->collect_address}}" id="address1" name="address1" required>
                                <div class="invalid-feedback">
                                    @if($errors->has('address1'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('address1')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2" name="address2" value="{{Auth::user()->shipping_address}}">
                            </div>
    
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">Country</label>
                                <select class="form-control @error('country') is-invalid @enderror" name="country" id="country" required>
                                   <option value="Austria">Austria</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Bosnia">Bosnia</option>
                                    <option value="Franceh">Franceh</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Kosovo">Kosovo</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="North Macedonia">North Macedonia</option>
                                    <option value="Moldovab">Moldovab</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Netherlandsi">Netherlandsi</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Portugalf">Portugalf</option>
                                    <option value="Russiac">Russiac</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Serbiag">Serbiag</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="Vatican City">Vatican City</option>
                                </select>
                                    <div class="invalid-feedback">
                                        @if($errors->has('country'))
                                            <div class="alert alert-danger">
                                                {{$errors->first('country')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control border-primary @error('state') is-invalid @enderror" id="state" value="{{Auth::user()->shipping_city}}"  name="state" placeholder="" required>
                                    <div class="invalid-feedback">
                                        @if($errors->has('state'))
                                            <div class="alert alert-danger">
                                                {{$errors->first('state')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control border-primary @error('zip') is-invalid @enderror" value="{{Auth::user()->shipping_zip}}" name="zip" id="zip" placeholder="" required>
                                    <div class="invalid-feedback">
                                        @if($errors->has('zip'))
                                            <div class="alert alert-danger">
                                                {{$errors->first('zip')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
    
                            <hr class="mb-4">
    
    
                        <button name="save_info" value="save_info" class="btn btn-outline-info btn-lg btn-block payment_pay" type="submit">save information</button>



                        <br>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
@endsection