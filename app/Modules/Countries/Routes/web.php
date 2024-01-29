<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Countries\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/countries")->group(function () {
                Route::get('/', 'CountryController@index')->name('show_countries');
                Route::post('/store', 'CountryController@store')->name('store_countries');
                Route::get('/edit/{country}', 'CountryController@edit')->name('edit_countries');
                Route::post('/update/{country}', 'CountryController@update')->name('update_countries');
                Route::get('/delete/{country}', 'CountryController@delete')->name('destroy_countries');

            });
        });
    });
});
