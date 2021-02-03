<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
| @author  Gustavo Ocanto <gustavoocanto@gmail.com>
|
*/

Auth::routes();

        // Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        // Route::post('login', 'Auth\LoginController@login');
        // Route::post('logout', 'Auth\LoginController@logout');

        // // Registration Routes...
        // Route::get('register', 'Auth\RegisterController@showRegistrationForm');
        // Route::post('register', 'Auth\RegisterController@register');

        // // Password Reset Routes...
        // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
        // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        // Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// home
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'business', 'roles' => array_keys(trans('globals.roles')), 'middleware' => ['auth', 'roles']], function () {
	Route::resource('myBusiness', 'MyBusinessController');
});

//users routes
require __DIR__.'/web/users.php';

//business routes
require __DIR__.'/web/business.php';

//Wpanel Routes
require __DIR__.'/web/wpanel.php';

//products lists
require __DIR__.'/web/products.php';

//wish lists
require __DIR__.'/web/wish_lists.php';

//orders lists
require __DIR__.'/web/orders.php';

//about
require __DIR__.'/web/about.php';

//utilities
require __DIR__.'/web/utilities.php';

//shop routes
require __DIR__.'/web/shop.php';