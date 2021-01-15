@extends('Backend.app')
@section('extra-css')

@endsection
@section('content-header')
 <!-- Content Header (Page header) -->
<div class="page-wrapper">
 <div class="container-fluid">
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h4 class="text-themecolor">Basic Customer</h4>
</div>
<div class="col-md-7 align-self-center text-right">
<div class="d-flex justify-content-end align-items-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<li class="breadcrumb-item active">Basic Customer</li>
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
                         <!-- End modal -->
                         <div class="table-responsive m-t-40">
                             <table id="example23"
                                    class="display nowrap table table-hover table-striped table-bordered"
                                    cellspacing="0" width="100%">
                                 <thead>
                                 <tr>
                                     <th>#SL</th>
                                     <th>Name</th>
                                     <th>Email</th>
                                     <th>Mobile</th>
                                     <th>Address</th>
                                     <th>Created At</th>
                                     <th>Action</th>
                                 </tr>
                                 </thead>
                                 <tfoot>
                                 <tr>
                                     <th>#SL</th>
                                     <th>Name</th>
                                     <th>Email</th>
                                     <th>Mobile</th>
                                     <th>Address</th>
                                     <th>Created At</th>
                                     <th>Action</th>
                                 </tr>
                                 </tfoot>
                                 <tbody>
                                 @foreach($users as $key=>$user)
                                     <tr>
                                         <td>{{$key+1}}</td>
                                         <td>{{$user->name}}</td>
                                         <td>{{$user->email}}</td>
                                         <td>{{$user->mobile}}</td>
                                         <td>{{$user->user_address}}</td>
                                         <td>{{$user->created_at}}</td>
                                         <td>
                                             <a href="{{route('basic.customer', $user->id)}}" class="dt-button buttons-copy buttons-html5 btn btn-success mr-1">Upgrade</a>
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

</script>
@endsection
