<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "FaqSection\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/faq-settings")->group(function () {
                Route::get('/', 'FaqController@index')->name('show_faq_settings');
                Route::post('/store', 'FaqController@store')->name('store_faq_settings');
                Route::get('/edit/{faq}', 'FaqController@edit')->name('edit_faq_settings');
                Route::post('/update/{faq}', 'FaqController@update')->name('update_faq_settings');
                Route::get('/delete/{faq}', 'FaqController@delete')->name('delete_faq_settings');

            });
        });
    });
});
