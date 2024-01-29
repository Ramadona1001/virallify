<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Http\Resources\FooterContactResource;
use App\Http\Resources\FooterInfoResource;
use App\Http\Resources\FooterLinksResource;
use App\Http\Resources\FooterSocialResource;
use App\Http\Resources\HomeSectionCollection;
use Carbon\Carbon;
use Footer\Models\Footer;
use HomeSections\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MainSettings\Models\MainSetting;
use SocialMedia\Models\SocialMedia;

class FooterController extends Controller
{
    public function index(){
        $footer_info = Footer::first();
        $socials = SocialMedia::latest()->get();
        $contact = MainSetting::select('email' , 'mobile')->first();


        return response()->json([
            'success' => true,
            'message' => transWord('Return footer data'),
            'result' => [
                'footer_info' => new FooterInfoResource($footer_info) ,
                'contact' => new FooterContactResource($contact),
                'social_media' => FooterSocialResource::collection($socials)
            ]
        ],200);
    }

}
