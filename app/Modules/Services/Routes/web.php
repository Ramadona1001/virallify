<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Services\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/services")->group(function () {
                Route::get('/', 'ServiceController@index')->name('show_services');
                Route::get('/edit/{service}', 'ServiceController@edit')->name('edit_services');
                Route::get('/delete/{service}', 'ServiceController@delete')->name('delete_services');
                Route::post('/store', 'ServiceController@store')->name('store_services');
                Route::post('/update/{service}', 'ServiceController@update')->name('update_services');

            });
        });
    });
});
