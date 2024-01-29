<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Accounts\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/users")->group(function () {
                Route::get('/', 'UserController@index')->name('users');
                Route::get('/create', 'UserController@create')->name('create_users');
                Route::post('/store', 'UserController@store')->name('store_users');
                Route::get('/edit/{user}', 'UserController@edit')->name('edit_users');
                Route::get('/profile', 'UserController@profile')->name('profile_users');
                Route::post('/update/{user}', 'UserController@update')->name('update_users');
                Route::get('/show/{user}', 'UserController@show')->name('show_users');
                Route::get('/delete/{user}', 'UserController@destroy')->name('destroy_users');
                Route::get('/logout', 'UserController@logout')->name('logout_users');
                Route::get('/verify/{user}/{status}', 'UserController@verify')->name('verify_users');
                Route::get('/active/{user}/{status}', 'UserController@active')->name('active_users');
                Route::get('/plans/{user}', 'UserController@plans')->name('users_plans');
                Route::get('/addresses/{user}', 'UserController@addresses')->name('users_addresses');
                Route::post('/store-addresses', 'UserController@storeAddresses')->name('users_store_addresses');
                Route::get('/delete-addresses/{address}', 'UserController@deleteAddress')->name('users_delete_addresses');
                Route::post('/assign-plans', 'UserController@assignPlan')->name('assign_user_plans');
            });
        });
    });
});
