@extends('Frontend.app')

@section('main_content')
<?php 
                                                            $log= DB::table('settings')
                                                                  ->where('status',1)
                                                                  ->where('type','logo')
                                                                  ->get();
                                                            $users= DB::table('users')
                                                                  ->get();
                                                            
                                                         ?>
                                                         <style>
                                                             .border{
                                                                 padding:5px;
                                                             }
                                                         </style>
<div class="container" style="min-height:600px">
    <div class="row ">
        <div class="col-lg-1 col-md-1 col-xl-1 col-sm-12 col-12">
        </div>
        <div class="col-lg-10 col-xl-10 col-md-10 col-sm-12 col-12">
            @auth
            <div class="row home_page">
                <div class="col-lg-5 col-xl-5 col-md-5 col-sm-12 col-12 profile_col">
                    <div class="personal_profile">
                        <h4>Personal information <span>| </span>
                                <a  data-toggle="modal" data-target="#responsive-modal" class="model_img img-responsive btn waves-effect waves-light btn-rounded btn-primary">Edit</a>
                                
                                <div id="responsive-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">User Information Update</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body"  style="font-size: 15px;">
                                                @if($user)
                                                <form action="{{route('user-information-update',Auth::user()->id)}}" method="post" id="myForm">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name" class="control-label">Name:</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mobile"  class="control-label">Mobile:</label>
                                                        <input type="number" name="mobile" class="form-control" value="{{$user->mobile}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="user_country"  class="control-label">Country:</label>
                                                        <input type="text" name="user_country" class="form-control" value="{{$user->user_country}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="user_city"  class="control-label">City:</label>
                                                        <input type="text" name="user_city" class="form-control" value="{{$user->user_city}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="user_zip"  class="control-label">Zip Code:</label>
                                                        <input type="text" name="user_zip" class="form-control" value="{{$user->user_zip}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="user_address"  class="control-label">Zip Code:</label>
                                                        <textarea class="form-control" rows="4" cols="4" name="user_address">v{{$user->user_address}}</textarea>
                                                    </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger waves-effect waves-light">Save changes</button>
                                            </div> 
                                        </form>
                                        @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </h4>
                        <p>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</p>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-7 col-md-7 col-sm-12 col-12 profile_col">
                    <div class="address_book">
                        <h4>Primary Adress <!--<span>| </span><a href="{{ Auth::user()->id }}">Edit</a>--></h4>
                        <p>{{ Auth::user()->user_address }}, {{ Auth::user()->user_city }}, {{ Auth::user()->user_zip }}</p>
                        <p>{{ Auth::user()->user_country }}</p>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 profile_col">
                    <div class="Order_table">
                        <h4>Your Wish List</h4>
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm user_product" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th class="th-sm">product
                              </th>
                              <th class="th-sm">Product Name
                              </th>
                              <th class="th-sm">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @if($wishs->count() != null)
                          @foreach($wishs as $wish)
                            <tr>
                              <td class="product_data_img">
                                    <img src="{{url('public/images/product',$wish->image)}}" class="product_table_img"/>
                              </td>
                              <td class="product_data_title" >{{$wish->product_name}}</td>
                             <td>
                                 <a href="{{route('wish.delete', $wish->id)}}" class="model_img img-responsive btn waves-effect waves-light btn-rounded btn-primary">Delete</a>
                             </td>
                            </tr>
                            @endforeach
                          @endif

                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            @endauth
        </div>
        <div class="col-lg-1 col-xl-1 col-md-1 col-sm-12 col-12">
        </div>
    </div>
</div>
@endsection
