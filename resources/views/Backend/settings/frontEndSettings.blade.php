@extends('Backend.app')
@section('extra-css')
 <link href="{{URL('public/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css')}}" rel="stylesheet">
<link href="{{URL('public/dist/css/pages/user-card.css')}}" rel="stylesheet">
<link href="{{URL('public/assets/node_modules/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{URL('public/assets/node_modules/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('content-header')
 <!-- Content Header (Page header) -->
<div class="page-wrapper">
 <div class="container-fluid">
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h4 class="text-themecolor">Front End Settings</h4>
</div>
<div class="col-md-7 align-self-center text-right">
<div class="d-flex justify-content-end align-items-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<li class="breadcrumb-item active">Front End Settings</li>
</ol>
</div>
</div>
</div>
@endsection
@section('main-content')
	<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#header" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-down"></i></span> <span class="hidden-xs-down">Header</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#slider" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-down"></i></span> <span class="hidden-xs-down">Slider</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#banner" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-down"></i></span> <span class="hidden-xs-down">Banner</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#products" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-down"></i></span> <span class="hidden-xs-down">Products</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#footer" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-down"></i></span> <span class="hidden-xs-down">Footer</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="header" role="tabpanel">
                                        <!-- row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <!-- Nav tabs -->
                                                        <div class="vtabs">
                                                            <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#logo" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-right"></i></span> <span class="hidden-xs-down">Logo</span> </a> </li>
                                                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#search" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-right"></i></span> <span class="hidden-xs-down">Search Box</span></a> </li>
                                                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#top_menu" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-right"></i></span> <span class="hidden-xs-down">Top Menu</span></a> </li>
                                                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#app_menu" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-right"></i></span> <span class="hidden-xs-down">App Menu</span></a> </li>
                                                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#srvice" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-right"></i></span> <span class="hidden-xs-down">Service Menu</span></a> </li>
                                                            </ul>
                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="logo" role="tabpanel">
                                                                    <div class="p-20">
                                                                       <form method="POST" action="{{URL::to('settings/logo-settings')}}" enctype="multipart/form-data">
                                                                           {{ csrf_field() }}
                                                                          <div class="form-group">
                                                                              <input type="file" name="logo_img" id="logo_img" class="form-control">
                                                                          </div> 
                                                                              <div class="row"
                                                                              <div class="col-md-6">
                                                                              <div class="form-group">
                                                                              <button type="submit" name="submit" id="submit" class="btn btn-success form-control">Upload Logo</button>
                                                                              </div>
                                                                              </form>
                                                                              <div class="col-md-6">
                                                                                <div class="form-group">
                                                                              <button type="button" alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary form-control">Choose Logo</button>
                                                                              </div>
                                                                              </div>
                                                                          </div> 
                                                                    </div>
                                                                </div>
                                                                <!--===Logo Tab===-->
                                                                <div class="tab-pane p-20" id="search" role="tabpanel">2</div>
                                                                <!--===Search Tab===-->
                                                                <div class="tab-pane p-20" id="top_menu" role="tabpanel">3</div>
                                                                <!--===Top Menu Tab===-->
                                                                <div class="tab-pane p-20" id="app_menu" role="tabpanel">4</div>
                                                                <!--===App Menu Tab===-->
                                                                <div class="tab-pane p-20" id="srvice" role="tabpanel">5</div>
                                                                <!--===Service Menu Tab===-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row -->
                                    </div>
                                    <!--==========End Header Tab==========-->
                                    
                                    <div class="tab-pane  p-20" id="slider" role="tabpanel">
                                        <div class="row">
                                        <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-subtitle"></h6>
                                                <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-contact">Add Slider</button>
                                                <!-- Add Contact Popup Model -->
                                                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form class="form-horizontal form-material" method="POST" id="upload_form" enctype="multipart/form-data">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                    {{ csrf_field() }}
                                                                <div class="form-group">
                                                                <div class="col-md-12 m-b-20">
                                                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title"> </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <textarea class="form-control" name="desc" id="desc" placeholder="Description"></textarea> </div>
                                                                            <div class="col-lg-12 col-md-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <h4 class="card-title">Slider Upload</h4>
                                                                                        <input type="file" name="s_img" id="s_img" class="dropify" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="submit" name="submit" class="btn btn-info" value="Save"/>
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- slider edit Popup Model -->
                                                <div id="edit-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form class="form-horizontal form-material" method="POST" id="edit_upload_form" enctype="multipart/form-data">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                    {{ csrf_field() }}
                                                                <div class="form-group">
                                                                <div class="col-md-12 m-b-20">
                                                                    <input type="text" class="form-control" name="edit_title" id="edit_title" placeholder="Title"> </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <textarea class="form-control" name="edit_desc" id="edit_desc" placeholder="Description"></textarea> </div>
                                                                            <div class="col-lg-12 col-md-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <h4 class="card-title">Slider Upload</h4>
                                                                                        <div id="img_here"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="submit" name="submit" class="btn btn-info" value="Update"/>
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.end edit modal-dialog -->
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list" data-paging="true" data-paging-size="7">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Image</th>
                                                                        <th>Title</th>
                                                                        <th>Description</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
