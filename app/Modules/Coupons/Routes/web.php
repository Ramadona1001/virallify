<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web','auth']], function() {
    $namespace = "Coupons\Controllers";
    Route::namespace($namespace)->group(function () {
        Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
            Route::prefix("backend/coupons")->group(function () {
                Route::get('/', 'CouponController@index')->name('show_coupons');
                Route::get('/edit/{coupon}', 'CouponController@edit')->name('edit_coupons');
                Route::get('/delete/{coupon}', 'CouponController@delete')->name('delete_coupons');
                Route::post('/store', 'CouponController@store')->name('store_coupons');
                Route::post('/update/{coupon}', 'CouponController@update')->name('update_coupons');

            });
        });
    });
});
