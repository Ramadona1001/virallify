<?php

namespace SocialMediaChannel\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SocialMediaChannel\Models\SocialMediaChannel;
use App\Http\Trait\UploadImage;



class SocialMediaChannelController extends Controller
{
    public $path;
    use UploadImage;


    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'SocialMediaChannel::';
    }

    public function index()
    {
       hasPermissions('show_social_channel_media');
        $title = transWord('Social Media Channel');
        $pages = [
            [transWord('Social Media Channel'),'show_social_channel_settings']
        ];

        $media_items =SocialMediaChannel::latest()->get();

        return view($this->path.'index',compact('media_items','pages','title'));
    }



    public function  edit(SocialMediaChannel $media){
        hasPermissions('update_social_channel_media');

        $title = transWord('Social Media Channel');
        $pages = [
            [transWord('Social Media Channel'),'show_social_channel_settings']
        ];

        if($media){
            return view($this->path.'edit',compact('media','pages','title'));

        }
    }



    public function store(Request $request){
        hasPermissions('create_social_channel_media');
        $request->validate([
            'social_icon' =>'required|image|mimes:png,jpg,jpeg,svg',
            'title' => 'required|string',
        ]);

        $media= SocialMediaChannel::create([
            'title' => $request->title ,
            'status' => $request->status ,
            'social_icon' => $this->upload($request->social_icon , 'social_media_channels'),
        ]);

        return redirect()->route('show_social_channel_settings')->with("success" ,"");
    }


    public function update(Request $request , SocialMediaChannel $media){
        hasPermissions('update_social_channel_media');
        $request->validate([
            'new_social_channel_icon' =>'nullable|image|mimes:png,jpg,jpeg,svg',
            'title' => 'required|string',
        ]);
        if($media){
            $media->update([
                'title' => $request->title,
                'status' => $request->status,
            ]);
        }

        if($request->hasFile('social_icon')){
            if(Storage::exists($media->social_icon)){
                Storage::delete($media->social_icon);
            }
            $media->update([
                'social_icon' => $this->upload($request->social_icon , 'social_media_channels')
            ]);

        }

        return redirect()->route('show_social_channel_settings')->with("success" ,"");
    }


    public function delete(SocialMediaChannel $media){
        hasPermissions('delete_social_channel_media');

        if($media){
            $media->delete();
        }

        return redirect()->route('show_social_channel_settings')->with("success" ,"");
    }










}
