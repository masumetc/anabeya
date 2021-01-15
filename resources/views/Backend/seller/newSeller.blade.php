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
<li class="breadcrumb-item active">New Seller</li>
</ol>
<button type="button" alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-info d-none d-lg-block m-l-15"><i class="ti-plus"></i>ADD New Seller</button>
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
                                                <th>Status</th>
                                                <th>R.Date</th>
                                                <th>V.Mail</th>
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
                                                <td>
                                                    @if($task->mobile != '' && $task->checkbook_image != '' && $task->nid_front != '' && $task->nid_back != '' && $task->profile_img != '' && $task->user_country != '' && $task->user_city != '' && $task->user_zip != '' && $task->user_address != '' && $task->collect_country != '' && $task->collect_city != '' && $task->collect_address != '' && $task->collect_zip != '')
                                                    <a href="{{URL('seller/seller-approve')}}/{{\Crypt::encrypt($task->id)}}" id="approve" class="btn btn-primary">Approve</a>
                                                    @else
                                                    <span class="label label-danger font-weight-100">required</span>
                                                    @endif
                                                </td>
                                                <td>{{$task->created_at}}</td>
                                                <td>
                                                    @if($task->email_verify_code == '0')
                                                     <span class="label label-success font-weight-100">verified</span> 
                                                    @else
                                                    <span class="label label-warning font-weight-100">Not verified</span>
                                                    @endif
                                                </td>
                                                <td><a id="edit" data-id="{{ $task->id }}" data-name="{{ $task->name }}" data-username="{{ $task->user_name }}" data-email="{{ $task->email }}" data-mobile="{{ $task->mobile }}" data-country="{{ $task->user_country }}" data-city="{{ $task->user_city }}" data-zip="{{ $task->user_zip }}" data-address="{{ $task->user_address }}" data-ccountry="{{ $task->collect_country }}" data-ccity="{{ $task->collect_city }}" data-czip="{{ $task->collect_zip }}" data-caddress="{{ $task->collect_address }}" alt="default" data-toggle="modal" data-target=".bs-edit-modal-lg" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a> <a id="sa-confirm" href="{{URL('seller/seller-delete')}}/{{\Crypt::encrypt($task->id)}}" alt="alert" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a> <a id="{{$task->id}}" alt="default" data-toggle="modal" data-target=".bs-profile-modal-lg" class="text-inverse profile_view" title="Profile" data-toggle="tooltip"><i class="ti-eye"></i></a></td>
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
                    <!-- add modal -->
                    <div class="col-md-4">
                        <div class="card">
                                <!-- sample modal content -->
                                <div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">add new seller</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                                <form action="{{URL::to('seller/seller-add')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="fullname" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                                                    <span id="user_availability"></span>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control" name="email" placeholder="email" required>
                                                    <span id="email_availability"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                    </div>
                                    <div class="modal-footer">
                                                <button type="submit" id="add" class="btn btn-success waves-effect text-left"> <i class="fa fa-check"</i></i>Save</button>
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                        </div>
                    </div>
                    <!-- end add modal -->
                    
        <!-- start edit modal -->
                    <div class="col-md-12">
                        <div class="card">
                                <!-- sample modal content -->
                                <div class="modal bs-edit-modal-lg" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Update Seller</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                    <div class="col-sm-12">
                                <div class="row">
                                                  <div class="col-2">
                                                    <div class="list-group" id="list-tab" role="tablist">
                                                      <a class="list-group-item list-group-item-action active" id="list-privacy-list" data-toggle="list" href="#list-privacy" role="tab" aria-controls="privacy">Privacy</a>
                                                      <a class="list-group-item list-group-item-action" id="list-address-list" data-toggle="list" href="#list-address" role="tab" aria-controls="address">Address</a>
                                                      <a class="list-group-item list-group-item-action" id="list-nid-list" data-toggle="list" href="#list-nid" role="tab" aria-controls="nid">NID</a>
                                                      <a class="list-group-item list-group-item-action" id="list-image-list" data-toggle="list" href="#list-image" role="tab" aria-controls="image">Image</a>
                                                    </div>
                                                  </div>
                                                  <div class="col-10">
                                                    <div class="tab-content" id="nav-tabContent">
                                                      <div class="tab-pane fade show active" id="list-privacy" role="tabpanel" aria-labelledby="list-privacy-list">
                                                          <form action="{{URL::to('seller/edit-privacy')}}" method="POST" enctype="multipart/form-data" class="floating-labels">
                                                              {{ csrf_field() }}
                                                              <input type="hidden" name="id" id="id"/>
                                                              <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Full Name</label>
                                                                            <input type="text" id="edit_name" name="edit_name" class="form-control" placeholder="Full Name" required>
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                    <div class="col-md-6">
                                                                        <label for="validationCustomUsername">Username</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" id="edit_username" name="edit_username" placeholder="Username">
                                                                    </div>
                                                                    </div>
                                                                    <!--/span-->
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Email</label>
                                                                        <input type="text" id="edit_email" name="edit_email" class="form-control" required>
                                                                        <span id="email_availability"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile</label>
                                                                        <input type="text" id="mobile" name="mobile" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="control-label">Shop Name</label>
                                                                    <input type="text" id="shop_name" name="shop_name" class="form-control" required>
                                                            </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" id="edit_privacy" class="btn btn-info waves-effect text-left"> <i class="fa fa-check"></i> Change</button>
                                                                </div>
                                                                </form>
                                                            <!--/span-->
                                                            <form class="floating-labels" action="{{URL('seller/update-password')}}" method="POST">
                                                                    {{ csrf_field() }}
                                                              <input type="hidden" name="pass_id" id="pass_id"/>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Password</label>
                                                                            <input type="password" id="update_password" name="update_password" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <br>
                                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>Password Change</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane fade" id="list-address" role="tabpanel" aria-labelledby="list-address-list">
                                                            <form action="{{URL::to('seller/edit-address')}}" method="POST" enctype="multipart/form-data" class="floating-labels" novalidate>
                                                                  {{ csrf_field() }}
                                                                <input type="hidden" name="address_id" id="address_id"/>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">City</label>
                                                                            <input type="text" id="city" name="city" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Zip</label>
                                                                            <input type="text" id="zip" name="zip" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                            <!--/span-->
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                                                                </div>
                                                                <hr>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                    <label class="custom-control-label" for="customCheck1">i need custom collecting address?</label>
                                                                </div>
                                                                <div class="row m-t-40">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Collecting City</label>
                                                                            <input type="text" id="collect_city" name="collect_city" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                        <!--/span-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Collecting Zip</label>
                                                                            <input type="text" id="collect_zip" name="collect_zip" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                            <!--/span-->
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label>Collecting Address</label>
                                                                    <textarea class="form-control" id="collect_address" name="collect_address" rows="5"></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" id="edit_privacy" class="btn btn-info waves-effect text-left"> <i class="fa fa-check"></i> Change</button>
                                                                </div>
                                                            </form> 
                                                        </div>
                                                        <div class="tab-pane fade" id="list-nid" role="tabpanel" aria-labelledby="list-nid-list">
                                                           <form action="{{URL::to('seller/edit-nid')}}" method="POST" enctype="multipart/form-data" class="floating-labels" novalidate>
                                                                  {{ csrf_field() }}
                                                                <input type="hidden" name="nid_id" id="nid_id"/>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">NID Front Side</label>
                                                                            <input type="file" id="nid_front" name="nid_front" class="dropify" data-max-file-size="2M">
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                                <label class="control-label">NID Back Side</label>
                                                                                <input type="file" id="nid_back" name="nid_back" class="dropify" data-max-file-size="2M">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>CheckBook Image</label>
                                                                    <input type="file" class="dropify" id="check_book" name="check_book" data-max-file-size="2M">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" id="edit_nid" class="btn btn-info waves-effect text-left"> <i class="fa fa-check"></i> Change</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane fade" id="list-image" role="tabpanel" aria-labelledby="list-image-list">
                                                            <form action="{{URL::to('seller/edit-profile')}}" method="POST" enctype="multipart/form-data" class="floating-labels" novalidate>
                                                              {{ csrf_field() }}
                                                            <input type="hidden" name="profile_id" id="profile_id"/>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="input-file-max-fs">Profile Image</label>
                                                                    <input type="file" id="profile_img" name="profile_img" class="dropify" data-max-file-size="2M" />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" id="edit_profile" class="btn btn-info waves-effect text-left"> <i class="fa fa-check"></i> Change</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                        </div>
                    </div>
                    <!-- end edit modal -->
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
                                                            </div><hr>
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

<script type="text/javascript">

$(function(){
  $('#username').on('keyup', function(){
      var username = $(this).val();

      $.ajax({
        url: '/seller/check-username',
        method:'get',
      data:{username:username},
      success:function(response)
      {
          response = $.parseJSON(response);
       if(response.status == 'success')
       {
        $('#user_availability').html('<span class="text-danger"><small id="user_availability" class="form-control-feedback has-success"> username taken </small></span>');
        $('#add').attr("disabled", true);
       }
       else
       {
        $('#user_availability').html('<span class="text-success"><small id="user_availability" class="form-control-feedback has-success"> username available </small></span>');
        $('#add').attr("disabled", false);
       }
      }

      });
  });
});

$(function(){
  $('#email').on('keyup', function(){
      var email = $(this).val();

      $.ajax({
        url: '/seller/check-email',
        method:'get',
      data:{email:email},
      success:function(response)
      {
          response = $.parseJSON(response);
       if(response.status == 'success')
       {
        $('#email_availability').html('<span class="text-danger"><small id="email_availability" class="form-control-feedback"> email taken </small></span>');
        $('#add').attr("disabled", true);
       }
       else
       {
        $('#email_availability').html('');
        $('#add').attr("disabled", false);
       }
      }

      });
  });
});

$(function(){
  $('#city').on('keyup', function(){
      var city = $(this).val();
      $('#collect_city').val(city);
 });
 $('#zip').on('keyup', function(){
      var zip = $(this).val();
      $('#collect_zip').val(zip);
 });
 $('#address').on('keyup', function(){
      var address = $(this).val();
      $('#collect_address').val(address);
 });
 
$(document).ready(function(){

$('#collect_city').attr('disabled', true);
$('#collect_zip').attr('disabled', true);
$('#collect_address').attr('disabled', true);

 $('#customCheck1').change(function(){
    var ch = this.checked;
    if(ch){
        $('#collect_city').attr('disabled', false);
        $('#collect_zip').attr('disabled', false);
        $('#collect_address').attr('disabled', false);
    }
    else{
        $('#collect_city').attr('disabled', true);
        $('#collect_zip').attr('disabled', true);
        $('#collect_address').attr('disabled', true);
    }
 });
});
});
$(document).ready(function(){
  $(document).on('click', '#edit', function(){
      let id = $(this).data('id');
      let name = $(this).data('name');
      let username = $(this).data('username');
      let email = $(this).data('email');
      let mobile = $(this).data('mobile');
      let user_city = $(this).data('city');
      let user_zip = $(this).data('zip');
      let user_address = $(this).data('address');
      let collect_city = $(this).data('ccity');
      let collect_zip = $(this).data('czip');
      let collect_address = $(this).data('caddress');
      $('#id').val(id);
      $('#pass_id').val(id);
      $('#address_id').val(id);
      $('#nid_id').val(id);
      $('#profile_id').val(id);
      $('#edit_name').val(name);
      $('#edit_username').val(username);
      $('#edit_email').val(email);
      $('#mobile').val(mobile);
      $('#city').val(user_city);
      $('#zip').val(user_zip);
      $('#address').val(user_address);
      $('#collect_city').val(collect_city);
      $('#collect_zip').val(collect_zip);
      $('#collect_address').val(collect_address);

      $.ajax({
        url: '/seller/edit-more',
        method:'get',
      data:{id:id},
      success:function(response)
      {
        response = $.parseJSON(response);
        
        $('#shop_name').val(response.shop_name);
      }

      });
});
});

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
});

    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
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
