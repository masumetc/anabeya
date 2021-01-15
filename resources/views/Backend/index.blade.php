@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
<div class="page-wrapper">
 <div class="container-fluid">
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h4 class="text-themecolor">Dashboard</h4>
</div>
<div class="col-md-7 align-self-center text-right">
<div class="d-flex justify-content-end align-items-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<li class="breadcrumb-item active">Dashboard</li>
</ol>
</div>
</div>
</div>
@endsection
@section('main-content')
            <div class="row">
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">ORDER RECEIVED</h4>
                            <div class="text-right"> <span class="text-muted">Total Order</span>
                            <h1 class="font-light"><sup><i class="ti-arrow-up text-success"></i></sup>{{$totalOrder}}</h1>
                        </div>
                        <!--<span class="text-success">0%</span>-->
                        <!--<div class="progress">-->
                        <!--    <div class="progress-bar bg-success" role="progressbar" style="width: 0%; height: 6px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">DUE PAYMENT</h4>
                        <div class="text-right"> <span class="text-muted">Total DUE</span>
                        <h1 class="font-light"><sup><i class="ti-arrow-up text-primary"></i></sup> ${{$payment_due}}</h1>
                    </div>
                    <!--<span class="text-primary">0%</span>-->
                    <!--<div class="progress">-->
                    <!--    <div class="progress-bar bg-primary" role="progressbar" style="width: 0%; height: 6px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">SALES</h4>
                            <div class="text-right"> <span class="text-muted">Total sell</span>
                                <h1 class="font-light"><sup><i class="ti-arrow-down text-inverse"></i></sup> ${{$payment_total}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
</div>

<!-- ============================================================== -->
<!-- charts -->
<!-- ============================================================== -->
<!--<div class="row">-->
<!--<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">-->
<!--<div class="card">-->
<!--    <div class="card-body">-->
<!--        <h5 class="card-title">Product Overview</h5>-->
<!--        <div class="table-responsive m-t-30">-->
<!--            <table class="table product-overview">-->
<!--                <thead>-->
<!--                    <tr>-->
<!--                        <th>Customer</th>-->
<!--                        <th>Order ID</th>-->
<!--                        <th>Photo</th>-->
<!--                        <th>Product</th>-->
<!--                        <th>Quantity</th>-->
<!--                        <th>Date</th>-->
<!--                        <th>Status</th>-->
<!--                        <th>Actions</th>-->
<!--                    </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                    <tr>-->
<!--                        <td>Steave Jobs</td>-->
<!--                        <td>#85457898</td>-->
<!--                        <td>-->
<!--                            <img src="assets/images/gallery/chair.jpg" alt="iMac" width="80">-->
<!--                        </td>-->
<!--                        <td>Rounded Chair</td>-->
<!--                        <td>20</td>-->
<!--                        <td>10-7-2017</td>-->
<!--                        <td>-->
<!--                            <span class="label label-success">Paid</span>-->
<!--                        </td>-->
<!--                        <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Varun Dhavan</td>-->
<!--                        <td>#95457898</td>-->
<!--                        <td>-->
<!--                            <img src="assets/images/gallery/chair2.jpg" alt="iPhone" width="80">-->
<!--                        </td>-->
<!--                        <td>Wooden Chair</td>-->
<!--                        <td>25</td>-->
<!--                        <td>09-7-2017</td>-->
<!--                        <td>-->
<!--                            <span class="label label-warning">Pending</span>-->
<!--                        </td>-->
<!--                        <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Ritesh Desh</td>-->
<!--                        <td>#68457898</td>-->
<!--                        <td>-->
<!--                            <img src="assets/images/gallery/chair3.jpg" alt="apple_watch" width="80">-->
<!--                        </td>-->
<!--                        <td>Gray Chair</td>-->
<!--                        <td>12</td>-->
<!--                        <td>08-7-2017</td>-->
<!--                        <td>-->
<!--                            <span class="label label-success">Paid</span>-->
<!--                        </td>-->
<!--                        <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Hrithik</td>-->
<!--                        <td>#45457898</td>-->
<!--                        <td>-->
<!--                            <img src="assets/images/gallery/chair4.jpg" alt="mac_mouse" width="80">-->
<!--                        </td>-->
<!--                        <td>Pure Wooden chair</td>-->
<!--                        <td>18</td>-->
<!--                        <td>02-7-2017</td>-->
<!--                        <td>-->
<!--                            <span class="label label-danger">Failed</span>-->
<!--                        </td>-->
<!--                        <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td>-->
<!--                    </tr>-->
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<div class="right-sidebar">
<div class="slimscrollright">
<div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
<div class="r-panel-body">
    <ul id="themecolors" class="m-t-20">
        <li><b>With Light sidebar</b></li>
        <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme working">1</a></li>
        <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
        
    </ul>
    <ul class="m-t-20 chatonline">
        <li><b>Chat option</b></li>
        <li>
            <a href="javascript:void(0)"><img src="assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
        </li>
        <li>
            <a href="javascript:void(0)"><img src="assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
        </li>
    </ul>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
@endsection  