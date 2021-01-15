<?php

Route::group(['prefix' => 'order', 'middleware' => 'auth'], function(){

	Route::get('/new-order', [
		'as' => 'order.new-order',
		'uses' => 'OrderController@newOrder'
	]);

	Route::get('/order-processing', [
		'as' => 'order.order-processing',
		'uses' => 'OrderController@orderProcessing'
	]);

	Route::get('/order-delivery', [
		'as' => 'order.order-delivery',
		'uses' => 'OrderController@orderDelivery'
	]);

	Route::get('/order-complete', [
		'as' => 'order.order-complete',
		'uses' => 'OrderController@orderComplete'
	]);

	Route::get('/invoice', [
		'as' => 'order.invoice',
		'uses' => 'OrderController@invoice'
	]);

    Route::get('/ready_ship', [
        'as' => 'ready_ship',
        'uses' => 'OrderController@readyShip'
    ]);
    Route::get('/waiting/order', [
        'as' => 'waiting.order',
        'uses' => 'OrderController@waitingOrder'
    ]);
    Route::get('/cancel/order/{id}', [
        'as' => 'cancel.order',
        'uses' => 'OrderController@cancelOrder'
    ]);
    Route::get('/ship/new/{id}', [
        'as' => 'ship.new',
        'uses' => 'OrderController@shipNew'
    ]);
    Route::get('/order/ship', [
        'as' => 'order.ship',
        'uses' => 'OrderController@shipView'
    ]);
    Route::get('/order/ship_change/{id}', [
        'as' => 'order.ship_change',
        'uses' => 'OrderController@orderShip'
    ]);

    Route::put('/order/processing/{id}', [
        'as' => 'order.processing',
        'uses' => 'OrderController@orderProcess'
    ]);
    Route::get('/order/deliverys/{id}', [
        'as' => 'order.deliverys',
        'uses' => 'OrderController@orderDeliverys'
    ]);

    Route::get('/order/cancel_customer', [
        'as' => 'order.cancel_customer',
        'uses' => 'OrderController@cancel_customer'
    ]);
    Route::get('/order/cancel_seller', [
        'as' => 'order.cancel_seller',
        'uses' => 'OrderController@cancel_seller'
    ]);
    Route::get('/order/cancel_admin', [
        'as' => 'order.cancel_admin',
        'uses' => 'OrderController@cancel_admin'
    ]);
    Route::get('pending_order', [
        'as' => 'pending_order',
        'uses' => 'OrderController@pending_order'
    ]);
    Route::get('order.ship_six/{id}', [
        'as' => 'order.ship_six',
        'uses' => 'OrderController@shipSixHOur'
    ]);
    
    
    
    
    
    
    //up order
    Route::get('uporder_one/{id}', [
        'as' => 'uporder_one',
        'uses' => 'OrderController@uporder_one'
    ]);
    
    Route::get('uporder_two/{id}', [
        'as' => 'uporder_two',
        'uses' => 'OrderController@uporder_two'
    ]);
    
    Route::get('uporder_three/{id}', [
        'as' => 'uporder_three',
        'uses' => 'OrderController@uporder_three'
    ]);
    Route::get('uporder_four/{id}', [
        'as' => 'uporder_four',
        'uses' => 'OrderController@uporder_four'
    ]);
    Route::get('uporder_five/{id}', [
        'as' => 'uporder_five',
        'uses' => 'OrderController@uporder_five'
    ]);
    
});