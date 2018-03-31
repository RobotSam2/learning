<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'ProductController@index']);
Route::get('/create', 			['as' => 'create', 			'uses' => 'ProductController@create']);
Route::get('/{id}', 			['as' => 'edit', 			'uses' => 'ProductController@edit']);
Route::post('/', 				['as' => 'store', 			'uses' => 'ProductController@store']);
Route::put('/{id}', 			['as' => 'update', 			'uses' => 'ProductController@update']);
Route::delete('/{id}', 			['as' => 'trash', 			'uses' => 'ProductController@trash']);


