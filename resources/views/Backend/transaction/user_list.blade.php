@extends('Backend.app')
@section('extra-css')
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Seller</h4>
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
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $sum_tot_Price = 0 ?>
                                        @foreach($users as $key=>$user)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->mobile}}</td>

                                                @if($user->payment->count() != null)

                                                @foreach($user->payment as $payment)
                                                        <?php $sum_tot_Price += $payment->amount ?>
                                                @endforeach
                                                    <td>{{ $sum_tot_Price }}</td>
                                                    @else
                                                    <td>00.00</td>
                                                @endif
                                                <td>
                                                    <a href="{{route('transaction.create', $user->id)}}" class="dt-button buttons-copy buttons-html5 btn btn-success mr-1">Transaction</a>
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
@endsection