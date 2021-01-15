<?php

namespace App\Http\Controllers;


use App\Order;
use Session,DB,Auth,Image,File,Cart;
use Illuminate\Http\Request;
use App\Currency;
use App\CurrencySession;

use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\Cookie;

use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function billingPaypal(){
        //for currency show
        $value = Cookie::get('currency_id');
        if ($value != null){
            $currency = Currency::find($value);
        }else{
            $currency = Currency::find(1);
        }
        $cart = Cart::getContent();
        if ($cart->count() == null){
            return redirect()->back()->with('error','Cart is empty');
        }
        $cartCollection = Cart::getContent();
        return view('Frontend.checkout.paypal_billing', compact('cartCollection', 'currency'));
    }

    public function billingStripe(){
        //for currency show
        $value = Cookie::get('currency_id');
        if ($value != null){
            $currency = Currency::find($value);
        }else{
            $currency = Currency::find(1);
        }
        $cart = Cart::getContent();
        if ($cart->count() == null){
            return redirect()->back()->with('error','Cart is empty');
        }
        $cartCollection = Cart::getContent();
        return view('Frontend.checkout.stripe_billing', compact('cartCollection', 'currency'));
    }


    public function tbcCheckout(){
        return view('Frontend.checkout.tbc');
    }


    //paypal checkout
    public function paypalCheckout(Request $request){

        if ($request->paypal){
            $currency = Currency::find('1');
            $cart = Cart::getContent();

            $cartCollection = Cart::getContent();
            $shippingCost=0;
            foreach ($cartCollection as $getSingleCartProduct){
                $shippingCost += $getSingleCartProduct->attributes->unit_charge;
            }
            $total_price =Cart::getSubTotal()+$shippingCost;

            if (isset($cart)) {
                $apiContext = new ApiContext(
                    new OAuthTokenCredential(
                        env('PAYPAL_CLIENT_ID'),
                        env('PAYPAL_CLIENT_SECRET')
                    )
                );

                $apiContext->setConfig(
                    array(
                        'log.LogEnabled' => true,
                        'log.FileName' => 'PayPal.log',
                        'log.LogLevel' => 'DEBUG',
                        'mode' => 'live'
                    )
                );

                // Create new payer and method
                $payer = new Payer();
                $payer->setPaymentMethod("paypal");

                // Set redirect URLs
                $redirectUrls = new RedirectUrls();
                $redirectUrls->setReturnUrl(route('process'))
                    ->setCancelUrl(route('cancel'));

                // Set payment amount
                $amount = new Amount();
                $amount->setCurrency("USD")
                    ->setTotal($total_price * $currency->rate);

                // Set transaction object
                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setDescription("Payment description");

                // Create the full payment object
                $payment = new Payment();
                $payment->setIntent('sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirectUrls)
                    ->setTransactions(array($transaction));


                try {
                    $payment->create($apiContext);

                    // Get PayPal redirect URL and redirect the customer
                    $approvalUrl = $payment->getApprovalLink();
                    $this->validate($request, [
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'email' => 'required',
                        'address1' => 'required',
                        'country' => 'required',
                        'state' => 'required',
                        'zip' => 'required',
                    ]);
                    $order = new Order();
                    //billing address
                    $order->first_name = $request->first_name;
                    $order->last_name = $request->last_name;
                    $order->email = $request->email;
                    $order->address1 = $request->address1;
                    $order->address2 = $request->address2;
                    $order->country = $request->country;
                    $order->state = $request->state;
                    $order->zip = $request->zip;
                    $order->payment_status = 1;


                    Session::put('customer', json_encode($order));
                    return redirect($approvalUrl);

                    // Redirect the customer to $approvalUrl
                } catch (PayPal\Exception\PayPalConnectionException $ex) {
                    echo $ex->getCode();
                    echo $ex->getData();
                    die($ex);
                } catch (Exception $ex) {
                    die($ex);
                }
            }else{
                return redirect()->back()->with('error', 'Invalid activity');
            }
        }

        if ($request->stripe){
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'address1' => 'required',
                'country' => 'required',
                'state' => 'required',
                'zip' => 'required',
            ]);
            $order = new Order();
            //billing address
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->address1 = $request->address1;
            $order->address2 = $request->address2;
            $order->country = $request->country;
            $order->state = $request->state;
            $order->zip = $request->zip;
            $order->payment_status = 2;


            Session::put('customer', json_encode($order));
            return redirect()->route('billing.stripe');

        }

        if ($request->tbc){
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'address1' => 'required',
                'country' => 'required',
                'state' => 'required',
                'zip' => 'required',
            ]);
            $order = new Order();
            //billing address
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->address1 = $request->address1;
            $order->address2 = $request->address2;
            $order->country = $request->country;
            $order->state = $request->state;
            $order->zip = $request->zip;
            $order->payment_status = 3;


            Session::put('customer', json_encode($order));
            return redirect()->route('tbc.checkout');
        }
                
           if ($request->local){
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'address1' => 'required',
                'country' => 'required',
                'state' => 'required',
                'zip' => 'required',
            ]);
            $order = new Order();
            //billing address
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->address1 = $request->address1;
            $order->address2 = $request->address2;
            $order->country = $request->country;
            $order->state = $request->state;
            $order->zip = $request->zip;
            $order->payment_status = 4;


            Session::put('customer', json_encode($order));
            return redirect()->route('local.checkout');
        }

    }



    public function returnPaypal(Request $request){
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('PAYPAL_CLIENT_ID'),
                env('PAYPAL_CLIENT_SECRET')
            )
        );
        // Get payment object by passing paymentId
        $paymentId = $request->paymentId;
        $payment = Payment::get($paymentId, $apiContext);
        $payerId = $request->PayerID;

// Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            // Execute payment
            $result = $payment->execute($execution, $apiContext);

            if (isset($result) and strtolower($result->state) == 'approved' ) {

                $customer = json_decode(Session::get('customer'));
                $cartCollections= Cart::getContent();
                foreach ($cartCollections as $cartCollection){
                    $order = new Order();
                    $order->name = $cartCollection->name;
                    $order->price = $cartCollection->price;
                    $order->quantity = $cartCollection->quantity;
                    $order->image = $cartCollection->attributes->image;
                    $order->product_id = $cartCollection->attributes->product_id;
                    $order->unit_charge = $cartCollection->attributes->unit_charge;
                    $order->curier_id = $cartCollection->attributes->curier_id;
                    $order->seller_id = $cartCollection->attributes->seller_id;
                    $order->buyer_id = \Illuminate\Support\Facades\Auth::user()->id;
                    $order->color = $cartCollection->attributes->color;
                    $order->size = $cartCollection->attributes->size;
                    $order->color_image = $cartCollection->attributes->color_image;

                    $order->first_name = $customer->first_name;
                    $order->last_name = $customer->last_name;
                    $order->email = $customer->email;
                    $order->address1 = $customer->address1;
                    $order->address2 = $customer->address2;
                    $order->country = $customer->country;
                    $order->state = $customer->state;
                    $order->zip = $customer->zip;
                    $order->payment_status = $customer->payment_status;
                    $order->status ='0';
                    $order->save();
                }

               if ($order->save()){
                   $delete_carts = Cart::getContent();
                   foreach ($delete_carts as $delete_cart){
                       Cart::remove($delete_cart->id);
                   }
                   return redirect()->route('charge.complete')->with('success', 'Yor order successfully placed');
               }else{
                   return redirect()->route('charge.complete')->with('success', 'Invalid Activity!');
               }

            }else{
                return redirect()->route('product.index')->with('message', 'Invalid Activity!');
            }



        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }
    }


    public function cancelPaypal(){

    }



    public function stripe(Request $request){
        $customer = json_decode(Session::get('customer'));
        if (Cart::getContent() == null || $customer == null){
            return redirect()->back();
        }
        $cartCollection = Cart::getContent();
        $shippingCost=0;
        foreach ($cartCollection as $getSingleCartProduct){
            $shippingCost += $getSingleCartProduct->attributes->unit_charge;
        }
        $total_price =Cart::getSubTotal()+$shippingCost;

        $error = '';
        $success = '';
        $currency = Currency::find('1');

        Stripe::setApiKey("sk_live_8PBRaIOpicrQCmNU4QjB1JRG00WtAIcR2b");


        try {
            $charge = Charge::create([
                'amount' => $total_price * 100,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'receipt_email' => $request->email,
            ]);
            $cartCollections= Cart::getContent();
            foreach ($cartCollections as $cartCollection){
                $order = new Order();
                $order->name = $cartCollection->name;
                $order->price = $cartCollection->price;
                $order->quantity = $cartCollection->quantity;
                $order->image = $cartCollection->attributes->image;
                $order->product_id = $cartCollection->attributes->product_id;
                $order->unit_charge = $cartCollection->attributes->unit_charge;
                $order->curier_id = $cartCollection->attributes->curier_id;
                $order->seller_id = $cartCollection->attributes->seller_id;
                $order->buyer_id = \Illuminate\Support\Facades\Auth::user()->id;
                $order->color = $cartCollection->attributes->color;
                $order->size = $cartCollection->attributes->size;
                $order->color_image = $cartCollection->attributes->color_image;

                $order->first_name = $customer->first_name;
                $order->last_name = $customer->last_name;
                $order->email = $customer->email;
                $order->address1 = $customer->address1;
                $order->address2 = $customer->address2;
                $order->country = $customer->country;
                $order->state = $customer->state;
                $order->zip = $customer->zip;
                $order->payment_status = $customer->payment_status;
                $order->status ='0';
                $order->save();
            }
            if ($order->save()){
                $delete_carts = Cart::getContent();
                foreach ($delete_carts as $delete_cart){
                    Cart::remove($delete_cart->id);
                }
                return redirect()->route('charge.complete')->with('success', 'Yor order successfully placed');
            }else{
                return redirect()->route('charge.complete')->with('success', 'Invalid Activity!');
            }


        } catch(\Stripe\Exception\CardException $e) {
            return redirect()->back()->withErrors(['Message', $e->getMessage()]);
        } catch (\Stripe\Exception\RateLimitException $e) {
            return redirect()->back()->withErrors(['Message', $e->getMessage()]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return redirect()->back()->withErrors(['Message', $e->getMessage()]);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return redirect()->back()->withErrors(['Message', $e->getMessage()]);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return redirect()->back()->withErrors(['Message', $e->getMessage()]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return redirect()->back()->withErrors(['Message', $e->getMessage()]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['Message', $e->getMessage()]);
        }







    }


    public function qrcode(Request $request){
        $customer = json_decode(Session::get('customer'));
        if (Cart::getContent() == null || $customer == null){
            return redirect()->back();
        }
        $cartCollection = Cart::getContent();
        $shippingCost=0;
        foreach ($cartCollection as $getSingleCartProduct){
            $shippingCost += $getSingleCartProduct->attributes->unit_charge;
        }
        $total_price =Cart::getSubTotal()+$shippingCost;


        $cartCollections= Cart::getContent();
        foreach ($cartCollections as $cartCollection){
            $order = new Order();
            $order->name = $cartCollection->name;
            $order->price = $cartCollection->price;
            $order->quantity = $cartCollection->quantity;
            $order->image = $cartCollection->attributes->image;
            $order->product_id = $cartCollection->attributes->product_id;
            $order->unit_charge = $cartCollection->attributes->unit_charge;
            $order->curier_id = $cartCollection->attributes->curier_id;
            $order->seller_id = $cartCollection->attributes->seller_id;
            $order->buyer_id = \Illuminate\Support\Facades\Auth::user()->id;
            $order->color = $cartCollection->attributes->color;
            $order->size = $cartCollection->attributes->size;
            $order->color_image = $cartCollection->attributes->color_image;

            $order->first_name = $customer->first_name;
            $order->last_name = $customer->last_name;
            $order->email = $customer->email;
            $order->address1 = $customer->address1;
            $order->address2 = $customer->address2;
            $order->country = $customer->country;
            $order->state = $customer->state;
            $order->zip = $customer->zip;
            $order->payment_status = $customer->payment_status;
            $order->status ='0';
            $order->save();
        }
        if ($order->save()){
            $delete_carts = Cart::getContent();
            foreach ($delete_carts as $delete_cart){
                Cart::remove($delete_cart->id);
            }
            return redirect()->route('charge.complete')->with('success', 'Yor order successfully placed');
        }else{
            return redirect()->route('charge.complete')->with('success', 'Invalid Activity!');
        }
    }
    
    public function local(){
          $customer = json_decode(Session::get('customer'));
        if (Cart::getContent() == null || $customer == null){
            return redirect()->back();
        }
        $cartCollection = Cart::getContent();
        $shippingCost=0;
        foreach ($cartCollection as $getSingleCartProduct){
            $shippingCost += $getSingleCartProduct->attributes->unit_charge;
        }
        $total_price =Cart::getSubTotal()+$shippingCost;


        $cartCollections= Cart::getContent();
        foreach ($cartCollections as $cartCollection){
            $order = new Order();
            $order->name = $cartCollection->name;
            $order->price = $cartCollection->price;
            $order->quantity = $cartCollection->quantity;
            $order->image = $cartCollection->attributes->image;
            $order->product_id = $cartCollection->attributes->product_id;
            $order->unit_charge = $cartCollection->attributes->unit_charge;
            $order->curier_id = $cartCollection->attributes->curier_id;
            $order->seller_id = $cartCollection->attributes->seller_id;
            $order->buyer_id = \Illuminate\Support\Facades\Auth::user()->id;
            $order->color = $cartCollection->attributes->color;
            $order->size = $cartCollection->attributes->size;
            $order->color_image = $cartCollection->attributes->color_image;

            $order->first_name = $customer->first_name;
            $order->last_name = $customer->last_name;
            $order->email = $customer->email;
            $order->address1 = $customer->address1;
            $order->address2 = $customer->address2;
            $order->country = $customer->country;
            $order->state = $customer->state;
            $order->zip = $customer->zip;
            $order->payment_status = '4';
            $order->status ='0';
            $order->save();
        }
        if ($order->save()){
            $delete_carts = Cart::getContent();
            foreach ($delete_carts as $delete_cart){
                Cart::remove($delete_cart->id);
            }
            return redirect()->route('charge.complete')->with('success', 'Yor order successfully placed');
        }else{
            return redirect()->route('charge.complete')->with('success', 'Invalid Activity!');
        }
    }



    public function chargeComplette(){
        return view('Frontend.checkout.payment_success');
    }
    
    public function localCheckout(){
        return view('Frontend.checkout.local_bank');
    }
}
