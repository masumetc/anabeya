<div class="row">
    <div class="col-md-12">
        <form action="{{route('category.update-category-image.post',$editCategoryImage->image)}}" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8" novalidate="true" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-4 col-form-label">Old Category Image: </label>
                <div class="col-8">
                    <img src="{{url('public/images/category_image/',$editCategoryImage->image)}}" height="50px" width="60px" alt="catImg">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-4 col-form-label">New Category Image: </label>
                <div class="col-4">
                    <input name="files" class="form-control" type="file" id="post_image">
                </div>
                <div class="col-4">
                    <img src="" id="post_img_show" height="50px" width="60px"/>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(".modal-title").html('Edit Category Image')
    $(".btn-submit-action").on('click',function(){
        $("#myForm").submit();
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

</script>