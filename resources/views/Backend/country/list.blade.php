@extends('Backend.app')
@section('extra-css')
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Currency</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Currency</li>
                        </ol>
                    </div>
                </div>
            </div>
            @endsection
            @section('main-content')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Start modal  -->
                                <a class="btn waves-effect waves-light btn-rounded btn-primary float-right" href="{{route('currency.create')}}"> Create New</a>
                                <!-- End modal -->
                                <div class="table-responsive m-t-40">
                                    <table id="example23"
                                           class="display nowrap table table-hover table-striped table-bordered"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Currency Name</th>
                                            <th>Dollar</th>
                                            <th>Rate</th>
                                            <th>Symbol</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Currency Name</th>
                                            <th>Dollar</th>
                                            <th>Rate</th>
                                            <th>Symbol</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($currencys as $key=>$currency)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$currency->currency_name}}</td>
                                                <td>$ {{$currency->taka}}</td>
                                                <td>{{$currency->rate}}</td>
                                                <td>{{$currency->symbol}}</td>
                                                <td>
                                                    <a href="{{route('currency.show', $currency->id)}}" class="dt-button buttons-copy buttons-html5 btn btn-success mr-1">Edit</a>

                                                    <a href={{route('currency.delete', $currency->id)}}"" class="dt-button buttons-copy buttons-html5 btn btn-danger mr-1">Delete</a>


                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                    $(function() {
                        //Active-Inactive-Delete
                        //Edit
                        $(".edit-category").on('click',function(){
                            $(this).parent().prev().prev().prev().prev().prev().prev().prev().children().next().show().prev().hide();
                            // $(this).parent().prev().prev().prev().prev().prev().prev().children().next().show().prev().hide();
                            $(this).parent().prev().prev().prev().prev().prev().children().next().show().prev().hide();
                            $(this).parent().prev().prev().prev().prev().children().next().show().prev().hide();
                            $(this).parent().prev().prev().prev().children().next().show().prev().hide();
                            $(this).parent().prev().prev().children().next().show().prev().hide();
                            $(this).hide().next().show().next().show();
                        });

                        //Reset
                        $(".reset").on('click',function(){
                            $(this).parent().prev().prev().prev().prev().prev().prev().prev().children().next().hide().prev().show();
                            // $(this).parent().prev().prev().prev().prev().prev().prev().children().next().hide().prev().show();
                            $(this).parent().prev().prev().prev().prev().prev().children().next().hide().prev().show();
                            $(this).parent().prev().prev().prev().prev().children().next().hide().prev().show();
                            $(this).parent().prev().prev().prev().children().next().hide().prev().show();
                            $(this).parent().prev().prev().children().next().hide().prev().show();
                            $(this).hide().prev().hide().prev().show();
                        });

                        //Update category
                        $(".save-update-category").on('click',function(){
                            var thisClass          = $(this);
                            //var categoryId         = thisClass.attr('id');
                            var categoryId         = thisClass.attr('id').split('_')[1];
                            var categoryName     = $("#categoryName_" + categoryId);

                            var categoryParentIdType = $("#categoryParentIdType_"+categoryId);
                            var categoryParentIdTypeText = $("#categoryParentIdType_"+categoryId+" option:selected").text();

                            var categorySubParentIdType = $("#categorySubParentIdType_"+categoryId);
                            var categorySubParentIdTypeText = $("#categorySubParentIdType_"+categoryId+" option:selected").text();

                            var categoryDescription     = $("#categoryDescription_" + categoryId);
                            var menuType = $("#menuType_"+categoryId);
                            var menuTypeText = $("#menuType_"+categoryId+" option:selected").text();//option er age ekta space dite hoy.jemon: " option:selected".text();
                            //console.log(categoryName.val());
                            //alert(menuTypeText);
                            $.ajax({
                                url : "update-save-category",
                                Type : "GET",
                                dataType : "json",
                                data : {
                                    'category_id'      : categoryId,
                                    'name' : categoryName.val(),
                                    'parent_id' : categoryParentIdType.val(),
                                    'sub_parent_id' : categorySubParentIdType.val(),
                                    'description' : categoryDescription.val(),
                                    'menu_type' : menuType.val()
                                },
                                success: function(data){
                                    // console.log(data);
                                    // return false;
                                    if(data.success == true){
                                        categoryName.hide().prev().show().html(categoryName.val());

                                        categoryParentIdType.hide().prev().show().html(categoryParentIdTypeText);
                                        categorySubParentIdType.hide().prev().show().html(categorySubParentIdTypeText);
                                        categoryDescription.hide().prev().show().html(categoryDescription.val());

                                        menuType.hide().prev().show().html(menuTypeText);

                                        thisClass.hide().prev().show();
                                        thisClass.hide().next().hide();
                                        $(".box-body-second").show();
                                        $(".messageBodySuccess").slideDown(500).delay(1000).slideUp(500).children().next().html(data.message);
                                    }else {
                                        $(".box-body-second").show();
                                        $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                                    }
                                },
                                error: function(){
                                    $(".box-body-second").show();
                                    $(".messageBodyError").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
                                }
                            });
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
                                    $(".messageBodySuccess").slideDown(1000).delay(3000).slideUp(1000).children().next().html(data.message);
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