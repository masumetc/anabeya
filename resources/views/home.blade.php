@extends('Frontend.app')

@section('main_content')
<?php 
                                                            $log= DB::table('settings')
                                                                  ->where('status',1)
                                                                  ->where('type','logo')
                                                                  ->get();
                                                            $users= DB::table('users')
                                                                  ->get();
                                                            
                                                         ?>
                                                         <style>
                                                             .border{
                                                                 padding:5px;
                                                             }
                                                         </style>
<div class="container" style="min-height:600px">
    <div class="row ">
        <div class="col-lg-1 col-md-1 col-xl-1 col-sm-12 col-12">
        </div>
        <div class="col-lg-10 col-xl-10 col-md-10 col-sm-12 col-12">
            @auth
            <div class="row home_page">
                <div class="col-lg-5 col-xl-5 col-md-5 col-sm-12 col-12 profile_col">
                    <div class="personal_profile">
                        <h4>Personal information <span>| </span>
                                <a  data-toggle="modal" data-target="#responsive-modal" class="model_img img-responsive btn waves-effect waves-light btn-rounded btn-primary">Edit</a>
                                
                                <div id="responsive-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">User Information Update</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body"  style="font-size: 15px;">
                                                @if($user)
                                                <form action="{{route('user-information-update',Auth::user()->id)}}" method="post" id="myForm">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name" class="control-label">Name:</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mobile"  class="control-label">Mobile:</label>
                                                        <input type="number" name="mobile" class="form-control" value="{{$user->mobile}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="user_country"  class="control-label">Country:</label>
                                                        <input type="text" name="user_country" class="form-control" value="{{$user->user_country}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="user_city"  class="control-label">City:</label>
                                                        <input type="text" name="user_city" class="form-control" value="{{$user->user_city}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="user_zip"  class="control-label">Zip Code:</label>
                                                        <input type="text" name="user_zip" class="form-control" value="{{$user->user_zip}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="user_address"  class="control-label">Zip Code:</label>
                                                        <textarea class="form-control" rows="4" cols="4" name="user_address">v{{$user->user_address}}</textarea>
                                                    </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger waves-effect waves-light">Save changes</button>
                                            </div> 
                                        </form>
                                        @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </h4>
                        <p>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</p>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-7 col-md-7 col-sm-12 col-12 profile_col">
                    <div class="address_book">
                        <h4>Primary Adress <!--<span>| </span><a href="{{ Auth::user()->id }}">Edit</a>--></h4>
                        <p>{{ Auth::user()->user_address }}, {{ Auth::user()->user_city }}, {{ Auth::user()->user_zip }}</p>
                        <p>{{ Auth::user()->user_country }}</p>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 profile_col">
                    <div class="Order_table">
                        <h4>Your Order</h4>
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm user_product" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th class="th-sm">product
                              </th>
                              <th class="th-sm">Product Name
                              </th>
                              <th class="th-sm">Invoice No
                              </th>
                              <th class="th-sm">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @if($orders->count() != null)
                          @foreach($orders as $order)
                            <tr>
                              <td class="product_data_img">
                                    <img src="{{url('public/images/product',$order->image)}}" class="product_table_img"/>
                              </td>
                              <td class="product_data_title" >{{$order->name}}</td>
                              <td>#1235</td>
                              <td>
                                  @if($order->status == '10')
                                  <button type="button" class="btn-btn btn-success">Refund Pending</button>
                                  @elseif($order->status == '11')
                                  <button type="button" class="btn-btn btn-success">Refund Successfull</button>
                                  @else
                                  <div class="action_icon">
                                      <a data-fancybox data-src="#cencel-id-{{$order->id}}" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Cencel Order"><i class="fas fa-undo"></i></a>
                                          <div style="display: none;" id="cencel-id-{{$order->id}}" class="pop_up_confirm">
                                                <span>Are you sure to for cencel this order ?</span>
                                                <a href="{{route('cancel.order', $order->id)}}" class="btn btn-outline-danger btn-sm delete_btn">Yes</a>
                                           </div>
                                      <a data-fancybox data-src="#refund-id-{{$order->id}}" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Refund Order"><i class="fas fa-comments-dollar" ></i></a>
                                      
                                          <div style="display: none;" id="refund-id-{{$order->id}}" class="pop_up_confirm">
                                                <form action="{{route('refund')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="productid" value="{{$order->id}}">
                                                    
                                                    <span>Why you want to refund ?</span>
                                                    <textarea name="details_refund" class="form-control"></textarea>
                                                    <span>Upload product inquery image for check</span>
                                                    <input class="form-control" type="file" name="">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm delete_btn">Apply</button>
                                                </form>
                                           </div>
                                          <a data-fancybox data-src="#invoice-id-{{$order->id}}" href="javascript:;"  data-toggle="tooltip" data-placement="top" title="Order Invoice"><i class="fas fa-eye"></i></a>
                                          
                                          <div style="display: none;" id="invoice-id-{{$order->id}}" class="pop_up_confirm">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="card card-body printableArea">  
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-4 border">
                                                                                    @foreach($log as $key=>$logImg)
                                                                                      @if($key == 0)
                                                                                      <img src="{{URL::to('public/images/logo_img/',$logImg->image)}}"  width="100px" height="50px" alt="homepage" class="dark-logo"/>
                                                                                      @endif
                                                                                    @endforeach  
                                                                            </div>
                                                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-4 border">
                                                                                    Invoice No: {{$order->id}}
                                                                            </div>
                                                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-4  border">
                                                                                    {{$order->created_at}}
                                                                            </div>
                                                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 border">
                                                                                    <strong>Send to:</strong><br>
                                                                                    
                                                                                    Name: Anabeya<br>
                                                                                    Address: 43, S Karim Bhabon,4th Floor,(Opposite of Suvastu Tower)<br>
                                                                                    New Elephant Road,Dhaka-1205<br>
                                                                                    Country: Bangladesh <br>
                                                                                    Email: admin@anabeya.com<br>
                                                                                    
                                                                            </div>
                                                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 border">
                                                                                    <strong>Customer:</strong><br>
                                                                                    Name: {{$order->first_name}} {{$order->last_name}}<br>
                                                                                    Address: {{$order->address1}},{{$order->address2}}<br>
                                                                                    State: {{$order->state}}<br>
                                                                                    Country: {{$order->country}} <br>
                                                                                    Zip: {{$order->zip}}<br>  
                                                                                    Email: {{$order->email}}<br>  
                                                                                    @foreach($users as $user)
                                                                                    @if($user->id == $order->buyer_id)
                                                                                    @if($user->mobile > 0)Mobile: {{$user->mobile}}@endif<br>
                                                                                    @endif
                                                                                    @endforeach
                                                                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 border">
                                                                               
                                                                                <strong>Product Item:</strong>
                                                                            </div>
                                                                            <div class="col-lg-7 col-xl-7 col-md-7 col-sm-6 col-6 border">
                                                                                <strong>Product Name:</strong>
                                                                                <p>{{$order->name}}</p>
                                                                            </div>
                                                                            <div class="col-lg-1 col-xl-1 col-md-1 col-sm-1 col-3 border">
                                                                                <strong>Q:</strong>
                                                                                <p>{{$order->quantity}}</p>
                                                                            </div>
                                                                            <div class="col-lg-2 col-xl-2 col-md-2 col-sm-3 col-3 border">
                                                                                <strong>Size:</strong>
                                                                                <p>{{$order->color}},{{$order->size}}</p>
                                                                            </div>
                                                                            <div class="col-lg-2 col-xl-2 col-md-2 col-sm-2 col-3 border">
                                                                                <strong>Price:</strong>
                                                                                <p>${{$order->price}}</p>
                                                                            </div>
                                                                            <div class="col-md-12 border">
                                                                                
                                                                                <div class="pull-right m-t-30 text-right ">
                                                                                    <!--<p>Product amount: </p>-->
                                                                                    <hr>
                                                                                    <h3>Price : ${{$order->price}}</h3>
                                                                                    <h3>Shipping : ${{$order->unit_charge}}</h3>
                                                                                    <hr>
                                                                                    <?php 
                                                                                    $totals = $order->price + $order->unit_charge ;
                                                                                    ?>
                                                                                    <h3><b>Total :</b> ${{$totals}}</h3>
                                                                                    
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                           </div>
                                          <a href="#" data-toggle="tooltip" data-placement="top" title="Product Review & Like"><i class="fas fa-thumbs-up"></i></a>
                                  </div>
                                  @endif
                                  

                              </td>
                            </tr>
                            @endforeach
                          @endif

                          @if($order_olds->count() != null)
                          @foreach($order_olds as $order_old)
                              <tr>
                                  <td class="product_data_img">
                                      <img src="{{url('public/images/product',$order_old->image)}}" class="product_table_img"/>
                                  </td>
                                  <td class="product_data_title" >{{$order_old->name}}</td>
                                  <td>#1235</td>
                                  <td>
                                      <div class="action_icon">
                                          <a data-fancybox data-src="#refund-id-1" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Refund Order"><i class="fas fa-comments-dollar"></i></a>

                                          <div style="display: none;" id="refund-id-1" class="pop_up_confirm">
                                              <form>
                                                  <input type="hidden" name="productid" value="1">

                                                  <span>Why you want to refund ?</span>
                                                  <textarea class="form-control"></textarea>
                                                  <span>Upload product inquery image for check</span>
                                                  <input class="form-control" type="file" name="">
                                                  <button class="btn btn-outline-danger btn-sm delete_btn">Apply</button>
                                              </form>
                                          </div> 
                                          <a data-fancybox data-src="#invoice-idold-{{$order_old->id}}" href="javascript:;"  data-toggle="tooltip" data-placement="top" title="Order Invoice"><i class="fas fa-eye"></i></a>
                                          
                                          <div style="display: none;" id="invoice-idold-{{$order_old->id}}" class="pop_up_confirm">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="card card-body printableArea">  
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-4 border">
                                                                                    @foreach($log as $key=>$logImg)
                                                                                      @if($key == 0)
                                                                                      <img src="{{URL::to('public/images/logo_img/',$logImg->image)}}"  width="100px" height="50px" alt="homepage" class="dark-logo"/>
                                                                                      @endif
                                                                                    @endforeach  
                                                                            </div>
                                                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-4 border">
                                                                                    Invoice No: {{$order_old->id}}
                                                                            </div>
                                                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-4  border">
                                                                                    {{$order_old->created_at}}
                                                                            </div>
                                                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 border">
                                                                                    <strong>Send to:</strong><br>
                                                                                    
                                                                                    Name: Anabeya<br>
                                                                                    Address: 43, S Karim Bhabon,4th Floor,(Opposite of Suvastu Tower)<br>
                                                                                    New Elephant Road,Dhaka-1205<br>
                                                                                    Country: Bangladesh <br>
                                                                                    Email: admin@anabeya.com<br>
                                                                                    
                                                                            </div>
                                                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 border">
                                                                                    <strong>Customer:</strong><br>
                                                                                    Name: {{$order_old->first_name}} {{$order_old->last_name}}<br>
                                                                                    Address: {{$order_old->address1}},{{$order_old->address2}}<br>
                                                                                    State: {{$order_old->state}}<br>
                                                                                    Country: {{$order_old->country}} <br>
                                                                                    Zip: {{$order_old->zip}}<br>  
                                                                                    Email: {{$order_old->email}}<br>  
                                                                                    @foreach($users as $user)
                                                                                    @if($user->id == $order_old->buyer_id)
                                                                                    @if($user->mobile > 0)Mobile: {{$user->mobile}}@endif<br>
                                                                                    @endif
                                                                                    @endforeach
                                                                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 border">
                                                                               
                                                                                <strong>Product Item:</strong>
                                                                            </div>
                                                                            <div class="col-lg-7 col-xl-7 col-md-7 col-sm-6 col-6 border">
                                                                                <strong>Product Name:</strong>
                                                                                <p>{{$order_old->name}}</p>
                                                                            </div>
                                                                            <div class="col-lg-1 col-xl-1 col-md-1 col-sm-1 col-3 border">
                                                                                <strong>Q:</strong>
                                                                                <p>{{$order_old->quantity}}</p>
                                                                            </div>
                                                                            <div class="col-lg-2 col-xl-2 col-md-2 col-sm-3 col-3 border">
                                                                                <strong>Size:</strong>
                                                                                <p>{{$order_old->color}},{{$order_old->size}}</p>
                                                                            </div>
                                                                            <div class="col-lg-2 col-xl-2 col-md-2 col-sm-2 col-3 border">
                                                                                <strong>Price:</strong>
                                                                                <p>${{$order_old->price}}</p>
                                                                            </div>
                                                                            <div class="col-md-12 border">
                                                                                
                                                                                <div class="pull-right m-t-30 text-right ">
                                                                                    <!--<p>Product amount: </p>-->
                                                                                    <hr>
                                                                                    <h3>Price : ${{$order_old->price}}</h3>
                                                                                    <h3>Shipping : ${{$order_old->unit_charge}}</h3>
                                                                                    <hr>
                                                                                    <?php 
                                                                                    $totals = $order_old->price + $order_old->unit_charge ;
                                                                                    ?>
                                                                                    <h3><b>Total :</b> ${{$totals}}</h3>
                                                                                    
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                           </div>
                                          <a href="#" data-toggle="tooltip" data-placement="top" title="Product Review & Like"><i class="fas fa-thumbs-up"></i></a>
                                      </div>
                                  </td>
                              </tr>
                          @endforeach
                          @endif
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            @endauth
        </div>
        <div class="col-lg-1 col-xl-1 col-md-1 col-sm-12 col-12">
        </div>
    </div>
</div>
@endsection
