<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Translates\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/translates")->group(function () {
                Route::get('/language-settings', 'TranslateController@index')->name('language_settings');
                Route::post('/save-language-settings', 'TranslateController@saveLang')->name('save_language_settings');
                Route::get('/delete-language/{id}', 'TranslateController@deleteLang')->name('delete_language_settings');
                Route::get('/langs/{key?}', 'TranslateController@translate')->name('langs');
                Route::post('/langs/save', 'TranslateController@save')->name('store_langs');
                Route::post('/langs/new', 'TranslateController@addNew')->name('store_new_langs');
            });
        });
    });
});
