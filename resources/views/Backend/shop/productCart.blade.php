@extends('Backend.app')
@section('extra-css')

@endsection
@section('content-header')
 <!-- Content Header (Page header) -->
<div class="page-wrapper">
 <div class="container-fluid">
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h4 class="text-themecolor">Product</h4>
</div>
<div class="col-md-7 align-self-center text-right">
<div class="d-flex justify-content-end align-items-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<li class="breadcrumb-item active">Product</li>
</ol>
<button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
</div>
</div>
</div>
@endsection
@section('main-content')
	
	<div class="row">
                    <!-- Column -->
                    <div class="col-md-9 col-lg-9">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h5 class="m-b-0 text-white">Your Cart (4 items)</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table product-overview">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product info</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th style="text-align:center">Total</th>
                                                <th style="text-align:center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="150"><img src="{{URL::to('public/assets/images/gallery/chair.jpg')}}" alt="iMac" width="80"></td>
                                                <td width="550">
                                                    <h5 class="font-500">Rounded Chair</h5>
                                                    <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look</p>
                                                </td>
                                                <td>$153</td>
                                                <td width="70">
                                                    <input type="text" class="form-control" placeholder="1">
                                                </td>
                                                <td width="150" align="center" class="font-500">$153</td>
                                                <td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{URL::to('public/assets/images/gallery/chair.jpg')}}" alt="iMac" width="80"></td>
                                                <td>
                                                    <h5 class="font-500">Rounded Chair</h5>
                                                    <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look</p>
                                                </td>
                                                <td>$153</td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="1">
                                                </td>
                                                <td class="font-500" align="center">$153</td>
                                                <td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{URL::to('public/assets/images/gallery/chair.jpg')}}" alt="iMac" width="80"></td>
                                                <td>
                                                    <h5 class="font-500">Rounded Chair</h5>
                                                    <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look</p>
                                                </td>
                                                <td>$153</td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="1">
                                                </td>
                                                <td class="font-500" align="center">$153</td>
                                                <td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{URL::to('public/assets/images/gallery/chair.jpg')}}" alt="iMac" width="80"></td>
                                                <td>
                                                    <h5 class="font-500">Rounded Chair</h5>
                                                    <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look</p>
                                                </td>
                                                <td>$153</td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="1">
                                                </td>
                                                <td class="font-500" align="center">$153</td>
                                                <td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <button class="btn btn-danger pull-right"><i class="fa fa fa-shopping-cart"></i> Checkout</button>
                                    <button class="btn btn-dark btn-outline"><i class="fa fa-arrow-left"></i> Continue shopping</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CART SUMMARY</h5>
                                <hr>
                                <small>Total Price</small>
                                <h2>$612</h2>
                                <hr>
                                <button class="btn btn-success">Checkout</button>
                                <button class="btn btn-secondary btn-outline">Cancel</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">For Any Support</h5>
                                <hr>
                                <h4><i class="ti-mobile"></i> 9998979695 (Toll Free)</h4> <small>Please contact with us if you have any questions. We are avalible 24h.</small>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
@section('extra-js')

@endsection
@section('script')

<script type="text/javascript">

</script>
@endsection
