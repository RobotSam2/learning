<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'ProvinceController@index']);
Route::get('/create', 			['as' => 'create', 			'uses' => 'ProvinceController@create']);
Route::get('/{id}', 			['as' => 'edit', 			'uses' => 'ProvinceController@edit']);
Route::post('/', 				['as' => 'store', 			'uses' => 'ProvinceController@store']);
Route::put('/{id}', 			['as' => 'update', 			'uses' => 'ProvinceController@update']);
Route::delete('/{id}', 			['as' => 'trash', 			'uses' => 'ProvinceController@trash']);


