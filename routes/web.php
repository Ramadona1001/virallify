<?php

use App\Http\Controllers\FacebookController;
use App\Http\Controllers\SocialController;
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


    Route::get('/facebook/users', [App\Http\Controllers\GraphController::class, 'retrieveUserProfile']);

    Route::post('/facebook/user', [App\Http\Controllers\GraphController::class, 'publishToProfile']);

    Route::get('/facebook/profile', [App\Http\Controllers\GraphController::class, 'publishToProfile']);

    Route::get('/facebook/page', [App\Http\Controllers\GraphController::class, 'publishToPage']);


    
    
});

//////////////////////////Paypal/////////////////////////////////
Route::get('payment', [App\Http\Controllers\PayPalController::class, 'paymentPage'])->name('paymentPage');
Route::any('testroutetype', [App\Http\Controllers\PayPalController::class, 'testroutetype'])->name('testroutetype');
Route::post('paypal-checkout-init', [App\Http\Controllers\PayPalController::class, 'paypalCheckoutInit'])->name('paypal.checkout.init');


Route::get('createProduct', [App\Http\Controllers\PayPalController::class, 'createProduct'])->name('createProduct');
Route::get('createPlan', [App\Http\Controllers\PayPalController::class, 'createPlan'])->name('createPlan');
Route::get('allPlans', [App\Http\Controllers\PayPalController::class, 'allPlans'])->name('allPlans');
Route::get('planDetails/{id}', [App\Http\Controllers\PayPalController::class, 'planDetails'])->name('planDetails');
Route::post('createAgreement/{id}', [App\Http\Controllers\PayPalController::class, 'createAgreement'])->name('createAgreement');
Route::get('executeAgreement/{status}/{plan_id}/{user_id}', [App\Http\Controllers\PayPalController::class, 'executeAgreement'])->name('paypal.executeAgreement');
Route::get('payPlan/{id}', [App\Http\Controllers\PayPalController::class, 'payPlan'])->name('payPlan');



Route::get('cancel-payment', [App\Http\Controllers\PayPalController::class, 'paymentCancel'])->name('cancel.payment');
Route::get('payment-success', [App\Http\Controllers\PayPalController::class, 'paymentSuccess'])->name('success.payment');
Route::get('payment-success', function(){
    return 'done';
})->name('payment.success');
Route::get('payment-fail', function(){
    return 'fail';
})->name('payment.fail');


Route::get('connect_twitter', [App\Http\Controllers\TwitterController::class,'connect_twitter']);


Route::get('video', [App\Http\Controllers\YouTubeController::class,'index']);
Route::post('video_store', [App\Http\Controllers\YouTubeController::class,'store'])->name('youtube.store');


Route::controller(SocialController::class)->group(function () {
    Route::get('/social-login/redirect/{provider}', 'redirect')->name('social.login');
    Route::get('/social-login/{provider}/callback', 'callback')->name('social.callback');
    Route::get('/youtube', 'index')->name('youtube.index');
    Route::post('/youtube/upload', 'uploadYoutube')->name('youtube.upload');
});
// Route::get('/fb', [FacebookController::class, 'fb']);

Route::get('/login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebookProvider']);


Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderFacebookCallback']);



use App\Http\Controllers\Graph2Controller;

Route::get('upload_facebook', [Graph2Controller::class, 'createPost'])->name('facebook.login');
Route::get('login_facebook', [Graph2Controller::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('login/facebook/callback', [Graph2Controller::class, 'handleFacebookCallback'])->name('facebook.callback');


// Route::get('create-transaction', [App\Http\Controllers\PayPalController::class, 'createTransaction'])->name('createTransaction');
// Route::get('process-transaction', [App\Http\Controllers\PayPalController::class, 'processTransaction'])->name('processTransaction');
// Route::get('success-transaction', [App\Http\Controllers\PayPalController::class, 'successTransaction'])->name('successTransaction');
// Route::get('cancel-transaction', [App\Http\Controllers\PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');



Auth::routes(['register' => false]);
