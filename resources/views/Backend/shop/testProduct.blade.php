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
<h4 class="text-themecolor">Product</h4>
</div>
<div class="col-md-7 align-self-center text-right">
<div class="d-flex justify-content-end align-items-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<li class="breadcrumb-item active">Product</li>
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
<h4 class="card-title"></h4>
<h6 class="card-subtitle"></h6>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">View Product</span></a> </li>
<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#curier" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Add Product</span></a> </li>
<!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Currier Profile</span></a> </li> -->

</ul>
<!-- Tab panes -->
<div class="tab-content tabcontent-border">
<div class="tab-pane active" id="home" role="tabpanel">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <h6 class="card-subtitle"></h6>
                <div class="table-responsive">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th>#SL</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>User Role</th>
                            <th>User Name</th>
                            <th>Weight</th>
                            <th>Product Image</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Stock</th>
                            <th>Regular Price</th>
                            <th>Discount Price</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#SL</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>User Role</th>
                            <th>User Name</th>
                            <th>Weight</th>
                            <th>Product Image</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Stock</th>
                            <th>Regular Price</th>
                            <th>Discount Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                           
                            <tr>
                              @if(count($products) > 0)
                              @foreach($products as $key=>$product)
                                <!-- <td>{{++$key}}</td> -->
                                <td>{{$product->product_id}}</td>
                                <td>
                                    <span>{{$product->category->name}}</span>
                                </td>
                                <td>
                                    {{$product->brand->name}}
                                </td>
                                <td>
                                    <span>{{$product->user->role}}</span>
                                </td>
                                <td>
                                    <span>{{$product->user->name}}</span>
                                </td>
                                <td>
                                    <span>{{$product->weight}}</span>
                                </td>

                                <td>
                                  @foreach($product->productImages as $key=>$productImage)
                                  @if($key==0)
                                    <img src="{{url('public/images/product/',$productImage->image)}}" height="50px" width="60px">
                                    @endif  
                                    @endforeach()
                                </td>

                                    
                                    <td>
                                      @foreach($product->productCharts as $key=>$productChart)
                                      @if($key==0)
                                        <span>{{$productChart->color}}</span>
                                      @endif
                                      @endforeach
                                    </td>
                                    <td>
                                      @foreach($product->productCharts as $key=>$productChart)
                                      @if($key==0)
                                        <span>{{$productChart->size}}</span>
                                      @endif
                                      @endforeach 
                                    </td>
                                    <td>
                                      @foreach($product->productCharts as $key=>$productChart)
                                      @if($key==0)
                                        <span>{{$productChart->stock}}</span>
                                      @endif
                                      @endforeach 
                                    </td>
                                    <td>
                                        @foreach($product->productCharts as $key=>$productChart)
                                      @if($key==0)
                                        <span>{{$productChart->regular_price}}</span>
                                      @endif
                                      @endforeach
                                        
                                    </td>
                                    <td>
                                        @foreach($product->productCharts as $key=>$productChart)
                                        @if($key==0)
                                        <span>{{$productChart->discount_price}}</span>
                                      @endif
                                      @endforeach
                                    </td>
                                           <td>
                                            <label class="label label-warning" style="@if($product->status==1) display: none; @endif">
                                                Inactive
                                            </label>
                                            <label class="label label-success" style="@if($product->status==0) display: none; @endif">
                                                active
                                            </label>
                                        </td>
                                       <td>
                                        
                                          <a href="javascript:;" class="btn btn-dark btn-xs" style="@if($product->status == 1) display:none; @endif" onclick="updateStatus('product', 'active', {{$product->product_id}})">
                                                <i class="fa fa-edit" title="Active"></i> 
                                            </a>
                                            <a href="javascript:;" class="btn btn-warning btn-xs" style="@if($product->status == 0) display:none; @endif" onclick="updateStatus('product', 'inactive', {{$product->product_id}})">
                                                <i class="far fa-edit" title="Inactive"></i>  
                                            </a>
  
                                        <a href="{{url('product/product-edit',$product->product_id)}}" class="btn btn-info btn-xs edit-product" id="reference_{{$product->product_id}}">
                                            <i class="far fa-edit" title="Edit"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-success btn-xs save-update-product" id="reference_" style="display: none;">
                                            <i class="fa fa-save" title="Save"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-primary btn-xs reset" id="reference_" style="display: none;">
                                            <i class="fa fa-save" title="Reset"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-danger btn-xs" style="@if($product->status == 2) display: none;@endif" onclick="updateStatus('product', 'delete', {{$product->product_id}})">
                                                    <i class="fa fa-trash" title="Delete"></i>  
                                                </a>
                                    </td>
                                </tr> 
                              @endforeach
                              @endif  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="tab-pane  p-20" id="curier" role="tabpanel">
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
            <div class="col-md-12">
              <form action="{{route('product.save-product.post')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- SmartWizard html -->
                <div id="smartwizard">
                  <ul>
                    <li><a href="#step-1">Step 1<br /><small>Product Information</small></a></li>
                    <li><a href="#step-2">Step 2<br /><small>Product Image</small></a></li>
                    <li><a href="#step-3">Step 3<br /><small>Product Item</small></a></li>
                  </ul>
                  <div>
                    <div id="step-1" class="">
                      <div class="card"></div>
                      <section>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Category : <span class="danger">*</span> </label>
                              {{ Form::select('category_id',$categories,null, ['class' => 'form-control', 'id' => 'category_id']) }}
                            </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                              <label for="name">Brand : <span class="danger"></span> </label>
                              {{ Form::select('brand_id',$brands,null, ['class' => 'form-control', 'id' => 'brand_id']) }}
                            </div>
                              </div>

                            </div>


                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="title"> Product Title : <span class="danger">*</span> </label>
                                  <input type="text" class="form-control" id="title" name="title" value=""> </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="weight">Weight : <span class="danger">*</span> </label>
                                    <input type="number" class="form-control" id="weight" name="weight" value=""> </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="wlocation2"> CM : <span class="danger"></span> </label>
                                      <input type="number" class="form-control" id="cm" name="cm" value="">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="wdate2">Cupon Check :</label>
                                      <input type="text" class="form-control" id="cupon_check" name="cupon_check" value="">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="wlocation2"> What In Box : <span class="danger">*</span> </label>
                                      <textarea name="what_in_box" class="form-control" rows="4"></textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="wlocation2"> Description : <span class="danger">*</span> </label>
                                      <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                                    </div>
                                  </div>
                                </div>
                              </section>
                            </div>

                            <div id="step-2" class="">
                              <div class="card"></div>
                              <section>
                                <div class="row">
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label for="user_address">Image Title :</label>
                                      <textarea name="name[]" class="form-control" rows="9"></textarea>
                                    </div>
                                  </div>
                                  
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label for="image">Upload Image :</label>
                                      <input type="file" id="input-file-min-fs" name="image[]" class="dropify" data-max-file-size="2M" />
                                    </div>
                                  </div>

                                  <div class="col-md-2">
                                    <a href="javascript:;" class="btn waves-effect waves-light btn-rounded btn-primary btn-add-image" title="Add More Image">Add More</a>
                                  </div>
                              </div>
                              <!-- Dynamic load image End-->
                              <div class="load-dynamic-image-content">    </div>
                              <!-- Dynamic load image End-->
                                </section>
                              </div>
                              <div id="step-3" class="">
                                <div class="card"></div>
                                <section>
                                  <div class="row">
                                    
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="unit"> Color : <span class="danger"></span> </label>
                                        <input type="text" class="form-control" id="color" name="color[]" value="">
                                      </div>
                                    </div>

                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="wlocation2"> Color Image: <span class="danger">*</span> </label>
                                    
                                          <input name="files[]" class="form-control" type="file" id="post_image">
                                       
                                          <!-- <img src="" id="post_img_show" height="50px" width="60px"/> -->

                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                    <a href="javascript:;" class="btn waves-effect waves-light btn-rounded btn-primary btn-add-product-item" title="Add More Product Item">Add More</a>
                                  </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="charge">Size :</label>
                                        <input type="text" class="form-control" id="size" name="size[]" value="">
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="decisions1">Stock:</label>
                                        <input type="number" name="stock[]" id="stock" class="form-control" value="">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="charge">Regular Price :</label>
                                        <input type="text" class="form-control" id="regular_price" name="regular_price[]" value="">
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="discount_price">Discount Price:</label>
                                        <input type="number" name="discount_price[]" id="discount_price" class="form-control" value="">
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Dynamic load Product item End-->
                                <div class="load-dynamic-product-item-content">    </div>
                              <!-- Dynamic load Product item End-->
                                </section>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- nav-tabs-custom -->
              </section>
