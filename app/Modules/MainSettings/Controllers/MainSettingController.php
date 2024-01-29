<?php

namespace MainSettings\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use Illuminate\Http\Request;
use MainSettings\Models\MainSetting;

class MainSettingController extends Controller
{
    public $path;

    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'MainSettings::';
    }

    public function index()
    {
        hasPermissions('show_settings');
        $title = transWord('Main Settings');
        $pages = [
            [transWord('Main Settings'),'mainsettings']
        ];
        $settings = MainSetting::first();
        return view($this->path.'index',compact('settings','pages','title'));
    }

    public function save(Request $request)
    {
        hasPermissions('save_settings');

        $request->validate([
            'name.*' =>'required|max:100',
            'meta_title.*' => 'required',
            'meta_desc.*' => 'required',
            'meta_keywords.*' => 'required',
            'logo' => 'mimes:png,jpg,jpeg,webp,svg',
            'favicon' => 'mimes:png,jpg,jpeg,webp,svg,ico',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
        ]);

       $settings=MainSetting::create($request->all());

        if($request->hasFile('logo')){
            $settings->update(['logo'=>$this->upload($request->logo,'settings')]);
        }
        if($request->hasFile('favicon')){
            $settings->update(['favicon'=>$this->upload($request->favicon,'settings')]);
        }
        return back()->with('success','');
    }

    public function update(MainSetting $mainSetting ,Request $request){
        $request->validate([
            'name.*' =>'required|max:100',
            'meta_title.*' => 'required',
            'meta_desc.*' => 'required',
            'meta_keywords.*' => 'required',
            'logo' => 'mimes:png,jpg,jpeg,webp,svg',
            'favicon' => 'mimes:png,jpg,jpeg,webp,svg,ico',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
        ]);

        $mainSetting->update($request->all());

        if($request->hasFile('logo')){
            $mainSetting->update(['logo'=>$this->upload($request->logo,'settings')]);
        }
        if($request->hasFile('favicon')){
            $mainSetting->update(['favicon'=>$this->upload($request->favicon,'settings')]);
        }
        return back()->with('success','');

    }



}
