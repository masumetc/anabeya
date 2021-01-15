@extends('Backend.app')
@section('extra-css')
@endsection
@section('content-header')
<!-- Content Header (Page header) -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Category</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                        <a data-toggle="modal" class="btn waves-effect waves-light btn-rounded btn-primary float-right" onclick="loadModal('category/add-category-modal')" href="#modal"> Create New</a>
                        <!-- End modal -->
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="table product-overview" >
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Parent</th>
                                        <th>Sub.Parent</th>
                                        <th>Description</th>
                                        <th>Menu.Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($categories) > 0)
                                    @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>
                                            <span>{{$category->name}}</span>
                                            <input type="text" name="name" class="form-control" id="categoryName_{{$category->category_id}}" value="{{$category->name}}" style="display: none;">
                                        </td>
                                        <td>
                                            <img src="{{URL::to('public/images/category_image/',$category->image)}}" height="70px" width="80px" alt="cat-img">
                                            <a data-toggle="modal" class="btn btn-primary btn-sm img_edit" onclick="loadModalEdit('category/category-image-edit','{{ $category->category_id }}')" href="#modal" style="display: show;"><i class="ti-pencil-alt" title="Change"></i></a>
                                        </td>
                                        <td>
                                            <span>{{$category->parent_id}}</span>
                                            {{ Form::select('parent_id',$getCategories,$category->parent_id, ['class' => 'form-control', 'id' => 'categoryParentIdType_'.$category->category_id, 'required' => 'required', 'style'=> 'display:none;']) }}
                                        <td>
                                            <span>{{$category->sub_parent_id}}</span>
                                            {{ Form::select('parent_id',$get_subCategories,$category->sub_parent_id, ['class' => 'form-control', 'id' => 'categorySubParentIdType_'.$category->category_id, 'required' => 'required', 'style'=> 'display:none;']) }}
                                        </td>
                                        <td>
                                            <span>{{$category->description}}</span>
                                            <input type="text" name="description" class="form-control" id="categoryDescription_{{$category->category_id}}" value="{{$category->description}}" style="display: none;">
                                        </td>
                                        <td> 
                                            <span>{{Helper::menuType($category->menu_type)}}</span>
                                            <select name="menu_type" id="menuType_{{$category->category_id}}" class="form-control" required="" style="display: none;">
                                                <option selected="" disabled="">Select a Type</option>
                                                <option value="0" @if($category->menu_type == 0) selected="" @endif> None</option>
                                                <option value="1" @if($category->menu_type ==1) selected="" @endif> Front</option>
                                                <option value="2" @if($category->menu_type ==2) selected="" @endif> Top</option>

                                            </select>
                                        </td>
                                        <td>
                                            <label class="label label-warning" style="@if($category->status==1) display: none; @endif">
                                                Inactive
                                            </label>
                                            <label class="label label-success" style="@if($category->status==0) display: none; @endif">
                                                active
                                            </label>
                                        </td>
                                        <td class="action_category">
                                            <a href="javascript:;" class="btn btn-success btn-xs" style="@if($category->status == 1) display:none; @endif" onclick="updateStatus('category', 'active', {{$category->category_id}})">
                                                <i class="ti-lock" title="Active"></i> 
                                            </a>
                                            <a href="javascript:;" class="btn btn-warning btn-xs" style="@if($category->status == 0) display:none; @endif" onclick="updateStatus('category', 'inactive', {{$category->category_id}})">
                                                <i class="ti-unlock" title="Inactive"></i>  
                                            </a>

                                            <a href="javascript:;" class="btn btn-info btn-xs edit-category" id="reference_{{$category->category_id}}">
                                                <i class="ti-marker-alt" title="Edit"></i>
                                            </a>
                                            <a href="javascript:;" class="btn btn-success btn-xs save-update-category" id="reference_{{$category->category_id}}" style="display: none;">
                                                <i class="ti-save" title="Save"></i>
                                            </a>
                                            <a href="javascript:;" class="btn btn-primary btn-xs reset" id="reference_{{$category->category_id}}" style="display: none;">
                                                <i class="ti-back-right" title="Reset"></i>
                                            </a>
                                            <a href="javascript:;" class="btn btn-danger btn-xs" style="@if($category->status == 2) display: none;@endif" onclick="updateStatus('category', 'delete', {{$category->category_id}})">
                                                    <i class="ti-trash" title="Delete"></i>  
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

        var categoryParentIdType     = $("#categoryParentIdType_" + categoryId); 
        var categoryParentIdTypeText = $("#categoryParentIdType_" + categoryId + " option:selected").text();

        var categorySubParentIdType     = $("#categorySubParentIdType_" + categoryId); 
        var categorySubParentIdTypeText = $("#categorySubParentIdType_" + categoryId + " option:selected").text();

        var menuType     = $("#menuType_" + categoryId); 
        var menuTypeText = $("#menuType_" + categoryId + " option:selected").text();

            var categoryDescription     = $("#categoryDescription_" + categoryId);

            // console.log(categoryParentIdType.val());
            // console.log(categoryParentIdTypeText);
            // return false;
            $.ajax({
                url : "update-save-category",
                Type : "GET",
                dataType : "json",
                data : {
                    'category_id'   : categoryId,
                    'name'          : categoryName.val(),
                    'parent_id'     : categoryParentIdType.val(),
                    'sub_parent_id' : categorySubParentIdType.val(),
                    'description'   : categoryDescription.val(),
                    'menu_type'     : menuType.val()
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