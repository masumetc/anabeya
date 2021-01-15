<?php

Route::group(['prefix' => 'product', 'middleware' => 'auth'], function(){

	Route::get('/product', [
		'as' => 'product.product',
		'uses' => 'ShopController@product'
	]);
	Route::get('/add-product', [
		'as' => 'product.add-product',
		'uses' => 'ShopController@addProduct'
	]);

	//Only Test for developer
	Route::get('/test-product', [
		'as' => 'product.test-product',
		'uses' => 'ShopController@testProduct'
	]);

	Route::post('/save-product', [
		'as' => 'product.save-product.post',
		'uses' => 'ShopController@saveProduct'
	]);
	
	//Active Inactive route
	Route::get('update-status/{modelReference}/{action}/{id}',[
		'as' =>'curier.update-status',
		'uses' => 'ShopController@statusUpdate'
	]);

	Route::get('/product-edit/{productId}',[
		'as' => 'product.product-edit',
		'uses' => 'ShopController@productEdit'
	]);

	Route::post('/update-product/{productId}', [
		'as' => 'product.update-product.post',
		'uses' => 'ShopController@updateProduct'
	]);

	Route::get('/product-view-details/{productId}', [
		'as' => 'product.product-view-details',
		'uses' => 'ShopController@productViewDetails'
	]);

	Route::get('/product-order', [
		'as' => 'product.product-order',
		'uses' => 'ShopController@productOrder'
	]);

	Route::get('/product-cart', [
		'as' => 'product.product-cart',
		'uses' => 'ShopController@productCart'
	]);
	
	Route::get('/product-checkout', [
		'as' => 'product.product-checkout',
		'uses' => 'ShopController@productCheckout'
	]);
	


});