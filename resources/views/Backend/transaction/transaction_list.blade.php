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
                                            <th>Amount</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Send At</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                             <th>#SL</th>
                                            <th>Amount</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Send At</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($transactions as $key=>$transaction)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$transaction->amount}}</td>
                                            <td>{{$transaction->name}}</td>
                                            <td>{{$transaction->email}}</td>
                                            <td>{{$transaction->phone}}</td>
                                            <td>{{$transaction->created_at}}</td>
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