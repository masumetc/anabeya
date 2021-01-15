@extends('Backend.app')
@section('extra-css')
@endsection
@section('content-header')
<!-- Content Header (Page header) -->

<style>
    .p_title{
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
    }
</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Product</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
        @endsection
        @section('main-content')
        <div class="row">
            <!-- Column -->
            @if(count($products) > 0)
            @foreach($products as $key=>$product)
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="product-img">
                            <img style="height:150px;width:100%" src="{{URL::to('public/images/product',$product->image)}}">
                            <div class="pro-img-overlay">
                                @if(Auth::user()->role == 'seller' || Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
                                
                                <a href="javascript:void(0)" class="bg-warning" style="@if($product->status == 1) display:none; @endif" onclick="updateStatus('product', 'active', {{$product->product_id}})">
                                    <i class="ti-unlock" title="Active"></i>
                                </a>
                            
                                <a href="javascript:void(0)" class="bg-warning" style="@if($product->status == 0) display:none; @endif" onclick="updateStatus('product', 'inactive', {{$product->product_id}})">
                                    <i class="ti-lock" title="Inactive"></i>
                                </a>
                                @endif
                                
                                @if(Auth::user()->role == 'seller' || Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin')
                                <a href="{{URL::to('product/product-edit',$product->product_id)}}" style="display: show;" class="bg-info" id="reference_{{$product->product_id}}"><i class="ti-marker-alt" title="Edit"></i></a>
                                @endif
        
                                <a data-toggle="modal" class="bg-primary" onclick="loadModalEdit('product/product-view-details','{{$product->product_id}}')" href="#modal" style="display: show;"><i class="ti-eye" title="View"></i></a>
                                
                                <a href="javascript:;" class="btn btn-success btn-xs save-update-category" id="" style="display: none;">
                                <i class="fa fa-save" title="Save"></i>
                                </a>
                                
                                @if(Auth::user()->role == 'superadmin')    
                                <a href="javascript:void(0)" class="bg-danger" style="@if($product->status == 2) display: none;@endif" onclick="updateStatus('product', 'delete', {{$product->product_id}})"><i class="ti-trash" title="Delete"></i>
                                </a>
                                @endif

                            </div>
                        </div>
                        <div class="product-text">
                            <span class="pro-price bg-primary">$ {{$product->discount_price}}</span>
                            <h5 class="p_title card-title m-b-0">{{$product->title}}</h5>
                            <!--<small class="text-muted db">{{$product->what_in_box}}</small>-->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else 
               <div class="col-lg-12 col-md-12"> 
                 <div class="card">
                    <div class="card-body">
                        <h1>Sorry, Data not found</h1>
                    </div>
                  </div>
               </div>
            @endif
        </div>
        {{ $products->onEachSide(1)->links() }}
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
                    }else if(action == 'inactive'){
                        reference.prev().hide().prev().show();
                    }else if(action == 'delete'){
                        reference.parent().parent().parent().parent().parent().hide(1000).remove();
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
</script>
@endsection