<?php

Route::group(['prefix' => 'customer', 'middleware' => 'auth'], function(){

	Route::get('/new-customer', [
		'as' => 'customer.new-customer',
		'uses' => 'CustomerController@newCustomer'
	]);

	Route::get('/basic-customer', [
		'as' => 'customer.basic-customer',
		'uses' => 'CustomerController@basicCustomer'
	]);
    Route::get('/basic/customer/{id}', [
        'as' => 'basic.customer',
        'uses' => 'CustomerController@bbasicUpdate'
    ]);


    Route::get('/platinum/customer/{id}', [
        'as' => 'platinum.customer',
        'uses' => 'CustomerController@platinumUpdate'
    ]);
	Route::get('/plutinum-customer', [
		'as' => 'customer.plutinum-customer',
		'uses' => 'CustomerController@plutinumCustomer'
	]);


    Route::get('/gold/customer/{id}', [
        'as' => 'gold.customer',
        'uses' => 'CustomerController@goldUpdate'
    ]);
	Route::get('/gold-customer', [
		'as' => 'customer.gold-customer',
		'uses' => 'CustomerController@goldCustomer'
	]);



	Route::get('/customer-profile', [
		'as' => 'customer.customer-profile',
		'uses' => 'CustomerController@customerProfile'
	]);
	
	
	
	
	//customer rank down
	    Route::get('/down_basic/customer/{id}', [
        'as' => 'down_basic.customer',
        'uses' => 'CustomerController@down_basic'
    ]);
        Route::get('/down_platinum/customer/{id}', [
        'as' => 'down_platinum.customer',
        'uses' => 'CustomerController@down_platinum'
    ]);
    Route::get('/down_new/customer/{id}', [
        'as' => 'down_new.customer',
        'uses' => 'CustomerController@down_new'
    ]);

});