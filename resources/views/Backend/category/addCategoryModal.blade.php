<div class="row">
    <div class="col-md-12">
        <form action="{{route('category.save-category-modal.post')}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-4 col-form-label">Category Name</label>
                <div class="col-8">
                    <input class="form-control" type="text" name="name" id="name" required="">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-4 col-form-label">Category Image</label>
                <div class="col-8">
                    <input class="form-control" type="file" name="image" id="image" required="">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-4 col-form-label">Parent Category</label>
                <div class="col-8">
                    <!--<select class="select2 form-control" name="parent_id">-->
                    <!--    <option selected="" disabled="">Select Parent Category</option>-->
                    <!--    <option value="0">None</option>-->
                        
                    <!--    <option value="1">Default</option>-->
                    <!--    <option value="2">Defaul2</option>-->
                    <!--</select>-->
                    {{ Form::select('parent_id',$getCategories,null, ['class' => 'form-control', 'id' => 'parent_id']) }}
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-4 col-form-label">Sub Parent Category</label>
                <div class="col-8">
                    <!--<select class="select2 form-control" name="sub_parent_id">-->
                    <!--    <option selected="" disabled="">Please Sub Select Parent Category</option>-->
                    <!--    <option value="0">None</option>-->
                    <!--    <option value="1">defalut1</option>-->
                    <!--    <option value="1">default2</option>-->
                    <!--</select>-->
                    {{ Form::select('sub_parent_id',$get_subCategories,null, ['class' => 'form-control', 'id' => 'sub_parent_id']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-4 col-form-label">Description</label>
                <div class="col-8">
                    <textarea class="form-control" name="description"required=""></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-4 col-form-label">Menu Type</label>
                <div class="col-8">
                    <select class="select2 form-control" name="menu_type">
                        <option selected="" disabled="">Please Select Menu Type</option>
                        <option value="0">None</option>
                        <option value="1">Front</option>
                        <option value="2">Top</option>
                    </select>
                </div>
            </div>
            
        </form>
    </div>
</div>
<script type="text/javascript">
$(".modal-title").html('Add Category')
$(".btn-submit-action").on('click',function(){
$("#myForm").submit();
});

</script>