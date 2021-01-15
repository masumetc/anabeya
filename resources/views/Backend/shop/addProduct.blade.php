@extends('Backend.app')
@section('extra-css')
<!-- Include SmartWizard CSS -->
    <link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard.css')}}" rel="stylesheet" type="text/css" />
    <!-- Optional SmartWizard theme -->
    <link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard_theme_circles.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard_theme_dots.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{URL::to('public/assets/node_modules/html5-editor/bootstrap-wysihtml5.css')}}" />
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
<h4 class="text-themecolor">Add Product</h4>
</div>
<div class="col-md-7 align-self-center text-right">
<div class="d-flex justify-content-end align-items-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<li class="breadcrumb-item active">Add Product</li>
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
            <div class="col-md-12">
              <form action="{{route('product.save-product.post')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data" class="userForm">
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
                              {{ Form::select('category_id',$categories,null, ['class' => 'form-control', 'id' => 'category_id','required' => '']) }}
                            </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                              <label for="name">Brand : <span class="danger">*</span> </label>
                              {{ Form::select('brand_id',$brands,null, ['class' => 'form-control', 'id' => 'brand_id','required' => '']) }}
                            </div>
                              </div>

                            </div>

                            <!--<div class="row">-->
                              
                            <!--  </div>-->
                              
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="title"> Product Title : <span class="danger">*</span> </label>
                                  <input type="text" class="form-control" id="title" name="title" value="" required=""/> </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="weight">Weight : <span class="danger"></span> </label>
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
                                  <label for="title"> Curier Unit : <span class="danger">*</span> </label>
                                   <select class="form-control" name="curier_unit" id="curier_unit" required="">
                                     <option selected="" disabled="">Please Select a Unit</option>
                                     <option value="1">Small</option>
                                     <option value="2">Medium</option>
                                     <option value="3">Large</option>
                                   </select>
                                </div>                                
                                </div>
                                  <!--<div class="col-md-6">-->
                                  <!--  <div class="form-group">-->
                                  <!--    <label for="wdate2">Cupon Check :</label>-->
                                  <!--    <input type="text" class="form-control" id="cupon_check" name="cupon_check" value="">-->
                                  <!--  </div>-->
                                  <!--</div>-->
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="wlocation2"> What In Box : <span class="danger"></span> </label>
                                      <textarea name="what_in_box" class="form-control" rows="20"></textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="wlocation2"> Description : <span class="danger">*</span> </label>
                                      <textarea name="description" id="mymce" class="form-control" required=""></textarea>
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
                                      <label for="image">Upload Image :<span class="danger">*</span></label>
                                      <input type="file" id="input-file-min-fs" name="image[]" class="dropify" data-max-file-size="2M" required="" />
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
                                        <label for="charge">Size :</label><br>
                                        <!-- <input type="text" class="form-control" id="size" name="size[]" value="" multiple tabindex="4">
                                        <p style="color: red;">Enter multiple size separated by a comma ( , ) </p> -->
                                        <input type="text" data-role="tagsinput" placeholder="Add multiple Size" class="form-control" id="size" name="size[]" value="" />
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="decisions1">Stock:<span class="danger">*</span></label>
                                        <input type="number" name="stock[]" id="stock" class="form-control" value="" required="">
                                      </div>
                                    </div>
                                  </div>

                                  <!--<div class="row">-->
                                  <!--  <div class="col-md-5">-->
                                  <!--    <div class="form-group">-->
                                  <!--      <label for="charge">Regular Price :</label>-->
                                  <!--      <input type="text" class="form-control" id="regular_price" name="regular_price[]" value="">-->
                                  <!--    </div>-->
                                  <!--  </div>-->
                                  <!--  <div class="col-md-5">-->
                                  <!--    <div class="form-group">-->
                                  <!--      <label for="discount_price">Discount Price:</label>-->
                                  <!--      <input type="number" name="discount_price[]" id="discount_price" class="form-control" value="">-->
                                  <!--    </div>-->
                                  <!--  </div>-->
                                  <!--</div>-->
                                     <div class="row">
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="charge">Regular Price :<span class="danger">*</span></label>
                                        <input type="text" class="form-control" id="regular_price" name="regular_price[]" value="" required="">
                                      </div>
                                    </div>

                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="discount_price">Commission (%):</label>
                                        <input type="number" name="commission[]" id="commission" class="form-control product_commission" value="">
                                      </div>
                                    </div>
                                  </div>

                                  <!-- <div class="row">
                                    <div class="col-md-5">
                                      <div class="form-group">
                                        <label for="discount_price">Discount Price:</label>
                                        <input type="number" name="discount_price[]" id="discount_price" class="form-control product_discount_price" value="">
                                      </div>
                                    </div>
                                  </div> -->
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
  
@endsection
@section('extra-js')
<!-- Include SmartWizard JavaScript source -->
<script type="text/javascript" src="{{URL::to('public/assets/smartwizard/dist/js/jquery.smartWizard.min.js')}}"></script>
<!-- wysuhtml5 Plugin JavaScript -->
<script src="{{URL::to('public/assets/node_modules/tinymce/tinymce.min.js')}}"></script>
@endsection
@section('script')


<script>
    $(document).ready(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
    });
    </script>

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
<script type="text/javascript">
  $(document).ready(function(){
     //Custom validation Rules
    //alphaspace allowed
    $('.userForm').validate({
      onkeyup: false,   
      rules: {
        Category: {
          required: true
        },
        Brand: {
          required: true
        },
        Product Title: {
          required: true
        },
        Curier Unit: {
          required: true
        },
        Description: {
          required: true
        },
        Upload Image: {
          required: true
        },
        Stock: {
          required: true
        },
        Regular Price: {
          required: true
        },
      },
        // submitHandler: function(form) {
        //   form.submit();
        // }
    });
    });
</script>
@endsection