<?php $i=0; ?>
@foreach($slider as $s)
<tr>
    <td>{{++$i}}</td>
    <td><img src="{{URL('public/images/slider_img/'.$s->image)}}" alt="user" width="100" height="100" /></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
@endforeach
                                                                    
                                                                   
                                                                </tbody>
                                                            </table>
                                                            {{ csrf_field() }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Column -->
                                            </div>
                                        </div>
                                    </div>
                                    <!--==========End Slider Tab==========-->
                                    <!-- banner choose Popup Model -->
                                                <div id="banner-choose" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel"><span id="banner_modal_title">Choose Top Left Banner</span></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                                    <div class="modal-body" id="show_banner">
                                                                
                                                                    
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.end banner choose modal-dialog -->
                                                        </div>
                                    <div class="tab-pane p-20" id="banner" role="tabpanel">
                                          <!-- row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <!-- Nav tabs -->
                                                        <div class="vtabs">
                                                            <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#leftBanner" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-right"></i></span> <span class="hidden-xs-down">Left Banner</span> </a> </li>
                                                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#centerBanner" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-right"></i></span> <span class="hidden-xs-down">Center</span></a> </li>
                                                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#rightBanner" role="tab"><span class="hidden-sm-up"><i class="ti-hand-point-right"></i></span> <span class="hidden-xs-down">Right Banner</span></a> </li>
                                                            </ul>
                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="leftBanner" role="tabpanel">
                                                                    <div class="p-20">
                                                                       <form id="top_left_upload_form" enctype="multipart/form-data">
                                                                           {{ csrf_field() }}
                                                                           <input type="hidden" name="banner_section" id="banner_section" value="banner_top_left"/>
                                                                          <div class="form-group">
                                                                              <input type="file" id="img_top_left" name="img_top_left" class="form-control">
                                                                          </div>
                                                                          <div class="row">
                                                                          <div class="col-md-9">
                                                                            <div class="form-group">
                                                                              <input type="submit" name="submit" id="submit" class="btn btn-success form-control" value="Upload Top Left Banner"/>
                                                                             </div>
                                                                          </div>
                                                                        </form>  
                                                                          <div class="col-md-3">
                                                                            <div class="form-group">
                                                                              <button type="button" alt="default" id="choose_banner" data-verify="banner_top_left" data-toggle="modal" data-target="#banner-choose" title="Choose Top Left Banner" class="btn btn-primary form-control"><i class="ti-settings"></i></button>
                                                                             </div>
                                                                          </div>
                                                                          </div>
                                                                          
                                                                    </div>
                                                                    <div class="p-20">
                                                                       <form id="bottom_left_upload_form" enctype="multipart/form-data">
                                                                           {{ csrf_field() }}
                                                                           <input type="hidden" name="banner_section" id="banner_section" value="banner_bottom_left"/>
                                                                          <div class="form-group">
                                                                              <input type="file" id="img_top_left" name="img_top_left" class="form-control">
                                                                          </div> 
                                                                          <div class="row">
                                                                          <div class="col-md-9">
                                                                            <div class="form-group">
                                                                              <input type="submit" name="submit" id="submit" class="btn btn-success form-control" value="Upload Bottom Left Banner"/>
                                                                             </div>
                                                                          </div>
                                                                        </form>  
                                                                          <div class="col-md-3">
                                                                            <div class="form-group">
                                                                              <button type="button" alt="default" id="choose_banner" data-verify="banner_bottom_left" data-toggle="modal" data-target="#banner-choose" title="Choose Top Left Banner" class="btn btn-primary form-control"><i class="ti-settings"></i></button>
                                                                             </div>
                                                                          </div>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                                <!--===Logo Tab===-->
                                                                <div class="tab-pane p-20" id="centerBanner" role="tabpanel">
                                                                    <div class="p-20">
                                                                       <form id="center_upload_form" enctype="multipart/form-data">
                                                                           {{ csrf_field() }}
                                                                           <input type="hidden" name="banner_section" id="banner_section" value="banner_center"/>
                                                                          <div class="form-group">
                                                                              <input type="file" id="img_top_left" name="img_top_left" class="form-control">
                                                                          </div> 
                                                                          <div class="row">
                                                                          <div class="col-md-9">
                                                                            <div class="form-group">
                                                                              <input type="submit" name="submit" id="submit" class="btn btn-success form-control" value="Upload Center Banner"/>
                                                                             </div>
                                                                          </div>
                                                                        </form>  
                                                                          <div class="col-md-3">
                                                                            <div class="form-group">
                                                                              <button type="button" alt="default" id="choose_banner" data-verify="banner_center" data-toggle="modal" data-target="#banner-choose" title="Choose Top Left Banner" class="btn btn-primary form-control"><i class="ti-settings"></i></button>
                                                                             </div>
                                                                          </div>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                                <!--===Search Tab===-->
                                                                <div class="tab-pane p-20" id="rightBanner" role="tabpanel">
                                                                    <div class="p-20">
                                                                       <form id="top_right_upload_form" enctype="multipart/form-data">
                                                                           {{ csrf_field() }}
                                                                           <input type="hidden" name="banner_section" id="banner_section" value="banner_top_right"/>
                                                                          <div class="form-group">
                                                                              <input type="file" id="img_top_left" name="img_top_left" class="form-control">
                                                                          </div> 
                                                                          <div class="row">
                                                                          <div class="col-md-9">
                                                                            <div class="form-group">
                                                                              <input type="submit" name="submit" id="submit" class="btn btn-success form-control" value="Upload Top Right Banner"/>
                                                                             </div>
                                                                          </div>
                                                                        </form>  
                                                                          <div class="col-md-3">
                                                                            <div class="form-group">
                                                                              <button type="button" alt="default" id="choose_banner" data-verify="banner_top_right" data-toggle="modal" data-target="#banner-choose" title="Choose Top Left Banner" class="btn btn-primary form-control"><i class="ti-settings"></i></button>
                                                                             </div>
                                                                          </div>
                                                                          </div>
                                                                    </div>
                                                                    <div class="p-20">
                                                                       <form id="bottom_right_upload_form" enctype="multipart/form-data">
                                                                           {{ csrf_field() }}
                                                                           <input type="hidden" name="banner_section" id="banner_section" value="banner_bottom_right"/>
                                                                          <div class="form-group">
                                                                              <input type="file" id="img_top_left" name="img_top_left" class="form-control">
                                                                          </div> 
                                                                          <div class="row">
                                                                          <div class="col-md-9">
                                                                            <div class="form-group">
                                                                              <input type="submit" name="submit" id="submit" class="btn btn-success form-control" value="Upload Bottom Right Banner"/>
                                                                             </div>
                                                                          </div>
                                                                        </form>  
                                                                          <div class="col-md-3">
                                                                            <div class="form-group">
                                                                              <button type="button" alt="default" id="choose_banner" data-verify="banner_bottom_right" data-toggle="modal" data-target="#banner-choose" title="Choose Top Left Banner" class="btn btn-primary form-control"><i class="ti-settings"></i></button>
                                                                             </div>
                                                                          </div>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                                <!--===Top Menu Tab===-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row -->
                                    </div>
                                    <!--==========End Banner Tab==========-->
                                    <div class="tab-pane p-20" id="products" role="tabpanel">4</div>
                                    <!--==========End Products Tab==========-->
                                    <div class="tab-pane p-20" id="footer" role="tabpanel">5</div>
                                    <!--==========End Footer Tab==========-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sample modal content -->
                                <div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Choose Logo</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row el-element-overlay">
                                                    @foreach($tasks as $task)
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1">
                                    <img src="{{URL('public/images/logo_img/'.$task->image)}}" alt="user" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            @if($task->status == '1')
                                            <li>
                                                Actived
                                            </li>
                                            @else
                                            <li>
                                                <a class="btn default btn-outline" href="{{ URL('settings/change-logo/'.$task->setting_id) }}">
                                                Use
                                                </a>
                                            </li>
                                            <li>
                                                <a class="btn default btn-outline" href="{{ URL('settings/delete-logo/'.$task->setting_id) }}">
                                                Delete
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                                <!-- /.modal -->
@endsection
@section('extra-js')
<script src="{{URL('public/assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="{{URL('public/assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
@endsection
@section('script')

<script type="text/javascript">

$(document).ready(function() {
    //slider jquery start
        fetch_data();
        function fetch_data()
        {
            $.ajax({
               url:"/settings/slider-data",
               method: 'get',
               dataType: 'json',
               success:function(data)
               {
                var html = '';
               for(var i=0; i < data.length; i++)
                    {
                     html +='<tr>';
                     var a = i + 1;
                     html += '<td>'+a+'</td>';
                     html += '<td><a href="javascript:void(0)"><img src="{{URL("public/images/slider_img")}}/'+data[i].image+'" alt="user" width="40" class="img-circle" /></a></td>';
                     html += '<td>'+data[i].title+'</td>';
                     html += '<td>'+data[i].description+'</td>';
                     html += '<td><a href="#edit" id="'+data[i].setting_id+'" data-toggle="modal" data-target="#edit-contact" class="text-inverse p-r-10 edit" title="" data-original-title="Edit"><i class="ti-marker-alt"></i></a> <a href="#delete" id="'+data[i].setting_id+'" class="text-inverse delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a></td></tr>';
                    }
                    $('tbody').html(html);
                }
            });
        }
        
        var _token = $('input[name="_token"]').val();
        
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}
        });
        
         $('#upload_form').on('submit', function(e){
             e.preventDefault();
           $.ajax({
            url:"{{URL('/settings/slider-up')}}",
            method:"post",
            data:new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType:'JSON',
            success:function(data)
            {
            if(data.status == 'success')
            {
             Swal.fire({

                position: 'top-end',

                type: 'success',

                title: 'slider uploaded!',

                showConfirmButton: false,

                timer: 1500

            })
            $('#upload_form')[0].reset();
             fetch_data();
            }
            if(data.status == 'error')
            {
                Swal.fire({

                type: 'error',

                title: 'Oops...',

                text: 'slider not upload!',
                
                footer: ''
            })
            }
            }
           })
         });
         
         $(document).on('click', '.edit', function(e){
            e.preventDefault();
            var id = $(this).attr("id");
            $.ajax({
                url:"{{URL('/settings/slider-edit')}}",
                method:"get",
                data:{id:id},
                dataType: 'JSON',
                success:function(data)
                {
                 $('#edit_title').val(data.title);
                 $('#edit_desc').val(data.desc);
                 var html = '';
                 html += '<input type="hidden" name="id" id="id" value="'+id+'"/>';
                 html += '<input type="file" name="edit_s_img" id="edit_s_img" class="dropify" />';
                 $('#img_here').html(html);
                }
               })
         });
         
         $('#edit_upload_form').on('submit', function(e){
             e.preventDefault();
           $.ajax({
            url:"{{URL('/settings/slider-update')}}",
            method:"post",
            data:new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType:'JSON',
            success:function(data)
            {
            if(data.status == 'success')
            {
             Swal.fire({

                position: 'top-end',

                type: 'success',

                title: 'slider updated!',

                showConfirmButton: false,

                timer: 1500

            })
            $('#upload_form')[0].reset();
             fetch_data();
            }
            if(data.status == 'error')
            {
                Swal.fire({

                type: 'error',

                title: 'Oops...',

                text: 'slider not update!',
                
                footer: ''
            })
            }
            }
           })
         });
         
         $(document).on('click', '.delete', function(e){
             e.preventDefault();
             var id = $(this).attr("id");
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

                $.ajax({
                url:"{{URL('/settings/slider-delete')}}",
                method:"get",
                data:{id:id},
                success:function(data)
                {
                 Swal.fire({
    
                    position: 'top-end',
    
                    type: 'success',
    
                    title: 'slider removed!',
    
                    showConfirmButton: false,
    
                    timer: 1500
    
                })
                 fetch_data();
                }
               })

                }

            })
         });
        //slider jquery end
            
        //banner jquery start
        
        //#top left insert
        $('#top_left_upload_form').on('submit', function(e){
             e.preventDefault();
             var data_section = $(this).val('#data_section');
             alert(data_section);
           $.ajax({
            url:"/settings/bannertopleft-up",
            method:"post",
            data:new FormData(this),
            dataType:'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success:function(data)
            {
            if(data.status == 'success')
            {
             Swal.fire({

                position: 'top-end',

                type: 'success',

                title: 'banner top left uploaded!',

                showConfirmButton: false,

                timer: 1500

            })
            $('#img_top_left')[0].reset();
            }
            if(data.status == 'error')
            {
                Swal.fire({

                type: 'error',

                title: 'Oops...',

                text: 'banner top left not upload!',
                
                footer: ''
            })
            }
            }
           })
         });
         //#end top left insert
         //#bottom left insert
         $('#bottom_left_upload_form').on('submit', function(e){
             e.preventDefault();
             var data_section = $(this).val('#data_section');
             alert(data_section);
           $.ajax({
            url:"/settings/bannertopleft-up",
            method:"post",
            data:new FormData(this),
            dataType:'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success:function(data)
            {
            if(data.status == 'success')
            {
             Swal.fire({

                position: 'top-end',

                type: 'success',

                title: 'banner bottom left uploaded!',

                showConfirmButton: false,

                timer: 1500

            })
            $('#img_top_left')[0].reset();
            }
            if(data.status == 'error')
            {
                Swal.fire({

                type: 'error',

                title: 'Oops...',

                text: 'banner bottom left not upload!',
                
                footer: ''
            })
            }
            }
           })
         });
         //#end bottom left insert
         //#center insert
         $('#center_upload_form').on('submit', function(e){
             e.preventDefault();
           $.ajax({
            url:"/settings/bannertopleft-up",
            method:"post",
            data:new FormData(this),
            dataType:'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success:function(data)
            {
            if(data.status == 'success')
            {
             Swal.fire({

                position: 'top-end',

                type: 'success',

                title: 'banner center uploaded!',

                showConfirmButton: false,

                timer: 1500

            })
            $('#img_top_left')[0].reset();
            }
            if(data.status == 'error')
            {
                Swal.fire({

                type: 'error',

                title: 'Oops...',

                text: 'banner center not upload!',
                
                footer: ''
            })
            }
            }
           })
         });
         //#end center insert
         //#top right insert
         $('#top_right_upload_form').on('submit', function(e){
             e.preventDefault();
           $.ajax({
            url:"/settings/bannertopleft-up",
            method:"post",
            data:new FormData(this),
            dataType:'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success:function(data)
            {
            if(data.status == 'success')
            {
             Swal.fire({

                position: 'top-end',

                type: 'success',

                title: 'banner top right uploaded!',

                showConfirmButton: false,

                timer: 1500

            })
            $('#img_top_left')[0].reset();
            }
            if(data.status == 'error')
            {
                Swal.fire({

                type: 'error',

                title: 'Oops...',

                text: 'banner top right not upload!',
                
                footer: ''
            })
            }
            }
           })
         });
         //#end top right insert
         //#bottom right insert
         $('#bottom_right_upload_form').on('submit', function(e){
             e.preventDefault();
           $.ajax({
            url:"/settings/bannertopleft-up",
            method:"post",
            data:new FormData(this),
            dataType:'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success:function(data)
            {
            if(data.status == 'success')
            {
             Swal.fire({

                position: 'top-end',

                type: 'success',

                title: 'banner bottom right uploaded!',

                showConfirmButton: false,

                timer: 1500

            })
            $('#img_top_left')[0].reset();
            }
            if(data.status == 'error')
            {
                Swal.fire({

                type: 'error',

                title: 'Oops...',

                text: 'banner bottom right not upload!',
                
                footer: ''
            })
            }
            }
           })
         });
         //#end bottom right insert
        
        $(document).on('click', '#choose_banner', function(e){
            var verify = $(this).data('verify');
             e.preventDefault();
           $.ajax({
            url:"{{URL('/settings/banner-choose')}}",
            method:"get",
            data:{verify:verify},
            dataType:'JSON',
            success:function(data)
            {
            var html = '';
            for(var i=0; i < data.length; i++)
            {
                html += '<div class="row el-element-overlay">';
                html += '<div class="col-lg-6 col-md-6">';
                html += '<div class="card">';                                    
                html += '<div class="el-card-item">';
                html += '<div class="el-card-avatar el-overlay-1">';
                html += '<img src="{{URL("public/images/banner_img")}}/'+data[i].image+'" alt="user" />';
                html += '<div class="el-overlay">';
                html += '<ul class="el-info">';
                if(data[i].status > '0')
                {
                html += '<li>Actived</li>';
                }
                else{}
                if(data[i].status < '1')
                {
                html += '<li><a class="btn default btn-outline use_banner" data-check="'+data[i].type+'" id="'+data[i].setting_id+'" href="..">Use</a></li>';
                html += '<li><a class="btn default btn-outline banner_delete" id="'+data[i].setting_id+'" href="..">Delete</a></li>';
                }
                else{}
                html += '</ul>';
                html += '</div></div></div></div></div></div>';    
            }
            $('#show_banner').html(html);
            }
           })
         });
         
         $(document).on('click', '.use_banner', function(e){
            e.preventDefault();
            var id = $(this).attr("id");
            var check = $(this).data('check');
            $.ajax({
                url:"{{URL('/settings/banner-use')}}",
                method:"post",
                data:{id:id, check:check},
                dataType: 'JSON',
                success:function(data)
                {
                 Swal.fire({

                position: 'top-end',

                type: 'success',

                title: 'actived!',

                showConfirmButton: false,

                timer: 1500

            })
                }
               })
         });
         
         $(document).on('click', '.banner_delete', function(e){
             e.preventDefault();
             var id = $(this).attr("id");
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

                $.ajax({
                url:"{{URL('/settings/banner-delete')}}",
                method:"get",
                data:{id:id},
                success:function(data)
                {
                 Swal.fire({
    
                    position: 'top-end',
    
                    type: 'success',
    
                    title: 'banner removed!',
    
                    showConfirmButton: false,
    
                    timer: 1500
    
                })
                }
               })

                }

            })
         });
            
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

<?php
  $message=Session::get("error");

  if($message)
  {
    echo "
    Swal.fire({

                type: 'error',

                title: 'Oops...',

                text: '".$message."',
                
                footer: ''
            })
    ";
    Session::put("error",null);
  }
?>

<?php
  $message=Session::get("success");

  if($message)
  {
    echo "
    Swal.fire({

                position: 'top-end',

                type: 'success',

                title: '".$message."',

                showConfirmButton: false,

                timer: 1500

            })
    ";
    Session::put("success",null);
  }
?>
</script>
@endsection
