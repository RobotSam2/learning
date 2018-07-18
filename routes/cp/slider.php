<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'SliderController@index']);
Route::get('/create', 			['as' => 'create', 			'uses' => 'SliderController@create']);
Route::get('/{id}', 			['as' => 'edit', 			'uses' => 'SliderController@edit']);
Route::post('/', 				['as' => 'store', 			'uses' => 'SliderController@store']);
Route::put('/{id}', 			['as' => 'update', 			'uses' => 'SliderController@update']);
Route::delete('/{id}', 			['as' => 'trash', 			'uses' => 'SliderController@trash']);


