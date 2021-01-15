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
                    <h2>After your pay we need 4-5 day to process your order</h2>
                <br>
                <br>
                <form action="{{route('local')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <h2>MD GOLAM ZAKARIA</h2>
                        <p>Bank name Uttara bank limited</p>
                        <p>Branch  BHAGALPUR</p>
                        <p>A/C NO. 0011100117093</p>
                        <p>Swift code UTBLBDDH431</p>
                        <p>Routing 250480162</p>
                        <p>Post code2336</p>
                    </div>
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