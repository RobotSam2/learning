<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'ServiceController@index']);
Route::get('/create', 			['as' => 'create', 			'uses' => 'ServiceController@create']);
Route::get('/{id}', 			['as' => 'edit', 			'uses' => 'ServiceController@edit']);
Route::post('/', 				['as' => 'store', 			'uses' => 'ServiceController@store']);
Route::put('/{id}', 			['as' => 'update', 			'uses' => 'ServiceController@update']);
Route::delete('/{id}', 			['as' => 'trash', 			'uses' => 'ServiceController@trash']);


