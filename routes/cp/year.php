<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'YearController@index']);
Route::get('/create', 			['as' => 'create', 			'uses' => 'YearController@create']);
Route::get('/{id}', 			['as' => 'edit', 			'uses' => 'YearController@edit']);
Route::post('/', 				['as' => 'store', 			'uses' => 'YearController@store']);
Route::put('/{id}', 			['as' => 'update', 			'uses' => 'YearController@update']);
Route::delete('/{id}', 			['as' => 'trash', 			'uses' => 'YearController@trash']);


