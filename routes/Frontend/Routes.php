<?php 

Route::get('/',[
	'as' => 'index',
	'uses' => 'HomeController@index'
]);

Route::get('single-product-view/{productId}',[
	'as' => 'product.single-product-view',
	'uses' => 'HomeController@singleProductView'
]);
Route::get('/flash-sell',[
	'as' => 'flash-sell',
	'uses' => 'HomeController@flashsell'
]);
//====================@@Cart Route Panel Start@@======================
Route::post('/add-to-cart',[
	'as' => 'product.add-to-cart',
	'uses' => 'ShippingCartController@addToCart'
]);

Route::get('view-cart',[
	'as' => 'product.view-cart',
	'uses' => 'ShippingCartController@viewCart'
]);

Route::get('delete-to-cart/{productId}',[
	'as' => 'product.delete-to-cart',
	'uses' => 'ShippingCartController@deleteToCart'
]);

Route::get('update-cart',[
	'as' => 'product.update-cart',
	'uses' => 'ShippingCartController@updteCart'
]);
Route::get('category/{id}',[
	'as' => 'category',
	'uses' => 'HomeController@category'
]);

Route::get('category-wise-product/{catId}',[
	'as' => 'product.category-wise-product',
	'uses' => 'HomeController@categoryWiseProduct'
]);

//====================@@Cart Route Panel Start@@======================

//====================@@Help Route Panel Start@@======================
Route::get('/terms-condition',[
	'as' => 'terms-condition',
	'uses' => 'HomeController@tarmsCondition'
]);
Route::get('/privacy-policy',[
	'as' => 'privacy-policy',
	'uses' => 'HomeController@privacyPolicy'
]);
Route::get('/help',[
	'as' => 'help',
	'uses' => 'HomeController@helpCenter'
]);
Route::get('/contuact-us',[
	'as' => 'contuact-us',
	'uses' => 'HomeController@contactus'
]);
Route::get('/about-us',[
	'as' => 'about-us',
	'uses' => 'HomeController@aboutanabeya'
]);
Route::get('/track-order',[
	'as' => 'track-order',
	'uses' => 'HomeController@trackorder'
]);
Route::get('/affiliate',[
	'as' => 'affiliate',
	'uses' => 'HomeController@affiliate'
]);

//====================@@Help Route Panel Start@@======================

Route::get('frontend-user-registration',[
	'as' => 'frontend-user-registration',
	'uses' => 'HomeController@frontendUserRegistration'
]);

Route::get('user-login',[
	'as' => 'user-login',
	'uses' => 'HomeController@userLogin'
]);

Route::get('banner-view','HomeController@bannerTopleftView');

//==================@@Seller Route Panel Start@@===================
Route::get('seller-login', [
	'as' => 'seller-login',
	'uses' => 'HomeController@sellerLogin'
]);

Route::get('seller-registration', [
	'as' => 'seller-registration',
	'uses' => 'HomeController@sellerRegistration'
]);

Route::post('save-seller-registration', [
	'as' => 'save-seller-registration.post',
	'uses' => 'HomeController@saveSellerRegistration'
]);
//==================@@Seller Route Panel End@@===================

//==================@@Search  Route Panel Start@@===================
Route::post('search-product', [
	'as' => 'product.search-product',
	'uses' => 'HomeController@searchProduct'
]);


