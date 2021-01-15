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
            <div class="col-sm-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <div class="col-sm-12">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <form class="needs-validation" action="{{route('stripe')}}" method="post" id="payment-form">
                      @csrf
                      <div class="row">
                          <div class="col-md-6 mb-3">

                          </div>
                          <div class="col-md-6 mb-3">

                          </div>
                      </div>


                      <div class="mb-3">

                      </div>

                      <div class="mb-3">

                      </div>

                      <div class="mb-3">

                      </div>

                      <div class="row">
                           <div class="col-md-3 mb-3">
                              <input type="text" disabled class="form-control border-primary @error('zip') is-invalid @enderror" value="Visa Card">

                          </div>
                          <div class="col-md-3 mb-3">
                              <input type="text" disabled class="form-control border-primary @error('zip') is-invalid @enderror" value="Master Card">

                          </div>
                           <div class="col-md-3 mb-3">
                              <input type="text" disabled class="form-control border-primary @error('zip') is-invalid @enderror" value="Tbc Card">

                          </div>
                          <div class="col-md-3 mb-3">
                              <input type="text" disabled class="form-control border-primary @error('zip') is-invalid @enderror" value="Credit Card">

                          </div>
                      </div>

                      <script src="https://js.stripe.com/v3/"></script>
                      <div class="form-row">
                          <label for="card-element">

                          </label>
                          <div id="card-element">
                              <!-- A Stripe Element will be inserted here. -->
                          </div>

                          <!-- Used to display form errors. -->
                          <div id="card-errors" role="alert"></div>
                      </div>
                      <!-- strip -->
                      <hr class="mb-4">
                      <br>

                      <button class="btn btn-outline-success btn-lg btn-block payment_pay" type="submit">Pay Now</button>
                  </form>
              </div>
            </div>
        </div>
    </section>
@endsection


@section('extra_js')
    <script>
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true){
                text.style.display = "none";
            } else {
                text.style.display = "block";
            }
        }


        // Create a Stripe client.
        var stripe = Stripe('pk_live_syZATHyzqIwvEZIRTqJ04nEH00c9Ycc7oc');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }


    </script>
@endsection