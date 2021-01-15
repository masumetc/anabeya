@extends('Frontend.app')

@section('main_content')

<div class="container" style="min-height:600px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="billing_form">
                <center><h2>Login for customer and seller</h2>
                <div class="login-page">{{ __('Login') }} 
                    | 
                    <a class="btn btn-link btn-sm" href="{{ URL::to('/register') }}">
                        {{ __('Customer Register') }}
                    </a>
                    | 
                    <a class="btn btn-link btn-sm" href="{{ URL::to('/seller-registration') }}">
                        {{ __('Seller Register') }}
                    </a>
                </div></center>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <br>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <?php
                                  $email_verify_seller=Session::get("message");
                                
                                  if($email_verify_seller)
                                  {
                                    echo '
                                    <span class="valid-feedback" role="alert">
                                        <strong>'.$email_verify_seller.'</strong>
                                    </span>
                                    ';
                                    Session::put("message",null);
                                  }
                                ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="myInput" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <div style="font-size: 11px;margin-left: 0px;margin-top: 10px;">
                                    <span><input type="checkbox" onclick="showPassword()">Show Password</span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <center>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <br>
                                 <button type="submit" class="btn btn-outline-success">
                                    {{ __('Login') }}
                                 </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        </center> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	function showPassword() {
      var passwordShow = document.getElementById("myInput");
          if (passwordShow.type === "password") {
            passwordShow.type = "text";
          } else {
            passwordShow.type = "password";
          }
    }
</script>

@endsection
