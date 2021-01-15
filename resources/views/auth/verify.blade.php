@extends('Frontend.app')

@section('main_content')
<div class="container" style="min-height:600px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="billing_form">
                <div class="">{{ __('Please Verify Your Email Address') }}</div>

                <div class="">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address. Please check your E-mail Address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}<br>
                    {{ __('If you did not receive the email then') }} , <a href="{{ route('verification.resend') }}" class="btn btn-primary btn-sm">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
