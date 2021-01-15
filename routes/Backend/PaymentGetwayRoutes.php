<?php

Route::group(['prefix' => 'paymentGetway', 'middleware' => 'auth'], function(){

	Route::get('/add-payment-getway', [
		'as' => 'paymentGetway.add-payment-getway',
		'uses' => 'PaymentGetwayController@addPaymentGetway'
	]);

	Route::get('/payment-settings', [
		'as' => 'paymentGetway.payment-settings',
		'uses' => 'PaymentGetwayController@paymentSettings'
	]);


});