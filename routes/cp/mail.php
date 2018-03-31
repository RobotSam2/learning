<?php

Route::get('/', 				['as' => 'index', 			'uses' => 'MailController@index']);
Route::get('/send', 			['as' => 'send', 			'uses' => 'MailController@send']);
Route::get('/stat', 			['as' => 'stat', 			'uses' => 'MailController@stat']);


