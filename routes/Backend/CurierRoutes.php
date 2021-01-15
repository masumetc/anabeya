<?php

Route::group(['prefix' => 'curier', 'middleware' => 'auth'], function(){

	Route::get('/curier', [
		'as' => 'curier.curier',
		'uses' => 'CurierController@curier'
	]);

	Route::post('/save-curier', [
		'as' => 'curier.save-curier.post',
		'uses' => 'CurierController@saveCurier'
	]);

	Route::get('/user-profile', [
		'as' => 'curier.curier-profile',
		'uses' => 'CurierController@curierProfile'
	]);

	//Active Inactive route
	Route::get('update-status/{modelReference}/{action}/{id}',[
		'as' =>'curier.update-status',
		'uses' => 'CurierController@statusUpdate'
	]);

	Route::get('/curier-unit-edit/{id}', [
		'as' => 'curier.curier-unit-edit',
		'uses' => 'CurierController@curierUnitEdit'
	]);

	Route::post('/update-curier-unit/{id}', [
		'as' => 'curier.update-curier-unit.post',
		'uses' => 'CurierController@UpdateCurierUnit'
	]);


});