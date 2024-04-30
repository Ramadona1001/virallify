<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "SocialMediaChannel\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/social-media-channels")->group(function () {
                Route::get('/', 'SocialMediaChannelController@index')->name('show_social_channel_settings');
                Route::get('/edit/{media}', 'SocialMediaChannelController@edit')->name('edit_social_channel_media');
                Route::get('/delete/{media}', 'SocialMediaChannelController@delete')->name('delete_social_channel_media');
                Route::post('/store', 'SocialMediaChannelController@store')->name('store_social_channel_media');
                Route::post('/update/{media}', 'SocialMediaChannelController@update')->name('update_social_channel_media');

            });
        });
    });
});
