<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;
use App\Models\User;
use App\PayPal\PayPalAgreement;
use App\PayPal\PayPalSubscriptionPlan;
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
            'result' => PlanResource::collection($data),
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
                //Paypal
                $paypal_plan = new PayPalSubscriptionPlan();
                dd(1);
                $success_url = route('paypal.executeAgreement',[
                    'status' => "true",
                    'plan_id' => $plan->id,
                    'user_id' => auth()->user()->id,
                ]);
                $cancel_url = route('paypal.executeAgreement',[
                    'status' => "false",
                    'plan_id' => $plan->id,
                    'user_id' => auth()->user()->id,
                ]);
                $paypal_plan_id = $paypal_plan->create($plan->name,$plan->content,$plan->price,$success_url,$cancel_url);
                $paypal_plan->activate($paypal_plan_id->id);
                $agreement = new PayPalAgreement();
                $approval_url = $agreement->create($plan->name.' Agreement',$plan->name.' Agreement',$paypal_plan_id->id);
                // $agreement->executeAgreement(request('token'));

                return response()->json([
                    'success' => true,
                    'message' => transWord("Pay Link"),
                    'result' => $approval_url,
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
            $user_plan = UserPlan::where('plan_id',$request->plan_id)->where('user_id',auth()->user()->id)->first();
            if ($user_plan) {
                $user_plan->publish = 0;
                $user_plan->save();
                return response()->json([
                    'success' => true,
                    'message' => transWord("Unsubscription is done successfully"),
                    'result' => null,
                ],200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => transWord("User is not subscribed in this plan"),
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

    public function changePlan(Request $request){
        $customMessages = [
            'plan_id.required' => transWord('plan is required'),
            'plan_id.exists' => transWord('plan not found'),
            'changed_plan_id.required' => transWord('changed plan is required'),
            'changed_plan_id.exists' => transWord('changed plan not found'),
        ];

        $validateData = Validator::make($request->all(), [
            "plan_id" => "required|exists:plans,id",
            "changed_plan_id" => "required|exists:plans,id",
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
        $changed_plan = Plan::where('id',$request->changed_plan_id)->first();
        if ($plan && $changed_plan) {
            $user_plan = UserPlan::where('plan_id',$request->plan_id)->where('user_id',auth()->user()->id)->first();
            if ($user_plan) {
                $user_plan->plan_id = $changed_plan->id;
                $user_plan->save();
                return response()->json([
                    'success' => true,
                    'message' => transWord("Subscription is changed successfully"),
                    'result' => null,
                ],200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => transWord("User is not subscribed in this plan"),
                    'result' => null,
                ],401);
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Plan Or Changed Plan is not found"),
                'result' => null,
            ],401);
        }
    }

}
