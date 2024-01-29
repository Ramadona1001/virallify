<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Http\Resources\FAQResource;
use App\Http\Resources\ServiceResource;
use FaqSection\Models\FaqSetting;
use Services\Models\Service;

class FaqController extends Controller
{
    public function index(){
        $data = FaqSetting::where('publish',1)->get();
        return response()->json([
            'success' => true,
            'message' => transWord("FAQ"),
            'result' => FAQResource::collection($data),
        ],200);
    }

}
