<?php

namespace App\Modules\APIS;
use App\Http\Controllers\Controller;
use App\Models\User;
use Plans\Models\Plan;
use Plans\Models\UserPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Orders\Models\Order;
use Services\Models\Service;

class OrderController extends Controller
{
    public function orders(){
        $data = Order::where('client_id',auth()->user()->id)->get();
        return response()->json([
            'success' => true,
            'message' => transWord("All Orders"),
            'result' => $data,
        ],200);
    }
    
    public function makeOrder(Request $request){
        $customMessages = [
            'user_plan_id.exists' => transWord('plan not found'),
            'service_id.exists' => transWord('service not found'),
            'car_type_id.exists' => transWord('car type not found'),
            'car_type_id.required' => transWord('car type is required'),
            'user_address_id.required' => transWord('user address is required'),
            'user_address_id.exists' => transWord('user address not found'),
            'order_date.required' => transWord('order date is required'),
            'order_time.required' => transWord('order time is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "user_plan_id" => "exists:users_plans,user_plan_id",
            "service_id" => "exists:services",
            "car_type_id" => "required|exists:car_types",
            "user_address_id" => "required|exists:users_addresses",
            "order_date" => 'required',
            "order_time" => 'required',
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }

        if ($request->service_id != null) {
            Order::create([
                'car_type_id' => $request->car_type_id,
                'service_id' => $request->service_id,
                'client_id' => auth()->user()->id,
                'user_address_id' => $request->user_address_id,
                'order_date' => $request->order_date,
                'order_time' => $request->order_time,
                'order_status' => "pending",
                'payment_status' => "un paid",
                'total' => Service::where('id',$request->service_id)->first()->price,
                'payment_method' => null,
            ]);
        }
        if ($request->user_plan_id != null) {
            $user_plan = UserPlan::where('id',$request->user_plan_id)->first();
            if ($user_plan->wash_number > 0) {
                Order::create([
                    'car_type_id' => $request->car_type_id,
                    'user_plan_id' => $user_plan->id,
                    'client_id' => auth()->user()->id,
                    'user_address_id' => $request->user_address_id,
                    'order_date' => $request->order_date,
                    'order_time' => $request->order_time,
                    'order_status' => "pending",
                    'payment_status' => "paid",
                    'payment_method' => "wallet",
                ]);
                $user_plan->wash_number = $user_plan->wash_number - 1;
                $user_plan->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => transWord("Order is done successfully"),
            'result' => null,
        ],200);
    }
    
    public function cancelOrder(Request $request){
        $customMessages = [
            'order_id.required' => transWord('order is required'),
            'order_id.exists' => transWord('order not found'),
        ];

        $validateData = Validator::make($request->all(), [
            "order_id" => "required|exists:plans",
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }
        $order = Order::findOrfail($request->order_id);
        $currentDateTime = time();
        $targetDateTime = strtotime($order->order_date.' '.$order->order_time) + 6 * 3600;
        if ($currentDateTime == $targetDateTime) {
            $order->order_status = 'canceled';
            $order->save();
            return response()->json([
                'success' => true,
                'message' => transWord("Order is canceled successfully"),
                'result' => null,
            ],200);
        } else {
            return response()->json([
                'success' => false,
                'message' => transWord("You can not cancel this order"),
                'result' => null,
            ],200);
        }
    }
    
    public function updateOrder(Request $request){
        $customMessages = [
            'order.exists' => transWord('order not found'),
            'order.required' => transWord('order is required'),
            'plan_id.exists' => transWord('plan not found'),
            'service_id.exists' => transWord('service not found'),
            'car_type_id.exists' => transWord('car type not found'),
            'car_type_id.required' => transWord('car type is required'),
            'user_address_id.required' => transWord('user address is required'),
            'user_address_id.exists' => transWord('user address not found'),
            'order_date.required' => transWord('order date is required'),
            'order_time.required' => transWord('order time is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "order_id" => "required|exists:orders",
            "plan_id" => "exists:users_plans",
            "service_id" => "exists:services",
            "car_type_id" => "required|exists:car_types",
            "user_address_id" => "required|exists:users_addresses",
            "order_date" => 'required',
            "order_time" => 'required',
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }

        $order = Order::findOrfail($request->order_id);

        if ($request->service_id != null) {
            if ($order->payment_method == 'wallet') {
                $user_plan = UserPlan::where('id',$order->user_plan_id)->first();
                if ($user_plan) {
                    $user_plan->wash_number = $user_plan->wash_number + 1;
                    $user_plan->save();
                }
            }

            $order->update([
                'car_type_id' => $request->car_type_id,
                'service_id' => $request->service_id,
                'client_id' => auth()->user()->id,
                'user_address_id' => $request->user_address_id,
                'order_date' => $request->order_date,
                'order_time' => $request->order_time,
                'order_status' => "pending",
                'payment_status' => "un paid",
                'total' => Service::where('id',$request->service_id)->first()->price,
                'payment_method' => null,
            ]);
        }
        if ($request->plan_id != null) {
            $user_plan = UserPlan::where('id',$request->plan_id)->first();
            if ($user_plan->wash_number > 0) {
                $order->update([
                    'car_type_id' => $request->car_type_id,
                    'user_plan_id' => $user_plan->id,
                    'client_id' => auth()->user()->id,
                    'user_address_id' => $request->user_address_id,
                    'order_date' => $request->order_date,
                    'order_time' => $request->order_time,
                    'order_status' => "pending",
                    'payment_status' => "paid",
                    'payment_method' => "wallet",
                ]);
                $user_plan->wash_number = $user_plan->wash_number - 1;
                $user_plan->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => transWord("Order is updated successfully"),
            'result' => null,
        ],200);
    }

    public function getSingleOrder($id){
        
        $order = Order::where('id',$id)->first();
        if ($order) {
            return response()->json([
                'success' => true,
                'message' => transWord("Order Data"),
                'result' => $order,
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Order Not Found"),
                'result' => null,
            ],200);
        }
    }

   

}
