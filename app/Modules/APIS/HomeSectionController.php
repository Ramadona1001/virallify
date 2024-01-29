<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Http\Resources\HomeBannerCollection;
use App\Http\Resources\SectionCollection;
use Carbon\Carbon;
use HomeBanner\Models\HomeBanner;
use HomeSections\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Sections\Models\Section;

class HomeSectionController extends Controller
{
    public function index(){
        $banner = HomeBanner::first();
        $data = Section::where('type','home')->orderBy('order_no','asc')->get();
        return response()->json([
            'success' => true,
            'message' => transWord("Home Data"),
            'result' => new HomeBannerCollection($banner),
            'sections' => SectionCollection::collection($data)
        ],200);
    }
}
