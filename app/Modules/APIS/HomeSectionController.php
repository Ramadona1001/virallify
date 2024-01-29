<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Http\Resources\HomeBannerCollection;
use App\Http\Resources\HomeSectionCollection;
use Carbon\Carbon;
use HomeBanner\Models\HomeBanner;
use HomeSections\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeSectionController extends Controller
{
    public function banner(){
        $data = HomeBanner::first();
        return response()->json([
            'success' => true,
            'message' => transWord("Home Banner"),
            'result' => new HomeBannerCollection($data),
        ],200);
    }
    
    public function index(){
        $data = HomeSection::orderBy('order_no','asc')->get();
        return response()->json([
            'success' => true,
            'message' => transWord("Home Sections"),
            'result' => HomeSectionCollection::collection($data),
        ],200);
    }

}
