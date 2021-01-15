<?php 

//Auth::routes();

Route::group(['middleware' =>['auth','verified']], function(){
	
	// Route::get('/',[
	// 'as' => '/',
	// 'uses' => 'DashBoardController@dashboard'
	// ]);

	Route::get('/dashboard',[
	'as' => '/dashboard',
	'uses' => 'DashBoardController@dashboard'
	]);

	//Route::get('/home', 'HomeController@index')->name('home');
	
	//user info edit route
    Route::post('user-information-update/{userId}', [
	'as' => 'user-information-update',
	'uses' => 'HomeController@userInformatonUpdate'
    ]);
    
    Route::post('user-address-update/{userId}', [
	'as' => 'user-address-update',
	'uses' => 'HomeController@userAddressUpdate'
]);

	Route::get('/logout',[
		'as' => 'logout',
		'uses' => 'Auth\LoginController@logout'
	]);
});