</div>

</div>
</div>
</div>
</div>
</div>
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


    function updateStatus(modelReference,action,id)
    {
        var reference = $("#reference_" + id);
        if(action == 'delete'){
            if(!confirm("Do you Want to delete ??")){
                return false;
            }
        }
        $.ajax({
            url: "update-status/"+modelReference+"/"+action+"/"+id,
            Type: "GET",
            dataType: "json",
            success: function(data){
                // console.log(data);
                // return false;
                if(data.success == true){
                    if(action == 'active'){
                        reference.prev().show().prev().hide();
                        reference.parent().prev().children().next().show().prev().hide();
                    }else if(action == 'inactive'){
                        reference.prev().hide().prev().show();
                        reference.parent().prev().children().next().hide().prev().show();
                    }else if(action == 'delete'){
                        reference.parent().parent().hide(1000).remove();
                    }
                    $(".box-body-second").show();
                    $(".messageBodySuccess").fadeIn().delay(1000).fadeOut().children().next().html(data.message);
                }else {
                    $(".box-body-second").show();
                    $(".messageBodyError").fadeIn().delay(1000).fadeOut().children().next().html(data.message);
                }
            },
            error: function(data){
                    $(".box-body-second").show();
                    $(".messageBodyError").fadeIn().delay(1000).fadeOut().children().next().html(data.message);
                }
        });
  }

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
                                       
                                          // '<img src="" id="post_img_show" height="50px" width="60px"/>'+

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
                                        '<label for="discount_price">Discount Price:</label>'+
                                        '<input type="number" name="discount_price[]" id="discount_price" class="form-control" value="">'+
                                      '</div>'+
                                    '</div>'+
                                  '</div>'+
                                  '</div>';
             $(".load-dynamic-product-item-content").append(content);
             $(".btn-remove-product-item").on('click', function(){
                $(this).parent().parent().parent().remove();
              });                      
   });     

</script>
@endsection