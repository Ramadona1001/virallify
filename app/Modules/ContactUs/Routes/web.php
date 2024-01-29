<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "ContactUs\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/contact-messages")->group(function () {
                Route::get('/', 'ContactUsController@index')->name('show_contact_messages');
                Route::get('/delete/{contact}', 'ContactUsController@delete')->name('delete_contact_messages');
            });
        });
    });
});
