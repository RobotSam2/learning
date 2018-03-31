<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'MajorController@index']);
Route::get('/create', 			['as' => 'create', 			'uses' => 'MajorController@create']);
Route::get('/{id}', 			['as' => 'edit', 			'uses' => 'MajorController@edit']);
Route::post('/', 				['as' => 'store', 			'uses' => 'MajorController@store']);
Route::put('/{id}', 			['as' => 'update', 			'uses' => 'MajorController@update']);
Route::delete('/{id}', 			['as' => 'trash', 			'uses' => 'MajorController@trash']);


