<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutSectionCollection;
use Carbon\Carbon;
use AboutSections\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AboutSectionController extends Controller
{
    public function index(){
        $data = AboutSection::orderBy('order_no','asc')->get();
        return response()->json([
            'success' => true,
            'message' => transWord("About Sections"),
            'result' => AboutSectionCollection::collection($data),
        ],200);
    }

}
