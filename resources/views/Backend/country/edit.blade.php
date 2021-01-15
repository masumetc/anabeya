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
                    <h4 class="text-themecolor">Edit Currency</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Edit Currency</li>
                        </ol>
                        <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> -->
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
                                <!-- <a href="" class="btn btn-success btn-md">
                                  <i class="fa fa-hand-o-left"></i>&nbsp;
                                  View Product
                                </a> -->
                            </h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{session('success')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{session('error')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                        <form action="{{route('currency.update', $currency->id)}}"  role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <!-- SmartWizard html -->
                                            <div class="row">
                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="currency_name">Currency name :</label>
                                                        <input type="text" class="form-control border-primary @error('currency_name') is-invalid @enderror" name="currency_name" value="{{$currency->currency_name}}">
                                                        @error('currency_name')
                                                        <span style="color: red;">
                                                        <strong>{{ $message }}</strong>
                                                 </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="taka">1 Dollar :</label>
                                                        <input type="text" disabled class="form-control border-primary @error('taka') is-invalid @enderror"  name="taka" value="{{$currency->taka}}">
                                                        @error('taka')
                                                        <span style="color: red;">
                                                        <strong>{{ $message }}</strong>
                                                 </span>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="symbol">Currency Symbol :</label>
                                                        <input type="text" class="form-control border-primary @error('symbol') is-invalid @enderror" name="symbol" value="{{$currency->symbol}}">
                                                        @error('symbol')
                                                        <span style="color: red;">
                                                        <strong>{{ $message }}</strong>
                                                 </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="rate">Exchange Rate :</label>
                                                        <input type="text" class="form-control border-primary @error('rate') is-invalid @enderror" name="rate" value="{{$currency->rate}}">
                                                        @error('rate')
                                                        <span style="color: red;">
                                                        <strong>{{ $message }}</strong>
                                                 </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn-btn btn-success">Update</button>
                                        </form>
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
                            .on('click', function(){ alert('Are You Ready to Submit the form??'); });
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

                    //Add more image
                    $(".btn-add-image").on('click',function() {
                        var content =    '<div class="row">'+
                            '<div class="col-md-5">'+
                            '<div class="form-group">'+
                            '<label for="user_address">Image Title :</label>'+
                            '<textarea name="name[]" class="form-control" rows="3"></textarea>'+
                            '</div>'+
                            '</div>'+

                            '<div class="col-md-5">'+
                            '<div class="form-group">'+
                            '<label for="image">Upload Image :</label>'+
                            '<input type="file" id="input-file-min-fs" name="image[]" class="dropify form-control" data-max-file-size="2M" />'+
                            '</div>'+
                            '</div>'+

                            '<div class="col-md-2">'+
                            '<a href="javascript:;" class="btn waves-effect waves-light btn-rounded btn-danger btn-remove-image" title="Add More Image">Remove</a>'+
                            '</div>'+
                            '</div>';
                        $(".load-dynamic-image-content").append(content);
                        $(".btn-remove-image").on('click', function(){
                            $(this).parent().parent().remove();
                        });
                    });

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $('#post_img_show').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $("#post_image").change(function(){
                        readURL(this);
                    });

                    $(".btn-add-product-item").on('click',function(){
                        var content =    '<div>'+
                            '<div class="row">'+
                            '<div class="col-md-5">'+
                            '<div class="form-group">'+
                            '<label for="unit"> Color : <span class="danger"></span> </label>'+
                            '<input type="text" class="form-control" id="color" name="color[]" value="">'+
                            '</div>'+
                            '</div>'+

                            '<div class="col-md-5">'+
                            '<div class="form-group">'+
                            '<label for="wlocation2"> Color Image: <span class="danger">*</span> </label>'+

                            '<input name="files[]" class="form-control" type="file" id="post_image">'+
                            '</div>'+
                            '</div>'+

                            '<div class="col-md-2">'+
                            '<a href="javascript:;" class="btn waves-effect waves-light btn-rounded btn-danger btn-remove-product-item" title="Remove Product Item">Remove</a>'+
                            '</div>'+

                            '</div>'+

                            '<div class="row">'+
                            '<div class="col-md-5">'+
                            '<div class="form-group">'+
                            '<label for="charge">Size :</label>'+
                            '<input type="text" class="form-control" id="size" name="size[]" value="">'+
                            '</div>'+
                            '</div>'+
                            '<div class="col-md-5">'+
                            '<div class="form-group">'+
                            '<label for="decisions1">Stock:</label>'+
                            '<input type="number" name="stock[]" id="stock" class="form-control" value="">'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row">'+
                            '<div class="col-md-5">'+
                            '<div class="form-group">'+
                            '<label for="charge">Regular Price :</label>'+
                            '<input type="text" class="form-control" id="regular_price" name="regular_price[]" value="">'+
                            '</div>'+
                            '</div>'+

                            '<div class="col-md-5">'+
                            '<div class="form-group">'+
                            '<label for="discount_price">Commission (%):</label>'+
                            '<input type="number" name="commission[]" id="commission" class="form-control product_commission" value="">'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>';
                        $(".load-dynamic-product-item-content").append(content);
                        $(".btn-remove-product-item").on('click', function(){
                            $(this).parent().parent().parent().remove();
                        });
                    });

                    // //Commission
                    // $(".product_commission").on('keyup', function(){
                    //    var productCommission = $("#commission").val();
                    //    var regularPrice = $("#regular_price").val();

                    //    if(!regularPrice){
                    //       return false;
                    //    }else {
                    //       var commission = (regularPrice * productCommission)/100;
                    //       var discountPrice = regularPrice - commission;
                    //       $(".product_discount_price").val(discountPrice);
                    //    }
                    // });
                </script>
@endsection
