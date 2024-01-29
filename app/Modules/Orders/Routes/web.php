<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Orders\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/orders")->group(function () {
                Route::get('/', 'OrderController@index')->name('show_orders');
                Route::get('/create', 'OrderController@create')->name('create_orders');
                Route::get('/edit/{order}', 'OrderController@edit')->name('edit_orders');
                Route::get('/delete/{order}', 'OrderController@delete')->name('delete_orders');
                Route::post('/store', 'OrderController@store')->name('store_orders');
                Route::post('/update/{order}', 'OrderController@update')->name('update_orders');
                Route::get('/usersPlans/{id}', 'OrderController@usersPlans')->name('get_users_plans_ajax');
                Route::get('/usersAddress/{id}', 'OrderController@usersAddress')->name('get_users_address_ajax');

            });
        });
    });
});
