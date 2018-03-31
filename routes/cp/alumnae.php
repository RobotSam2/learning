<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'AlumnaeController@index']);
Route::get('/create', 			['as' => 'create', 			'uses' => 'AlumnaeController@create']);
Route::get('/{id}', 			['as' => 'edit', 			'uses' => 'AlumnaeController@edit']);
Route::post('/', 				['as' => 'store', 			'uses' => 'AlumnaeController@store']);
Route::put('/{id}', 			['as' => 'update', 			'uses' => 'AlumnaeController@update']);
Route::delete('/{id}', 			['as' => 'trash', 			'uses' => 'AlumnaeController@trash']);
Route::get('/export', 			['as' => 'export', 			'uses' => 'AlumnaeController@export']);

Route::get('/check-major', 		['as' => 'check-major', 			'uses' => 'AlumnaeController@checkMajor']);

