@extends('Backend.app')
@section('extra-css')
@endsection
@section('content-header')
<!-- Content Header (Page header) -->
<div class="page-wrapper">
<div class="container-fluid">
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h4 class="text-themecolor">All Curier</h4>
</div>
<div class="col-md-7 align-self-center text-right">
<div class="d-flex justify-content-end align-items-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<li class="breadcrumb-item active">All Curier</li>
</ol>
<button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
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
<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">View Currier</span></a> </li>
<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#curier" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Add Currier</span></a> </li>
<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Currier Profile</span></a> </li>

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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Image</th>
                            <th>City</th>
                            <th>Curier Name</th>
                            <th>Unit</th>
                            <th>Curier Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Image</th>
                            <th>City</th>
                            <th>Curier Name</th>
                            <th>Unit</th>
                            <th>Curier Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @if(count($curiers) > 0)
                            @foreach($curiers as $key=>$curier)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>
                                    <span>{{$curier->user->name}}</span>
                                    
                                </td>
                                <td>
                                    {{$curier->user->email}}
                                </td>
                                <td>
                                    <span>{{$curier->user->mobile}}</span>
                                </td>
                                <td>
                                    <img src="{{URL::to('public/images/users',$curier->user->profile_img)}}" height="50px" width="60px">
                                </td>
                                    <td>
                                        <span>{{$curier->user->user_city}}</span>
                                        
                                    </td>
                                    <td>
                                        <span>{{$curier->name}}</span>
                                        
                                    </td>
                                    <td>
                                        <span>{{$curier->unit}}</span>
                                        
                                    </td>
                                    <td>
                                        <span>{{$curier->charge}}</span>
                                        
                                    </td>
                                    <td>
                                            <label class="label label-warning" style="@if($curier->status==1) display: none; @endif">
                                                Inactive
                                            </label>
                                            <label class="label label-success" style="@if($curier->status==0) display: none; @endif">
                                                active
                                            </label>
                                        </td>
                                    <td>
                                        <a href="javascript:;" class="btn btn-success btn-xs" style="@if($curier->status == 1) display:none; @endif" onclick="updateStatus('curier', 'active', {{$curier->curier_id}})">
                                                <i class="fa fa-edit" title="Active"></i> 
                                            </a>
                                            <a href="javascript:;" class="btn btn-warning btn-xs" style="@if($curier->status == 0) display:none; @endif" onclick="updateStatus('curier', 'inactive', {{$curier->curier_id}})">
                                                <i class="far fa-edit" title="Inactive"></i>  
                                            </a>
                                        <a href="{{URL::to('curier/curier-edit')}}/{{$curier->curier_id}}" class="btn btn-info btn-xs edit-curier" id="reference_{{$curier->curier_id}}">
                                            <i class="far fa-edit" title="Edit"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-success btn-xs save-update-curier" id="reference_" style="display: none;">
                                            <i class="fa fa-save" title="Save"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-primary btn-xs reset" id="reference_" style="display: none;">
                                            <i class="fa fa-save" title="Reset"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-danger btn-xs" style="@if($curier->status == 2) display: none;@endif" onclick="updateStatus('curier', 'delete', {{$curier->curier_id}})">
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
<div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <h6 class="card-subtitle"></h6>
                                <form action="{{route('curier.save-curier.post')}}" enctype="multipart/form-data" id="myForm" method="post" class="validation-wizard wizard-circle">
                                    @csrf
                                    <!-- Step 1 -->
                                    <h6>Basic Information</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Full Name : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control" id="name" name="name"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2"> User Name : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control" id="user_name" name="user_name"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> Email : <span class="danger">*</span> </label>
                                                    <input type="email" class="form-control" id="email" name="email"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mobile">Phone Number :</label>
                                                    <input type="tel" class="form-control" id="mobile" name="mobile"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2"> Country : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control" id="user_country" name="user_country">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wdate2">City :</label>
                                                    <input type="text" class="form-control" id="user_city" name="user_city">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2"> Zip Code : <span class="danger">*</span> </label>
                                                    <input type="number" class="form-control" id="user_zip" name="user_zip">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2"> Password : <span class="danger">*</span> </label>
                                                    <input type="password" class="form-control" id="password" name="password">
                                                </div>
                                            </div>
                                    </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Address</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="user_address">Address :</label>
                                                    <textarea name="user_address" id="user_address" rows="4" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="webUrl3">Upload Image :</label>
                                                    <input type="file" id="input-file-max-fs" name="profile_img" class="dropify" data-max-file-size="2M" />
                                            </div>
                                            
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Curier Information</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2"> Name: <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control" id="c_name" name="c_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="unit"> Unit : <span class="danger"></span> </label>
                                                    <select  class=" form-control required" id="unit" name="unit" data-placeholder="Type to search cities">
                                                    <option selected="" disabled="">Select One</option>
                                                    <option value="1">1-Unit</option>
                                                    <option value="2">2-Unit</option>
                                                    <option value="3">3-Unit</option>
                                                    <option value="4">4-Unit</option>
                                                    <option value="5">5-Unit</option>
                                                    <option value="6">6-Unit</option>
                                                    <option value="7">7-Unit</option>
                                                    <option value="8">8-Unit</option>
                                                    <option value="9">9-Unit</option>
                                                    <option value="10">10-Unit</option>   
                                                    </select>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="charge">Unit Amount :</label>
                                                    <input type="number" class="form-control" id="charge" name="charge">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="decisions1">Tracking Site :</label>
                                                    <input type="tex" name="default_link" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<div class="tab-pane p-20" id="messages" role="tabpanel">3</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@section('extra-js')
@endsection
@section('script')
<script type="text/javascript">

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
                    $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                }
            },
            error: function(data){
                    $(".box-body-second").show();
                    $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                }
        });
  }
</script>
@endsection