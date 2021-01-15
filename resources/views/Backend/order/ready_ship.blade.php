@extends('Backend.app')
@section('extra-css')

@endsection
@section('content-header')
 <?php 
                                                            $log= DB::table('settings')
                                                                  ->where('status',1)
                                                                  ->where('type','logo')
                                                                  ->get();
                                                            $users= DB::table('users')
                                                                  ->get();
                                                            
                                                         ?>
    <!-- Content Header (Page header) -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Ready To Ship</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">New Order</li>
                        </ol>
                    </div>
                </div>
            </div>
            @endsection
            @section('main-content')
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table product-overview" id="myTable">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Buyer</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Payment</th>
                                            <th>Actions</th>
                                             @if(Auth::user()->role == 'superadmin')
                                            <th>Actions</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td> <img src="{{url('public/images/product',$order->image)}}" alt="iMac" width="80" height="80"> </td>
                                                <td class="order_name">{{$order->name}}</td>
                                                <td>{{$order->price}}</td>
                                                <td>{{$order->quantity}}</td>
                                                <td>{{$order->first_name}} {{$order->last_name}}</td>
                                                <td>{{$order->email}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td> <span class="label label-success font-weight-100">Paid</span> </td>
                                                 @if(Auth::user()->role == 'superadmin')
                                                 <td> 
                                                    <a href="{{route('uporder_one', $order->id)}}" class="label label-primary font-weight-100">Up</a>
                                                </td>
                                                @endif
                                                <td>
                                                    <a href="{{route('ship.new', $order->id)}}" class="label label-danger font-weight-100">New Order</a>
                                                    <a data-toggle="modal" data-target=".bs-example-modal-lg{{$order->id}}"  class="label label-info font-weight-100">Invoice</a>
                                                </td>
                                            </tr><div class="modal bs-example-modal-lg{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel">Invoice</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
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
                                                                                    <strong>Seller:</strong><br>
                                                                                    
                                                                                    @foreach($users as $user)
                                                                                    @if($user->id == $order->seller_id)
                                                                                    Name: {{$user->name}}<br>
                                                                                    Address: {{$user->collect_address}}<br>
                                                                                    State: {{$user->collect_city}}<br>
                                                                                    Country: {{$user->collect_country}} <br>
                                                                                    Zip: {{$user->collect_zip}}<br>
                                                                                    @endif
                                                                                    @endforeach
                                                                                    
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
                                                                            @if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager')
                                                                            <div style="padding:10px" class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 border">
                                                                                    <strong>Payment Method:</strong><br>
                                                                                    @if($order->payment_status == '1')
                                                                                     <img src="{{url('public/frontend/assets/images/paypal.png')}}" alt="iMac" width="80" height="80">
                                                                                     @elseif($order->payment_status == '2')
                                                                                     <img src="{{url('public/frontend/assets/images/mastercard.png')}}" alt="iMac" width="80" height="80">
                                                                                    @elseif($order->payment_status == '3')
                                                                                     <img src="{{url('public/frontend/assets/images/pay6.jpg')}}" alt="iMac" width="80" height="80">
                                                                                     @elseif($order->payment_status == '4')
                                                                                     Bank Transfer
                                                                                     @endif
                                                                                    
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 border">
                                                                               
                                                                                <strong>Product Item:</strong>
                                                                            </div>
                                                                            <div class="col-lg-7 col-xl-7 col-md-7 col-sm-6 col-6 border">
                                                                                <strong>Product Name:</strong>
                                                                                <p>{{$order->name}}</p>
                                                                            </div>
                                                                            <div class="col-lg-1 col-xl-1 col-md-1 col-sm-2 col-2 border">
                                                                                <strong>Q:</strong>
                                                                                <p>{{$order->quantity}}</p>
                                                                            </div>
                                                                            <div class="col-lg-2 col-xl-2 col-md-2 col-sm-2 col-2 border">
                                                                                <strong>Size:</strong>
                                                                                <p>{{$order->color}},{{$order->size}}</p>
                                                                            </div>
                                                                            <div class="col-lg-2 col-xl-2 col-md-2 col-sm-2 col-2 border">
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
                                                                                <div class="text-right">
                                                                                    <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="ti-printer"></i> Print</span> </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            @endsection
            @section('extra-js')

            @endsection
            @section('script')

                <script type="text/javascript">

                </script>
@endsection
