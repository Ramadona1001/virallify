<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Permissions\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/permissions")->group(function () {
               Route::get('/', 'PermissionController@index')->name('permissions');
               Route::get('/edit/{permission}', 'PermissionController@edit')->name('edit_permissions');
               Route::post('/store', 'PermissionController@store')->name('store_permissions');
               Route::post('/update/{permission}', 'PermissionController@update')->name('update_permissions');
               Route::get('/delete/{permission}', 'PermissionController@destroy')->name('delete_permissions');
            });
        });
    });
});
