<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Footer\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/footer")->group(function () {
                Route::get('/', 'FooterController@index')->name('show_footer');
                Route::post('/store', 'FooterController@store')->name('store_footer');
                Route::post('/update/{footer}', 'FooterController@update')->name('update_footer');
            });
        });
    });
});
