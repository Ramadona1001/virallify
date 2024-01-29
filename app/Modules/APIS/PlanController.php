<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Models\User;
use Plans\Models\Plan;
use Plans\Models\UserPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    public function index(){
        $data = Plan::all();
        return response()->json([
            'success' => true,
            'message' => transWord("Plans"),
            'result' => $data,
        ],200);
    }
    
    public function users(){
        $plans = UserPlan::where('user_id',auth()->user()->id)->where('publish',1)->get();
        $data = [];
        foreach ($plans as $plan) {
            $data[] = [
                'id' => $plan->id,
                'plan_id' => $plan->plan->id,
                'plan_price' => $plan->plan->price,
                'user_id' => $plan->user->id,
                'wash_number' => $plan->wash_number,
                'publish' => $plan->publish,
            ];
        }
        return response()->json([
            'success' => true,
            'message' => transWord("Users Plans"),
            'result' => $data,
        ],200);
    }
    
    public function subscribePlan(Request $request){
        $customMessages = [
            'plan_id.required' => transWord('plan is required'),
            'plan_id.exists' => transWord('plan not found'),
        ];

        $validateData = Validator::make($request->all(), [
            "plan_id" => "required|exists:plans,id",
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }
        $plan = Plan::where('id',$request->plan_id)->first();
        if ($plan) {
            $user_plan = UserPlan::where('plan_id',$plan->id)
                                ->where('user_id',auth()->user()->id)
                                ->where('publish',1)
                                ->first();
            if (!$user_plan) {
                UserPlan::create([
                    'plan_id' => $plan->id,
                    'user_id' => auth()->user()->id,
                    'wash_number' => $plan->wash_number,
                    'publish' => 1,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => transWord("Subscription is done successfully"),
                    'result' => null,
                ],200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => transWord("Client is already subscribe in this plan"),
                    'result' => null,
                ],401);
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Plan is not found"),
                'result' => null,
            ],401);
        }
    }

    public function unSubscribePlan(Request $request){
        $customMessages = [
            'id.required' => transWord('plan is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "id" => "required",
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }
        $plan = UserPlan::where('id',$request->id)->first();
        if ($plan) {
            $plan->publish = 0;
            $plan->save();
            return response()->json([
                'success' => true,
                'message' => transWord("Unsubscription is done successfully"),
                'result' => null,
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Plan is not found"),
                'result' => null,
            ],401);
        }
    }

    public function changePlan(Request $request){
        $customMessages = [
            'id.required' => transWord('plan is required'),
            'plan_id.required' => transWord('plan is required'),
            'plan_id.exists' => transWord('plan not found'),
        ];

        $validateData = Validator::make($request->all(), [
            "id" => "required",
            "plan_id" => "required|exists:plans,id",
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }
        $plan = UserPlan::where('id',$request->id)->first();
        if ($plan) {
            $plan->plan_id = $request->plan_id;
            $plan->save();
            return response()->json([
                'success' => true,
                'message' => transWord("Subscription is changed successfully"),
                'result' => null,
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Plan is not found"),
                'result' => null,
            ],401);
        }
    }

}
