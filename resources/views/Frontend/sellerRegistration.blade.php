<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Include SmartWizard CSS -->
<link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard.css')}}" rel="stylesheet" type="text/css" />
<!-- Optional SmartWizard theme -->
<link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard_theme_circles.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::to('public/assets/smartwizard/dist/css/smart_wizard_theme_dots.css')}}" rel="stylesheet" type="text/css" />
<div class="container">

  <!-- SmartWizard 1 html -->
  <form action="{{route('save-seller-registration.post')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
    @csrf
      <div id="smartwizard">
    <ul>
      <li><a href="#step-1">Step 1<br /><small>Basic Information</small></a></li>
      <li><a href="#step-2">Step 2<br /><small>Address</small></a></li>
      <li><a href="#step-3">Step 3<br /><small>Image</small></a></li>
    </ul>
    <div>

      <div id="step-1" class="">
        <div class="card">
          <a href="{{route('seller-login')}}" class="btn btn-success btn-md">
            <i class="fa fa-hand-o-left"></i>&nbsp;
            login
          </a>
        </div>
        <section>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Full Name : <span class="danger">*</span> </label>
                <input type="text" class="form-control" id="name" name="name" value="" required=""> </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="wlastName2"> User Name : <span class="danger">*</span> </label>
                  <input type="text" class="form-control" id="user_name" name="user_name" value="" required=""> </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email"> Email : <span class="danger">*</span> </label>
                    <input type="email" class="form-control" id="email" name="email" value="" required=""> </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="mobile">Phone Number :</label>
                      <input type="tel" class="form-control" id="mobile" name="mobile" value="" required=""> </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="wlocation2"> Shop Name: <span class="danger">*</span> </label>
                        <input type="text" class="form-control" id="shop_name" name="shop_name" value="" required="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="wlocation2"> Password: <span class="danger">*</span> </label>
                        <input type="password" class="form-control" id="password" name="password" value="" required="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="wlocation2"> Confirm Password : <span class="danger">*</span> </label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required="">
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <div id="step-2" class="">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="wdate2">City :</label>
                      <input type="text" class="form-control" id="user_city" name="user_city" value="" required="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="wlocation2"> Zip Code : <span class="danger">*</span> </label>
                      <input type="text" class="form-control" id="user_zip" name="user_zip" value="" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="address">Address</label>
                      <textarea cols="4" rows="4" class="form-control" name="user_address" required=""></textarea>
                    </div>
                  </div>
                  
                </div>


                
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">I need custom collecting address?</label>
                </div>

                <div class="row" id="customAddress1">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="wdate2">Collecting City :</label>
                      <input type="text" id="collect_city" name="collect_city" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="wlocation2"> Zip Code : <span class="danger">*</span> </label>
                      <input type="text" id="collect_zip" name="collect_zip" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="row"  id="customAddress2">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="address">Address</label>
                      <textarea class="form-control" id="collect_address" name="collect_address" rows="5" required=""></textarea>
                    </div>
                  </div>
                  
                </div>
              </div>
              <div id="step-3" class="">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="wdate2">NID Front Side:</label>
                      <input type="file" class="form-control" id="nid_front" name="nid_front" value="" required="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="wlocation2"> NID Back Side: <span class="danger">*</span> </label>
                      <input type="file" class="form-control" id="nid_back" name="nid_back" value="" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="address">CheckBook Image :</label>
                      <input type="file" name="checkbook_image" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="address">Profile Image :</label>
                      <input type="file" name="profile_img" class="form-control" required="">
                    </div>
                  </div>
                  
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="address">Document Image :</label>
                      <input type="file" name="document_image" class="form-control" required="">
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
  </form>

        </div>
        <!-- Include jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include SmartWizard JavaScript source -->
        <script type="text/javascript" src="{{URL::to('public/assets/smartwizard/dist/js/jquery.smartWizard.min.js')}}"></script>
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

   <script type="text/javascript">
$(function() {
$('#city').on('keyup', function() {
var city = $(this).val();
$('#collect_city').val(city);
});
$('#zip').on('keyup', function() {
var zip = $(this).val();
$('#collect_zip').val(zip);
});
$('#address').on('keyup', function() {
var address = $(this).val();
$('#collect_address').val(address);
});

$(document).ready(function() {
$('#collect_city').attr('disabled', true);
$('#collect_zip').attr('disabled', true);
$('#collect_address').attr('disabled', true);
$('#customCheck1').change(function() {
var ch = this.checked;
if (ch) {
$('#collect_city').attr('disabled', false);
$('#collect_zip').attr('disabled', false);
$('#collect_address').attr('disabled', false);
} else {
$('#collect_city').attr('disabled', true);
$('#collect_zip').attr('disabled', true);
$('#collect_address').attr('disabled', true);
}
});
});
});
   </script>     