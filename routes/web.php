<?php
use App\Wish;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/check', 'CheckController@check')->name('check');



View::composer('Frontend._partials.header',function ($view) {
    if(Auth::check()){
    $wish = Wish::where('customer_id', Auth::user()->id)->get();
    $currencys = App\Currency::all();
    $country = \App\Flag::where('sid', Session::getId())->orderBy('id', 'desc')->first();
    $view->with(compact('currencys', 'country', 'wish'));
    }else{
    $currencys = App\Currency::all();
    $country = \App\Flag::where('sid', Session::getId())->orderBy('id', 'desc')->first();
    $view->with(compact('currencys', 'country'));
    }

});
Route::post('frontend/currency', 'FrontendController@currency')->name('frontend.currency');

//for check out
Route::get('billing/paypal', 'CheckoutController@billingPaypal')->name('billing.paypal');
Route::get('billing/stripe', 'CheckoutController@billingStripe')->name('billing.stripe');
Route::post('paypal/checkout', 'CheckoutController@paypalCheckout')->name('paypal.checkout');
Route::get('tbc/checkout', 'CheckoutController@tbcCheckout')->name('tbc.checkout');
Route::get('local/checkout', 'CheckoutController@localCheckout')->name('local.checkout');
Route::post('qrcode', 'CheckoutController@qrcode')->name('qrcode');
Route::post('local', 'CheckoutController@local')->name('local');
//paypal
Route::get('process', 'CheckoutController@returnPaypal')->name('process');
Route::get('cancel', 'CheckoutController@cancelPaypal')->name('cancel');
//stripe
Route::post('stripe', 'CheckoutController@stripe')->name('stripe');
Route::get('charge/complete', 'CheckoutController@chargeComplette')->name('charge.complete');

Route::get('currency/delete/{id}', 'CurrencyController@currencyDelete')->name('currency.delete');
Route::get('currency/refresh', 'CurrencyController@currencyRefresh')->name('currency.refresh');

Route::get('transaction/user', 'TransactionController@user');
Route::get('transaction/list', 'TransactionController@transaction');
Route::get('transaction/create/{id}', 'TransactionController@create')->name('transaction.create');
Route::post('transaction/store', 'TransactionController@store')->name('transaction.store');

//refound
Route::post('refund', 'TransactionController@refund')->name('refund');
Route::get('pending_refund', 'TransactionController@pending_refund')->name('pending_refund');
Route::get('success_refund', 'TransactionController@success_refund')->name('success_refund');
Route::get('view_refund/{id}', 'TransactionController@view_refund')->name('view_refund');
Route::get('execute_refund/{id}', 'TransactionController@execute_refund')->name('execute_refund');


//for rating
Route::post('rating', 'TransactionController@rating')->name('rating');

//for flag
Route::get('flag', 'FlagController@flag')->name('flag');


//wish delete
Route::get('wish/delete/{id}', 'WithListhController@wishDelete')->name('wish.delete');

Route::resource('currency', 'CurrencyController');
Route::resource('wish', 'WithListhController');


























