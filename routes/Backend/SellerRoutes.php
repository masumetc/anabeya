<?php

Route::group(['prefix' => 'seller', 'middleware' => 'auth'], function(){

	Route::get('/new-seller', [
		'as' => 'seller.new-seller',
		'uses' => 'SellerController@newSeller'
	]);
	
	Route::get('/check-username', 'SellerController@checkusername');
	
	Route::get('/check-email', 'SellerController@checkemail');
	
	Route::post('/seller-add', 'SellerController@addSeller');
	
	Route::get('/edit-more','SellerController@edit');
	
	Route::post('/edit-privacy','SellerController@editPrivacy');
	
	Route::post('/update-password','SellerController@editpasswordPrivacy');
	
	Route::post('/edit-address','SellerController@editAddress');
	
	Route::post('/edit-nid','SellerController@editNid');
	
	Route::get('/seller-profile','SellerController@sellerProfileS');
	
	Route::post('/edit-profile','SellerController@editProfile');
	
	Route::get('/seller-approve/{id}','SellerController@userApprove');
	
	Route::get('/seller-delete/{id}','SellerController@distroy');
	
	Route::get('/seller-back-pending/{id}','SellerController@backPending');
	
	Route::get('/seller-paid/','SellerController@sellerPaid');

	Route::get('/all-seller', [
		'as' => 'seller.all-seller',
		'uses' => 'SellerController@allSeller'
	]);
	
	
	//for commission
	Route::get('/edit/commission/{id}','SellerController@editCommission')->name('edit.commission');
	Route::put('/update/commissio/{id}n','SellerController@updateCommission')->name('update.commission');
});

    Route::get('seller-verify/{id}','SellerController@sellerVerify');