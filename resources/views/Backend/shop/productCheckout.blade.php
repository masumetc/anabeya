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
	
	 <!-- Info box Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="m-t-0"><i class="fab fa-cc-visa text-info"></i></h1>
                                <h3>**** **** **** 2150</h3>
                                <span class="pull-right">Exp date: 10/16</span>
                                <span class="font-500">Johnathan Doe</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="m-t-0"><i class="fab fa-cc-mastercard text-primary"></i></h1>
                                <h3>**** **** **** 2150</h3>
                                <span class="pull-right">Exp date: 10/16</span>
                                <span class="font-500">Johnathan Doe</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="m-t-0"><i class="fab fa-cc-discover text-success"></i></h1>
                                <h3>**** **** **** 2150</h3>
                                <span class="pull-right">Exp date: 10/16</span>
                                <span class="font-500">Johnathan Doe</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="m-t-0"><i class="fab fa-cc-amex text-warning"></i></h1>
                                <h3>**** **** **** 2150</h3>
                                <span class="pull-right">Exp date: 10/16</span>
                                <span class="font-500">Johnathan Doe</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">PRODUCT SUMMARY</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="assets/images/gallery/chair.jpg" alt="iMac" width="80"></td>
                                                <td>Rounded Chair</td>
                                                <td>20</td>
                                                <td class="font-500">$153</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-500" align="right">Total Amount</td>
                                                <td class="font-500">$153</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <h5 class="card-title">Choose payment Option</h5>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a href="#iprofile" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Debit Card</span>
                                    </a>
                                    </li>
                                    <li role="presentation" class="nav-item">
                                        <a href="#ihome" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-user"></i></span> 
                                        <span class="hidden-xs">Paypal</span>
                                    </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane" id="ihome">
                                        <br/> You can pay your money through paypal, for more info <a href="">click here</a>
                                        <br>
                                        <br>
                                        <button class="btn btn-info"><i class="fab fa-cc-paypal"></i> Pay with Paypal</button>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="iprofile">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <form>
                                                    <div class="form-group input-group m-t-40">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Card Number" aria-label="Amount (to the nearest dollar)">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-7 col-md-7">
                                                            <div class="form-group">
                                                                <label>EXPIRATION DATE</label>
                                                                <input type="text" class="form-control" name="Expiry" placeholder="MM / YY" required=""> </div>
                                                        </div>
                                                        <div class="col-xs-5 col-md-5 pull-right">
                                                            <div class="form-group">
                                                                <label>CV CODE</label>
                                                                <input type="text" class="form-control" name="CVC" placeholder="CVC" required=""> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>NAME OF CARD</label>
                                                                <input type="text" class="form-control" name="nameCard" placeholder="NAME AND SURNAME"> </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-info">Make Payment</button>
                                                </form>
                                            </div>
                                            <div class="col-md-4 ml-auto">
                                                <h4 class="card-title m-t-30">General Info</h4>
                                                <h2><i class="fab fa-cc-visa text-info"></i> <i class="fab fa-cc-mastercard text-danger"></i> <i class="fab fa-cc-discover text-success"></i> <i class="fab fa-cc-amex text-warning"></i></h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
@endsection
@section('extra-js')

@endsection
@section('script')

<script type="text/javascript">

</script>
@endsection
