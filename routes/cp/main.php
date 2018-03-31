<?php

	//:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Auth
	Route::group(['as' => 'auth.', 'prefix' => 'auth', 'namespace' => 'Auth'], function(){	
		require(__DIR__.'/auth.php');
	});
	
	//:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Authensicated
	Route::group(['middleware' => 'authenticatedUser'], function() {
		Route::group(['as' => 'user.',  'prefix' => 'user', 'namespace' => 'User'], function () {
			require(__DIR__.'/user.php');
		});
		Route::group(['as' => 'alumnae.',  'prefix' => 'alumnae', 'namespace' => 'Alumnae'], function () {
			require(__DIR__.'/alumnae.php');
		});
		Route::group(['as' => 'maincate.',  'prefix' => 'maincate', 'namespace' => 'Maincate'], function () {
			require(__DIR__.'/maincate.php');
		});
		Route::group(['as' => 'category.',  'prefix' => 'category', 'namespace' => 'Category'], function () {
			require(__DIR__.'/category.php');
		});
		Route::group(['as' => 'product.',  'prefix' => 'product', 'namespace' => 'Product'], function () {
			require(__DIR__.'/product.php');
		});
		Route::group(['as' => 'major.',  'prefix' => 'major', 'namespace' => 'Major'], function () {
			require(__DIR__.'/major.php');
		});
		Route::group(['as' => 'province.',  'prefix' => 'province', 'namespace' => 'Province'], function () {
			require(__DIR__.'/province.php');
		});
		Route::group(['as' => 'year.',  'prefix' => 'year', 'namespace' => 'Year'], function () {
			require(__DIR__.'/year.php');
		});
		Route::group(['as' => 'school.',  'prefix' => 'school', 'namespace' => 'School'], function () {
			require(__DIR__.'/school.php');
		});
		Route::group(['as' => 'mail.',  'prefix' => 'mail', 'namespace' => 'Mail'], function () {
			require(__DIR__.'/mail.php');
		});
		
		
	});