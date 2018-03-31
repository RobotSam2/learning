<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'MaincateController@index']);
Route::get('/create', 			['as' => 'create', 			'uses' => 'MaincateController@create']);
Route::get('/{id}', 			['as' => 'edit', 			'uses' => 'MaincateController@edit']);
Route::post('/', 				['as' => 'store', 			'uses' => 'MaincateController@store']);
Route::put('/{id}', 			['as' => 'update', 			'uses' => 'MaincateController@update']);
Route::delete('/{id}', 			['as' => 'trash', 			'uses' => 'MaincateController@trash']);

