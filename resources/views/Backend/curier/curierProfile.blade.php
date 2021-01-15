@extends('Backend.app')
@section('extra-css')

@endsection
@section('content-header')
 <!-- Content Header (Page header) -->
<div class="page-wrapper">
 <div class="container-fluid">
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h4 class="text-themecolor">Profile</h4>
</div>
<div class="col-md-7 align-self-center text-right">
<div class="d-flex justify-content-end align-items-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
<li class="breadcrumb-item active">Profile</li>
</ol>
</div>
</div>
</div>
@endsection
@section('main-content')
	<div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> 
                                    <img src="{{URL::to('public/assets/images/users/'.auth()->user()->profile_img)}}" class="img-circle" width="150" />
                                    
                                    <h4 class="card-title m-t-10">{{ auth()->user()->name }}</h4>
                                    <h6 class="card-subtitle">{{ auth()->user()->user_name }}</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class=" ti-money"></i> <font class="font-medium">Available <br> {{auth()->user()->user_due}}</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class=" ti-money"></i> <font class="font-medium">Total <br> {{auth()->user()->user_earning}}</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6>{{ auth()->user()->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{ auth()->user()->mobile }}</h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{ auth()->user()->user_address }} <br>Zip: {{ auth()->user()->user_zip }}<br> City: {{ auth()->user()->user_city }} <br> Country: {{ auth()->user()->user_country }}</h6>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">{{ auth()->user()->name }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">{{ auth()->user()->mobile }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{ auth()->user()->email }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                <br>
                                                <p class="text-muted">{{ auth()->user()->user_city }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        @if(Auth::user()->role == 'seller')
                                        <p class="m-t-30">Your check book</p>
                                        <img style="width:100%" src="{{URL::to('public/assets/images/nid_img/'.auth()->user()->checkbook_image)}}">
                                        <p class="m-t-30">Your National ID Card</p>
                                        <img style="width:100%" src="{{URL::to('public/assets/images/nid_img/'.auth()->user()->nid_front)}}">
                                        <img style="width:100%" src="{{URL::to('public/assets/images/nid_img/'.auth()->user()->nid_back)}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ auth()->user()->name }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="{{ auth()->user()->email }}" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ auth()->user()->mobile }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">City</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ auth()->user()->user_city }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Zip</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="{{ auth()->user()->user_zip }}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Address</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" class="form-control form-control-line">{{ auth()->user()->user_address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
