@extends('Frontend.app')

@section('extra_css')
    <style>
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
            width: 100%;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endsection

@section('main_content')
    <!-- Category Section-->
    <section class="shipping_page" style="min-height:600px">
        <div class="row">
            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 "></div>
            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 ">
                <center>
                <br>
                <br>
                <form action="{{route('qrcode')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <img width="50%" height="50%" src="{{url('public/images/qr.jpg')}}">
                    </div>
                
                    <p>TBC wallet address: NDQIKD-ABAMB5-XOYNNP-E4M6WQ-NQS5NW-FRDDMI-BRBK</p>
                    
                    <p>Confirm your order after complete bill</p>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
                </center>
            </div>
            
            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 "></div>
        </div>
    </section>
@endsection


@section('extra_js')

@endsection