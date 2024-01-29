<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "SocialMedia\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/social-media")->group(function () {
                Route::get('/', 'SocialMediaController@index')->name('show_social_settings');
                Route::get('/edit/{media}', 'SocialMediaController@edit')->name('edit_social_media');
                Route::get('/delete/{media}', 'SocialMediaController@delete')->name('delete_social_media');
                Route::post('/store', 'SocialMediaController@store')->name('store_social_media');
                Route::post('/update/{media}', 'SocialMediaController@update')->name('update_social_media');

            });
        });
    });
});
