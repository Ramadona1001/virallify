<?php

namespace App\Modules\APIS;

use AboutSections\Models\AboutSection;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutSectionCollection;
use App\Http\Resources\PageCollection;
use MainSettings\Models\MainSetting;
use Pages\Models\Page;
use Services\Models\Service;

class PageController extends Controller
{
    public function about(){
        $page = Page::where('slug','about-us')->first();
        $about = AboutSection::orderBy('order_no','asc')->get();
        if ($page) {
            return response()->json([
                'success' => true,
                'message' => $page->title,
                'result' => new PageCollection($page),
                'sections' => AboutSectionCollection::collection($about),
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Page Not Found"),
                'result' => null,
            ],200);
        }
    }
    
    public function termsConditions(){
        $page = Page::where('slug','terms-conditions')->first();
        if ($page) {
            return response()->json([
                'success' => true,
                'message' => $page->title,
                'result' => new PageCollection($page),
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Page Not Found"),
                'result' => null,
            ],200);
        }
    }
    
    public function privacyPolicy(){
        $page = Page::where('slug','privacy-policy')->first();
        if ($page) {
            return response()->json([
                'success' => true,
                'message' => $page->title,
                'result' => new PageCollection($page),
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Page Not Found"),
                'result' => null,
            ],200);
        }
    }

}
