<?php

namespace SocialMedia\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SocialMedia\Models\SocialMedia;
use App\Http\Trait\UploadImage;



class SocialMediaController extends Controller
{
    public $path;
    use UploadImage;


    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'SocialMedia::';
    }

    public function index()
    {
       hasPermissions('show_homepage_social_media');
        $title = transWord('Social Media');
        $pages = [
            [transWord('Social Media'),'show_social_settings']
        ];

        $media_items =SocialMedia::latest()->get();

        return view($this->path.'index',compact('media_items','pages','title'));
    }



    public function  edit(SocialMedia $media){
        hasPermissions('update_homepage_social_media');

        $title = transWord('Social Media');
        $pages = [
            [transWord('Social Media'),'show_social_settings']
        ];

        if($media){
            return view($this->path.'edit',compact('media','pages','title'));

        }
    }



    public function store(Request $request){
        hasPermissions('create_homepage_social_media');
        $request->validate([
            'social_icon' =>'required|image|mimes:png,jpg,jpeg,svg',
            'social_link' => 'required|string',
        ]);

        $media= SocialMedia::create([
            'social_link' => $request->social_link ,
            'social_icon' => $this->upload($request->social_icon , 'social_media'),
        ]);

        return redirect()->route('show_social_settings')->with("success" ,"");
    }


    public function update(Request $request , SocialMedia $media){
        hasPermissions('update_homepage_social_media');
        $request->validate([
            'new_social_icon' =>'nullable|image|mimes:png,jpg,jpeg,svg',
            'social_link' => 'required|string',
        ]);
        if($media){
            $media->update([
                'social_link' => $request->social_link
            ]);
        }

        if($request->hasFile('new_social_icon')){
            if(Storage::exists($media->social_icon)){
                Storage::delete($media->social_icon);
            }
            $media->update([
                'social_icon' => $this->upload($request->new_social_icon , 'social_media_icons')
            ]);

        }

        return redirect()->route('show_social_settings')->with("success" ,"");
    }


    public function delete(SocialMedia $media){
        hasPermissions('delete_homepage_social_media');

        if($media){
            $media->delete();
        }

        return redirect()->route('show_social_settings')->with("success" ,"");
    }










}
