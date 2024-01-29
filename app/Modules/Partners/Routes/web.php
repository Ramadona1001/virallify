<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Partners\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/partners")->group(function () {
                Route::get('/', 'PartnerController@index')->name('show_partners');
                Route::get('/edit/{partner}', 'PartnerController@edit')->name('edit_partners');
                Route::get('/delete/{partner}', 'PartnerController@delete')->name('delete_partners');
                Route::post('/store', 'PartnerController@store')->name('store_partners');
                Route::post('/update/{partner}', 'PartnerController@update')->name('update_partners');

            });
        });
    });
});
