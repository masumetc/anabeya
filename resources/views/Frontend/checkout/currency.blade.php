@extends('Frontend.app')

@section('extra_css')
    <style>
        .alert {
            padding: 20px;
            background-color: green;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
@endsection

@section('main_content')
    <!-- Category Section-->
    <section class="shipping_page" style="min-height:600px">
        <div class="row">
            <div class="container">
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <strong>Success!</strong> Currency Changed, Refresh your browser
                    </div>
            </div>

        </div>
        <a href="{{route('index')}}" class="btn btn-primary btn-lg btn-block">Okay</a>
    </section>
@endsection


@section('extra_js')

@endsection