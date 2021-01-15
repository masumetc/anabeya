<?php

Route::group(['prefix' => 'category', 'middleware' => 'auth'], function(){

	Route::get('/view-category', [
		'as' => 'category.view-category',
		'uses' => 'CategoryController@viewCategory'
	]);

	Route::get('/category-settings', [
		'as' => 'category.category-settings',
		'uses' => 'CategoryController@categorySettings'
	]);

	Route::get('/add-category-modal', [
		'as' => 'category.add-category-modal',
		'uses' => 'CategoryController@addCategoryModal'
	]);

	Route::post('/save-category-modal', [
		'as' => 'category.save-category-modal.post',
		'uses' => 'CategoryController@saveCategoryModal'
	]);

	Route::get('/update-save-category', [
		'as' => 'category.update-save-category',
		'uses' => 'CategoryController@updateSaveCategory'
	]);

	//Active Inactive route
	Route::get('update-status/{modelReference}/{action}/{id}',[
		'as' =>'settings.update-status',
		'uses' => 'CategoryController@statusUpdate'
	]);

	Route::get('/category-image-edit/{catId}', [
		'as' => 'category.category-image-edit',
		'uses' => 'CategoryController@categoryImageEdit'
	]);
	//image update
	Route::post('/update-category-image/{catId}', [
		'as' => 'category.update-category-image.post',
		'uses' => 'CategoryController@categoryImageUpdate'
	]);

});