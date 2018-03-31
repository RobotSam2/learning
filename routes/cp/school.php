<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'SchoolController@index']);
Route::get('/create', 			['as' => 'create', 			'uses' => 'SchoolController@create']);
Route::get('/{id}', 			['as' => 'edit', 			'uses' => 'SchoolController@edit']);
Route::post('/', 				['as' => 'store', 			'uses' => 'SchoolController@store']);
Route::put('/{id}', 			['as' => 'update', 			'uses' => 'SchoolController@update']);
Route::delete('/{id}', 			['as' => 'trash', 			'uses' => 'SchoolController@trash']);


