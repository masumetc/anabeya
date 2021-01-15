@extends('Frontend.app') 
@section('main_content') 

<!-- Start Just for you Section-->
<section>
    <div class="row content_area">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 page_content">
            @foreach($curierUnits as $curierUnit)
            
<?php 
$curier_id = $curierUnit->user->id;
$curiearlink= DB::table('curiers')
    ->where('user_id',$curier_id)
    ->get();
?>
                 <center>
                     <div class="row">
                         <div class="col-lg-4 col-xl-4 col-12 col-sm-12 col-12">
                             
                         </div>
                         <div class="col-lg-4 col-xl-4 col-12 col-sm-12 col-12">
                             <img width="80px" height="80px" src="{{URL::to('public/images/users/')}}/{{$curierUnit->user->profile_img}}">
                             @foreach($curiearlink as $curier_link)
                                <a target="_blank" class="btn btn-outline-success btn-sm" href="{{$curier_link->default_link}}">Track Your Order</a>
                             @endforeach
                         </div>
                         <div class="col-lg-4 col-xl-4 col-12 col-sm-12 col-12">
                             
                         </div>
                     </div>
                 </center> <br>
           @endforeach
        </div>
        
    </div>
</section>
<!--=== End Recomandation Section===-->
@endsection