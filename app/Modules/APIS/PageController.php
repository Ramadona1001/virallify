<?php

namespace App\Modules\APIS;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageCollection;
use App\Http\Resources\SectionCollection;
use Pages\Models\Page;
use Sections\Models\Section;

class PageController extends Controller
{
    public function page($slug){
        $page = Page::where('slug',$slug)->first();
        $data = Section::where('type',$slug)->orderBy('order_no','asc')->get();
        if ($page) {
            return response()->json([
                'success' => true,
                'message' => $page->title,
                'result' => new PageCollection($page),
                'sections' => SectionCollection::collection($data),
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
