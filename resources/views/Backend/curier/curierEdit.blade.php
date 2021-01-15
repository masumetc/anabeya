@extends('Backend.app')
@section('extra-css')
<!-- Include SmartWizard CSS -->
    <link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard.css')}}" rel="stylesheet" type="text/css" />
    <!-- Optional SmartWizard theme -->
    <link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard_theme_circles.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard_theme_dots.css')}}" rel="stylesheet" type="text/css" />
    <style type="text/css">
      .btn-success {
        margin-top: -31px;
    }
    </style>
@endsection
@section('content-header')
 <!-- Content Header (Page header) -->
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Update Curier</h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Update Curier</li>
          </ol>
        </div>
      </div>
    </div>
    @endsection
    @section('main-content')
    <section class="content">
      <!-- Custom Tabs -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h4 class="box-title">
          <a href="{{route('curier.curier')}}" class="btn btn-success btn-md">
            <i class="fa fa-hand-o-left"></i>&nbsp;
            View Curier
          </a>
          </h4>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              @if($user)
              
              <form action="{{route('curier.update-curier-unit.post',$user->id)}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- SmartWizard html -->
                <div id="smartwizard">
                  <ul>
                    <li><a href="#step-1">Step 1<br /><small>Basic Information</small></a></li>
                    <li><a href="#step-2">Step 2<br /><small>Address Information</small></a></li>
                    <li><a href="#step-3">Step 3<br /><small>Curier Infromation</small></a></li>
                    <li><a href="#step-4">Step 4<br /><small>Curier Unit Infromation</small></a></li>
                  </ul>
                  <div>
                    <div id="step-1" class="">
                      <div class="card"></div>
                      <section>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Full Name : <span class="danger">*</span> </label>
                              <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"> </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="wlastName2"> User Name : <span class="danger">*</span> </label>
                                <input type="text" class="form-control" id="user_name" name="user_name" value="{{$user->user_name}}"> </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="email"> Email : <span class="danger">*</span> </label>
                                  <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"> </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="mobile">Phone Number :</label>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}"> </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="wlocation2"> Country : <span class="danger">*</span> </label>
                                      <input type="text" class="form-control" id="user_country" name="user_country" value="{{$user->user_country}}">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="wdate2">City :</label>
                                      <input type="text" class="form-control" id="user_city" name="user_city" value="{{$user->user_city}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="wlocation2"> Zip Code : <span class="danger">*</span> </label>
                                      <input type="number" class="form-control" id="user_zip" name="user_zip" value="{{$user->user_zip}}">
                                    </div>
                                  </div>
                                  <!-- <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="wlocation2"> Password : <span class="danger">*</span> </label>
                                      <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                  </div> -->
                                </div>
                              </section>
                            </div>
                            <div id="step-2" class="">
                              <div class="card"></div>
                              <section>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="user_address">Address :</label>
                                      <textarea name="user_address" id="user_address" rows="4" class="form-control">{{$user->user_address}}</textarea>
                                    </div>
                                  </div>

                                  <div class="col-md-12 ">
                                    <div class="form-group text-center">
                                      <img src="{{URL::to('public/images/users',$user->profile_img)}}" height="100px" width="200px">
                                    </div>
                                  </div>

                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="webUrl3">New Upload Image :</label>
                                      <input type="file" id="input-file-max-fs" name="profile_img" class="dropify" data-max-file-size="2M" />
                                    </div>
                                  </div>
                                </div>
                                </section>
                              </div>
                              
                              <div id="step-3" class="">
                              <div class="card"></div>
                              <section>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="wlocation2">Curier Name: <span class="danger">*</span> </label>
                                        <input type="text" class="form-control" id="c_name" name="c_name" value="{{$user->curier->name}}">
                                      </div>
                                    </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="decisions1">Tracking Site :</label>
                                        <input type="tex" name="default_link" class="form-control" value="{{$user->curier->default_link}}">
                                      </div>
                                    </div>
                                </div>
                                </section>
                              </div>
                              
                              <div id="step-4" class="">
                              <div class="card"></div>
                              <section>
                                <div class="row">
                                  @if($user->curierUnits)
                                  @foreach($user->curierUnits as $key=>$curierUnit)
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="curier_unit"> Unit : <span class="danger"></span> </label>
                                        <select  class=" form-control" id="curier_unit" name="curierUnit[{{$key}}][curier_unit]">
                                          <option selected="" disabled="">Select One</option>
                                          <option value="1" @if($curierUnit->curier_unit == 1) selected="" @endif>1-Small</option>
                                          <option value="2" @if($curierUnit->curier_unit == 2) selected=''@endif>2-Medium</option>
                                          <option value="3" @if($curierUnit->curier_unit == 3) selected=''@endif>3-Large</option>
                                          <input type="hidden" name="curierUnit[{{$key}}][curier_unit_id]" value="{{$curierUnit->curier_unit_id}}">
                                        </select>
                                      </div>
                                    </div>

                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="unit_charge">Unit Amount :</label>
                                        <input type="number" class="form-control" id="unit_charge" name="curierUnit[{{$key}}][unit_charge]" value="{{$curierUnit->unit_charge}}">
                                      </div>
                                    </div>
                                  @endforeach
                                  @endif
                                </div>
                                </section>
                              </div>

                            </div>
                          </div>
                        </form>

                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <!-- nav-tabs-custom -->
              </section>
              @endsection
              @section('extra-js')
              <!-- Include SmartWizard JavaScript source -->
              <script type="text/javascript" src="{{URL::to('public/assets/smartwizard/dist/js/jquery.smartWizard.min.js')}}"></script>
              @endsection
              @section('script')

<script type="text/javascript">
$(document).ready(function(){

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               //alert("You are on step "+stepNumber+" now");
               if(stepPosition === 'first'){
                   $("#prev-btn").addClass('disabled');
               }else if(stepPosition === 'final'){
                   $("#next-btn").addClass('disabled');
               }else{
                   $("#prev-btn").removeClass('disabled');
                   $("#next-btn").removeClass('disabled');
               }
            });

            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                                             .addClass('btn btn-info')
                                             .on('click', function(){ alert('Finish Clicked'); });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function(){ $('#smartwizard').smartWizard("reset"); });

            // Please note enabling option "showStepURLhash" will make navigation conflict for multiple wizard in a page.
            // so that option is disabling => showStepURLhash: false

            // Smart Wizard 1
            $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transitionEffect:'fade',
                    showStepURLhash: false,
                    toolbarSettings: {toolbarPosition: 'both',
                                      toolbarExtraButtons: [btnFinish, btnCancel]
                                    }
            });

            // Smart Wizard 2
            $('#smartwizard2').smartWizard({
                    selected: 0,
                    theme: 'default',
                    transitionEffect:'fade',
                    showStepURLhash: false
            });

        });
</script>
@endsection
