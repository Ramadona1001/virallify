<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\Providers\FacebookRepository;
use Laravel\Socialite\Facades\Socialite;
use Youtube;

class SocialController extends Controller
{
 
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->user();
        dd($user);
    }

    public function youtube()
    {
        return view('youtube.index');
    }
    
    public function uploadYoutube(Request $request)
    {
        $video = Youtube::upload($request->file('video')->getPathName(), [
            'title'       => $request->input('title'),
            'description' => $request->input('description')
        ])->withThumbnail($request->file('image')->getPathName());
 
        return "Video is uploaded successfully. Video ID is ". $video->getVideoId();
    }

}

