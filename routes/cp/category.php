<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'CategoryController@index']);
Route::get('/create', 			['as' => 'create', 			'uses' => 'CategoryController@create']);
Route::get('/{id}', 			['as' => 'edit', 			'uses' => 'CategoryController@edit']);
Route::post('/', 				['as' => 'store', 			'uses' => 'CategoryController@store']);
Route::put('/{id}', 			['as' => 'update', 			'uses' => 'CategoryController@update']);
Route::delete('/{id}', 			['as' => 'trash', 			'uses' => 'CategoryController@trash']);


