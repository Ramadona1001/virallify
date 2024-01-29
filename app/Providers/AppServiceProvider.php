<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use MainSettings\Models\MainSetting;
use Translates\Models\Language;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $main_settings = MainSetting::first();
        if ($main_settings == null) {
            MainSetting::create([
                'logo' => 'logo.png',
                'favicon' => 'favicon.png',
            ]);
        }
        
        View::share('main_settings',$main_settings);


        $app_languages = [];
        $supported_languages = [];
        foreach (Language::all() as $lan) {
            $app_languages [$lan->code] = $lan->name;
            $supported_languages[$lan->code] = [
                'name'=>$lan->name,
                'script'=>$lan->name,
                'native'=>$lan->name,
                'regional'=>$lan->name
            ];
        }
        if (count($supported_languages) > 0) {
            \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setSupportedLocales($supported_languages);
        }else{
            \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setSupportedLocales(
                ['en' => ['name' => 'English','script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB']],
                // ['ar' => ['name' => 'Arabic','script' => 'Arab', 'native' => 'العربية', 'regional' => 'ar_AE']],
            );
        }

        if (count($app_languages) > 0) {
            Config::set('app.languages', $app_languages);
        }else{
            Config::set('app.languages', ['en'=>'English']);
        }
    }
}
