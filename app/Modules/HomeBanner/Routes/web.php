<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "HomeBanner\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/home-banner")->group(function () {
                Route::get('/', 'HomeBannerController@index')->name('show_home_banner');
                Route::post('/store', 'HomeBannerController@store')->name('store_home_banner');
                Route::post('/update/{home_banner}', 'HomeBannerController@update')->name('update_home_banner');
            });
        });
    });
});
