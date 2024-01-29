<?php

namespace App\Modules\APIS;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainSettingCollection;
use ContactUs\Models\Contact;
use MainSettings\Models\MainSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(){
        $main_settings = MainSetting::first();
        if ($main_settings) {
            return response()->json([
                'success' => true,
                'message' => transWord('Contact Us'),
                'result' => new MainSettingCollection($main_settings),
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Page Not Found"),
                'result' => null,
            ],200);
        }
    }

    public function contact(Request $request){
        $customMessages = [
            'name.required' => transWord('card holder name is required'),
            'email.required' => transWord('credit card number is required'),
            'email.email' => transWord('credit card number is required'),
            'subject.required' => transWord('credit card number is already exists'),
            'message.required' => transWord('credit card number is not valid'),
        ];
        $validatorRequest = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ],$customMessages);

        if($validatorRequest->fails()){
            return response()->json([
                'status' => false,
                'message' => transWord('validation error'),
                'errors' => $validatorRequest->errors()
            ], 401);
        }

        Contact::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => transWord('Contact Us Send Successfully'),
            'result' => null,
        ],200);
    }
}
