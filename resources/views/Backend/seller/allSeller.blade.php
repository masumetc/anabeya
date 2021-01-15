@extends('Backend.app')
@section('extra-css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{URL('public/assets/node_modules/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
 <link href="http://anabeya.com/public/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<link href="http://anabeya.com/public/dist/css/pages/user-card.css" rel="stylesheet">
@endsection
@section('content-header')
 <!-- Content Header (Page header) -->
<div class="page-wrapper">
 <div class="container-fluid">
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h4 class="text-themecolor">New Seller</h4>
</div>
<div class="col-md-7 align-self-center text-right">
<div class="d-flex justify-content-end align-items-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
<li class="breadcrumb-item active">All Seller</li>
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
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Photo</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Commision</th>
                                                <th>Approve</th>
                                                <th>Edit Commission</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tasks as $task)
                                            <tr>
                                                <td>{{$task->name}}</td>
                                                <td>{{$task->user_name}}</td>
                                                @if($task->profile_img == '')
                                                <td> No Image </td>
                                                @else
                                                <td> <img src="{{URL('public/images/nid_img/'.$task->profile_img)}}" alt="iMac" width="80"> </td>
                                                @endif
                                                <td>{{$task->email}}</td>
                                                <td>{{$task->mobile}}</td>
                                                <td>{{$task->commission}}%</td>
                                                <td>{{$task->created_at}}</td>
                                                <td>
                                                    <a href="{{route('edit.commission', $task->id)}}" class="label label-success">Edit</a>
                                                </td>
                                                <td><a href="{{URL('seller/seller-back-pending')}}/{{\Crypt::encrypt($task->id)}}" id="back_pending" class="text-inverse p-r-10" data-toggle="tooltip" title="back-pending"><i class="ti-clip"></i></a> <a id="sa-confirm" href="{{URL('seller/seller-delete')}}/{{\Crypt::encrypt($task->id)}}" alt="alert" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a> <a id="{{$task->id}}" alt="default" data-toggle="modal" data-target=".bs-profile-modal-lg" class="text-inverse profile_view" title="Profile" data-toggle="tooltip"><i class="ti-eye"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

        <!-- profile modal content -->
                                <div class="modal bs-profile-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Profile</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> 
                                <div class="p_img"></div>
                                <span id="seller_profile_img"></span>
                                    <h4 id="seller_name" class="card-title m-t-10"></h4>
                                    <h6 id="seller_shop_name" class="card-subtitle"></h6>
                                    <h6 class="card-subtitle">Type: Seller</h6>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6 id="seller_email"></h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6 id="seller_mobile"></h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6 id="seller_address"></h6> <small class="text-muted p-t-30 db">Collect Address</small>
                                <h6 id="seller_c_address"></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Verify</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Address</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ammount" role="tab">Ammount</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="el-card-item">
                                                         <div class="el-card-content">
                                                            <h4 class="box-title">NID Front</h4>
                                                            <br/> 
                                                        </div>
                                                        <div class="el-card-avatar el-overlay-1 nid_front">
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="el-card-item">
                                                         <div class="el-card-content">
                                                            <h4 class="box-title">NID Back</h4>
                                                            <br/> 
                                                        </div>
                                                        <div class="el-card-avatar el-overlay-1 nid_back">
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="el-card-item">
                                                         <div class="el-card-content">
                                                            <h4 class="box-title">CheckBook</h4>
                                                            <br/> 
                                                        </div>
                                                        <div class="el-card-avatar el-overlay-1 c_book">
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>   
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Country</strong>
                                                <br>
                                                <p id="seller_country" class="text-muted"></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>City</strong>
                                                <br>
                                                <p id="seller_city" class="text-muted"></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Zip</strong>
                                                <br>
                                                <p id="seller_zip" class="text-muted"></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Address</strong>
                                                <br>
                                                <p id="seller_m_address" class="text-muted"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>C. Country</strong>
                                                <br>
                                                <p id="seller_c_country" class="text-muted"></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>C. City</strong>
                                                <br>
                                                <p id="seller_c_city" class="text-muted"></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>C. Zip</strong>
                                                <br>
                                                <p id="seller_c_zip" class="text-muted"></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>C. Address</strong>
                                                <br>
                                                <p id="seller_c_c_address" class="text-muted"></p>
                                            </div>
                                        </div>
                                        <hr>
                                       </div> 
                                </div>
                                <!--3rd tab-->
                                <div class="tab-pane" id="ammount" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">DUE</h4>
                                                        <div class="text-right"> <span class="text-muted">Total Income</span>
                                                            <h1 class="font-light"><sup><i class="ti-arrow-up text-primary"></i></sup> <span id="due"></span></h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
                                            <!-- Column -->
                                            <div class="col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">TOTAL EARNING</h4>
                                                        <div class="text-right"> <span class="text-muted">Total Earning</span>
                                                            <h1 class="font-light"><sup><i class="ti-arrow-up text-success"></i></sup> <span id="earning"></span></h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
                                        </div>
                                        <div class="modal-footer" id="ammount_btn">
                                              
                                        </div>
                                       </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
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
@endsection
@section('extra-js')
<script src="{{URL('public/assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
<script src="{{URL('public/assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="{{URL('public/dist/js/pages/validation.js')}}"></script>
<script src="{{URL('public/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{URL('public/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>
@endsection
@section('script')

