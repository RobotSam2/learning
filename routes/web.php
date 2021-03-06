<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Frontend
// Route::get('/', 				['as' => 'index',			'uses' => 'Frontend\FrontendController@index']);
Route::get('/', 				['as' => 'home',			'uses' => 'Frontend\FrontendController@home']);

//:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Control Panel
Route::group(['as' => 'cp.', 'prefix' => 'cp', 'namespace' => 'CP'], function() {
	require(__DIR__.'/cp/main.php');
});
