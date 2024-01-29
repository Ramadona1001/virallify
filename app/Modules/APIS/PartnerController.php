<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\ServiceResource;
use Partners\Models\Partner;

class PartnerController extends Controller
{
    public function index(){
        $data = Partner::all();
        return response()->json([
            'success' => true,
            'message' => transWord("Partners"),
            'result' => PartnerResource::collection($data),
        ],200);
    }

}
