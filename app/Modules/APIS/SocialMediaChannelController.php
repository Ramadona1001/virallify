<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SocialMediaChannelResource;
use Services\Models\Service;
use SocialMediaChannel\Models\SocialMediaChannel;

class SocialMediaChannelController extends Controller
{
    public function index(){
        $data = SocialMediaChannel::all();
        return response()->json([
            'success' => true,
            'message' => transWord("Social Media Channels"),
            'result' => SocialMediaChannelResource::collection($data),
        ],200);
    }

}