<script>

$(document).ready(function(){
    $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}
        });
    $(document).on('click', '.profile_view', function(e){
            e.preventDefault();
            var id = $(this).attr("id");
            $.ajax({
                url:"{{URL('/seller/seller-profile')}}",
                method:"get",
                data:{id:id},
                dataType: 'JSON',
                success:function(data)
                {
                if(data.profile_img > '0')
                {
                $('.p_img').html('<img src="{{URL("public/images/nid_img")}}/'+data.profile_img+'" class="img-circle seller_profile_img" width="150" />');
                }
                else
                {
                $('.p_img').html('<span>Null</span>');   
                }
                $('#seller_name').html(data.name);
                $('#seller_email').html(data.email);
                $('#seller_mobile').html(data.mobile);
                $('#seller_address').html(data.user_address);
                $('#seller_c_address').html(data.collect_address);
                if(data.nid_front > '0')
                {
                $('.nid_front').html('<img class="seller_nid_front w-100" src="{{URL("public/images/nid_img")}}/'+data.nid_front+'" />');
                }
                else
                {
                $('.nid_front').html('<span>Null</span>');    
                }
                if(data.nid_front > '0')
                {
                $('.nid_back').html('<img class="seller_nid_front w-100" src="{{URL("public/images/nid_img")}}/'+data.nid_back+'" />');
                }
                else
                {
                $('.nid_back').html('<span>Null</span>');    
                }
                if(data.nid_front > '0')
                {
                $('.c_book').html('<img class="seller_nid_front w-100" src="{{URL("public/images/nid_img")}}/'+data.checkbook_image+'" />');
                }
                else
                {
                $('.c_book').html('<span>Null</span>');    
                }
                $('#seller_country').html(data.user_country);
                $('#seller_city').html(data.user_city);
                $('#seller_zip').html(data.user_zip);
                $('#seller_m_address').html(data.collect_address);
                $('#seller_c_country').html(data.collect_country);
                $('#seller_c_city').html(data.collect_city);
                $('#seller_c_zip').html(data.collect_zip);
                $('#seller_c_c_address').html(data.collect_address);
                $('#shop_name').val(data.shop_name);
                $('#due').html(data.user_due);
                $('#earning').html(data.user_earning);
                if(data.user_due > '0')
                {
                $('#ammount_btn').html('<a id="'+data.id+'" class="btn btn-primary waves-effect text-left paid">Paid</a>');
                }
                }
               })
         });
         
         $(document).on('click', '.paid', function(e){
             e.preventDefault();
             var id = $(this).attr("id");
             Swal.fire({

                title: 'Are you sure?',

                text: "You won't be able to revert ammount!",

                type: 'warning',

                showCancelButton: true,

                confirmButtonColor: '#FA7953',

                cancelButtonColor: '#d33',

                confirmButtonText: 'Paid'

            }).then((result) => {

                if (result.value) {

                $.ajax({
                url:"{{URL('/seller/seller-paid')}}",
                method:"get",
                data:{id:id},
                success:function(data)
                {
                 Swal.fire({
    
                    position: 'top-end',
    
                    type: 'success',
    
                    title: 'ammount paid successfully!',
    
                    showConfirmButton: false,
    
                    timer: 1500
    
                })
                 $('#due').html('0');
                }
               })

                }

            })
         });
});

$(document).on('click', '#sa-confirm', function(e) {
         e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({

                title: 'Are you sure?',

                text: "You won't be able to revert this!",

                type: 'warning',

                showCancelButton: true,

                confirmButtonColor: '#3085d6',

                cancelButtonColor: '#d33',

                confirmButtonText: 'Yes, delete it!'

            }).then((result) => {

                if (result.value) {

                    window.location.href = link;

                }

            })

        });

<?php
  $message=Session::get("success");

  if($message)
  {
    echo "Swal.fire('Good job!', '".$message."', 'success')";
    Session::put("success",null);
  }
?>
</script>
@endsection
