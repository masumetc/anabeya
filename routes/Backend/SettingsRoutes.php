<?php

Route::group(['prefix' => 'settings', 'middleware' => 'auth'], function(){

	Route::get('/frontend-settings', [
		'as' => 'settings.frontend-settings',
		'uses' => 'SettingsController@frontendSettings'
	]);
	
	Route::post('/logo-settings', [
		//'as' => 'settings.frontend-settings',
		'uses' => 'SettingsController@logoSettings'
	]);
	
	
	Route::get('/change-logo/{id}', [
    'uses' => 'SettingsController@changelogoSettings',
    //'as' => 'product.single'
    ]);
    
    Route::get('/delete-logo/{id}', [
    'uses' => 'SettingsController@deletelogoSettings',
    //'as' => 'product.single'
    ]);
    
    Route::get('/slider-data','SettingsController@sliderData');
    
    Route::post('/slider-up','SettingsController@sliderSettings');
    
    Route::get('/slider-delete','SettingsController@sliderDelete');
    
    Route::get('/slider-edit','SettingsController@sliderEdit');
    
    Route::post('/slider-update','SettingsController@sliderUpdate');
    
    Route::post('/bannertopleft-up','SettingsController@bannertopLeft');
    
    Route::get('/banner-choose','SettingsController@bannerChoose');
    
    Route::post('/banner-use','SettingsController@bannerUse');
    
    Route::get('/banner-delete','SettingsController@bannerDelete');

	Route::get('/backend-settings', [
		'as' => 'settings.backend-settings',
		'uses' => 'SettingsController@backendSettings'
	]);


});