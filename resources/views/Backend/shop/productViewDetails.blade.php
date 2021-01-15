<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            @if($product)
            <div class="card-body">
                <h3 class="">{{$product->title}}</h3>
                <h6 class="card-subtitle">{{$product->what_in_box}}</h6>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="white-box text-center"> <img src="{{url('public/images/product',$product->image)}}" class="img-responsive"> </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-6">
                        <h4 class="box-title m-t-40">Product description</h4>
                        <p>{{$product->description}}</p>
                        <h2 class="m-t-40">{{$product->regular_price}} <small class="text-success">({{$product->discount_price}} % off)</small></h2>
                        <h3 class="box-title m-t-40">Key Highlights</h3>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check text-success"></i> {{$product->what_in_box}}</li>
                            <li><i class="fa fa-check text-success"></i> {{$product->name}}</li>
                            <li><i class="fa fa-check text-success"></i>{{$product->discount_price}} </li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title m-t-40">General Info</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="390">Category</td>
                                        <td>{{$category->name}} </td>
                                    </tr>
                                    <tr>
                                        <td width="390">Brand</td>
                                        <td>{{$brand->name}} </td>
                                    </tr>
                                    <tr>
                                        <td width="390">Color</td>
                                        <td>{{$product->color}} </td>
                                    </tr>
                                    <tr>
                                        <td>Size</td>
                                        <td> {{$product->size}} </td>
                                    </tr>
                                    <tr>
                                        <td>Stock</td>
                                        <td> {{$product->stock}} </td>
                                    </tr>
                                    <tr>
                                        <td>Type</td>
                                        <td> {{$product->title}} </td>
                                    </tr>
                                    <tr>
                                        <td>Weight</td>
                                        <td> {{$product->weight}} </td>
                                    </tr>
                                    <tr>
                                        <td>Regular Price</td>
                                        <td> {{$product->regular_price}} </td>
                                    </tr>
                                    <tr>
                                        <td>Comission</td>
                                        <td> {{$product->comission}} % </td>
                                    </tr>
                                    <tr>
                                        <td>Discount Price</td>
                                        <td> {{$product->discount_price}} </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- Column -->
</div>
<script type="text/javascript">
$(".modal-title").html('View Product Details');
$('.btn-submit-action').hide().prev().hide();
</script>