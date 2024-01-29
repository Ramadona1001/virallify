<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use Services\Models\Service;

class ServiceController extends Controller
{
    public function index(){
        $data = Service::all();
        return response()->json([
            'success' => true,
            'message' => transWord("Services"),
            'result' => ServiceResource::collection($data),
        ],200);
    }

}
