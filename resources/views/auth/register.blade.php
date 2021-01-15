@extends('Frontend.app')

@section('main_content')
<div class="container" style="min-height:600px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="billing_form">
                <div class="">{{ __('Register') }}
                |
                    <a class="btn btn-link btn-sm" href="{{ URL::to('/login') }}">
                        {{ __('Login') }} 
                    </a>
                </div>

                <div class="">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                <br>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                <br>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  autocomplete="mobile">
                                <br>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="user_address" type="text" class="form-control @error('user_address') is-invalid @enderror" name="user_address" value="{{ old('user_address') }}"  autocomplete="user_address">
                                <br>
                                @error('user_address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('user_city') is-invalid @enderror" name="user_country" id="sel1">
                                   <option value="Austria">Austria</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Bosnia">Bosnia</option>
                                    <option value="Franceh">Franceh</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Kosovo">Kosovo</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="North Macedonia">North Macedonia</option>
                                    <option value="Moldovab">Moldovab</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Netherlandsi">Netherlandsi</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Portugalf">Portugalf</option>
                                    <option value="Russiac">Russiac</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Serbiag">Serbiag</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="Vatican City">Vatican City</option>
                                </select>
                                <br>
                                @error('user_country')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="user_city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="user_city" type="text" class="form-control @error('user_city') is-invalid @enderror" name="user_city" value="{{ old('user_city') }}"  autocomplete="user_city">
                                <br>
                                @error('user_city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_zip" class="col-md-4 col-form-label text-md-right">{{ __('Zip') }}</label>

                            <div class="col-md-6">
                                <input id="user_zip" type="text" class="form-control @error('user_zip') is-invalid @enderror" name="user_zip" value="{{ old('user_zip') }}"  autocomplete="user_zip">
                                <br>
                                @error('user_zip')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="user_zip" class="col-md-4 col-form-label text-md-right">{{ __('Image Upload') }}</label>

                            <div class="col-md-6">
                                <input id="customer_image" type="file" class="form-control @error('customer_image') is-invalid @enderror" name="customer_image" value="{{ old('customer_image') }}">
                                <br>
                                @error('customer_image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                <br>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                <br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <input  type="checkbox" name="check_termsandcondition"  requered > 
                                <label for="password-confirm" class="col-form-label text-md-right">Agree to <a href="{{ URL::to('/terms-condition') }}">Terms and Condition</a></label>
                                <br>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <center>
                                    <button type="submit" class="btn btn-outline-success">
                                        {{ __('Register') }}
                                    </button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
