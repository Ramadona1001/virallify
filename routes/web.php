<?php

use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]], function(){

    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\DashboardController::class, 'dashboardProfile'])->name('dashboard-profile');
    Route::post('/profile', [App\Http\Controllers\DashboardController::class, 'updateProfile'])->name('update_profile_info');
    Route::post('/change-password', [App\Http\Controllers\DashboardController::class, 'changePassword'])->name('changePassword');
    Route::post('/delete-account', [App\Http\Controllers\DashboardController::class, 'deleteAccount'])->name('deleteAccount');

    /////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('/files/{fileName}', function($fileName)
    {
        $file_path = Storage::disk()->path(base64_decode($fileName));
        if (file_exists($file_path)){
            return Response::file($file_path);
        }
        else{
            return Response::make('File not found', 404);
        }
    })->name('open_file');

    Route::get('/clear',function(){
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        return back()->with('success');
    })->name('clear_cache');


});




Auth::routes(['register' => false]);
