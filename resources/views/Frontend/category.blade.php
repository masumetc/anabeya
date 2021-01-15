@extends('Frontend.app') 
@section('main_content') 

@foreach($product as $p)
<?php
$photo = DB::table('product_image')->where('product_id',$p->product_id)->get(); 

?>
<div class="col-md-2 col-sm-3">
    <img class="product_first_img" src="{{URL::to('public/images/product/',$photo[0]->image)}}">
    <h1>{{$p->title}}</h1>
</div>

@endforeach

@endsection