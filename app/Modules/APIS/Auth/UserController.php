<?php

namespace App\Modules\APIS\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Http\Trait\UploadImage;
use App\Models\User;
use Carbon\Carbon;
use Clients\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Otp;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    use UploadImage;

    public function login(Request $request){
        $customMessages = [
            'mobile_number.required' => transWord('mobile number is required'),
            'password.required' => transWord('password number is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "mobile_number" => "required",
            "password" => "required",
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }

        $mobile_number = $request->mobile_number;
        $password = $request->password;
        $device_token = $request->device_token;


        $client = User::where('mobile_number','=',$mobile_number)->first();

        $current = Carbon::now();

        if($client){  // check if client (mobile) exists in DB

            $checkCredentials =
                Auth::guard('app_user')
                    ->attempt([
                    'mobile_number' => $mobile_number,
                    'password' => $password
                ]);

            if($checkCredentials){  // check if credentials (mobile & password) is right
                $client->update([
                    'device_token' => $device_token,
                ]);

                // check if account is active
                if ($client->is_verified == 0){ //not active
                   

                    //get old otp code
                    $clientOtp = Otp::where([
                        ['mobile_number','=',$client->mobile_number],
                        [ 'type' , '=' , 'client'],
                        ['user_id' , '=' , $client->id]
                    ])->first();

                    // create OTP

                    if(empty($clientOtp)){ // there is no otp code , then create one
                    $clientOtp =  Otp::create([
                            'mobile_number' => $client->mobile_number,
                            'code' => rand(1000,9000),
                            'expired_at' => $current->addMinutes(3),
                            'user_id' => $client->id,
                            'type' => 'client'
                        ]);
                    }else{ // there is otp needs update
                        $clientOtp->update([
                            'mobile_number' => $client->mobile_number,
                            'code' => rand(1000,9000),
                            'expired_at' => $current->addMinutes(3),
                            'user_id' => $client->id,
                            'type' => 'client'
                        ]);
                    }


                    $data = new ClientResource($client);
                    return response()->json([
                        'success' => true,
                        'message' => transWord("resending otp code..,Please verify your account by OTP code to login"),
                        'token' => $client->createToken("API TOKEN")->plainTextToken,
                        'otp_code' => $clientOtp->code,
                        'otp_expire' => $clientOtp->expired_at,
                        'result' => $data,
                    ],200);

                }
                else{ // user is active

                    $data = new ClientResource($client);
                    return response()->json([
                        'success' => true,
                        'message' => transWord("Login Successfully"),
                        'token' => $client->createToken("API TOKEN")->plainTextToken,
                        'result' => $data,
                    ],200);
                }

            }else{ // credentials are wrong
                return response()->json([
                    'success' => false,
                    'message' => transWord("Mobile Or Password is wrong"),
                    'result' => null,
                ],401);
            }

        }
    }

    public function otp(Request $request){
        $customMessages = [
            'code.required' => transWord('code is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "code" => "required|exists:otps,code",
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }

        $clientOtp = Otp::where([
            ['mobile_number','=',auth()->user()->mobile_number],
            [ 'type' , '=' , 'client'],
            ['user_id' , '=' , auth()->user()->id],
            ['code' , '=' , $request->code]
        ])->first();

        if ($clientOtp) {
            $user = User::where('id',auth()->user()->id)->first();
            $user->is_verified = 1;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => transWord("OTP verification is done successfully"),
                'result' => null,
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("OTP is wrong, please try again"),
                'result' => null,
            ],401);
        }
    }
    
    public function logout(){
        auth()->guard('app_user')->logout();
        return response()->json([
            'success' => true,
            'message' => transWord("Logout is done successfully"),
            'result' => null,
        ],200);
    }

    public function createNewAccount(Request $request){
        $customMessages = [
            'name.required' => transWord('name is required'),
            'avatar.mimes' => transWord('avatar should be png,jpg,jpeg,svg,webp'),
            'mobile_number.required' => transWord('mobile number is required'),
            'password.required' => transWord('password number is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "name" => "required",
            "avatar" => "mimes:png,jpg,jpeg,svg,webp",
            "mobile_number" => "required|unique:users,mobile_number",
            "password" => "required",
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }

        $client = User::create([
            'name' => $request->name,
            'type' => 'client',
            'mobile_number' => $request->mobile_number,
            'password' => \Hash::make($request->password),
            'type' => 'client',
            'publish' => 1, 
            'is_verified' => 0 // default:0 => change after check otp code
        ]);

        if($request->hasFile('avatar')){
            $file = $request->avatar;
            $client->avatar = $this->upload($file,'users');
        }

        // $current = Carbon::now();
        // $otp = Otp::create([
        //     'mobile_number' => $client->mobile_number,
        //     'code' => rand(1000, 9000),
        //     'expired_at' => $current->addMinutes(3),
        //     'type' => 'client',
        //     'user_id' => $client->id
        // ]);

        $data = new ClientResource($client);
        return response()->json([
            'success' => true,
            'message' => transWord("Register new user successfully! , please verify your account by OTP"),
            'token' => $client->createToken("API TOKEN")->plainTextToken,
            'result' => $data,
            // 'otp_code' => $otp->code
        ],200);
    }

    public function clientLogout(){
        if (Auth::guard('app_user')->check()) {
            Auth::guard('app_user')->user()->token()->delete();
        }
        return response()->json([
            'success' => true,
            'message' => transWord("Successful Logout"),
            'result' => null
        ],200);

    }

    public function addresses(){
        $addresses = UserAddress::where('user_id',auth()->guard('app_user')->user()->id)->get();
        return response()->json([
            'success' => true,
            'result' => $addresses,
            'message' => transWord("Client Addresses"),
        ],200);
    }

    public function addAddress(Request $request){

        $customMessages = [
            'street_name.required' => transWord('street name is required'),
            'building_no.required' => transWord('building number is required'),
            'floor_no.required' => transWord('floor number is required'),
            'address_type.required' => transWord('address type is required'),
            'lat.required' => transWord('lat is required'),
            'long.required' => transWord('long is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "street_name" => "required",
            "building_no" => "required",
            "floor_no" => "required",
            "address_type" => "required",
            "lat" => "required",
            "long" => "required",
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }

        UserAddress::create([
            "street_name" => $request->street_name,
            "building_no" => $request->building_no,
            "floor_no" => $request->floor_no,
            "address_type" => $request->address_type,
            "lat" => $request->lat,
            "long" => $request->long,
            'user_id' => auth()->guard('app_user')->user()->id
        ]);

        return response()->json([
            'success' => true,
            'message' => transWord("Address is added successfully"),
        ],200);
    }
    
    public function updateAddress(Request $request){

        $customMessages = [
            'address_id.required' => transWord('address is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "address_id" => "required",
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }

        $address = UserAddress::where('id',$request->address_id)->first();
        if ($address) {
            if($request->street_name != null){
                $address->update([
                    'street_name' => $request->street_name
                ]);
            }
            if($request->building_no != null){
                $address->update([
                    'building_no' => $request->building_no
                ]);
            }
            if($request->floor_no != null){
                $address->update([
                    'floor_no' => $request->floor_no
                ]);
            }
            if($request->address_type != null){
                $address->update([
                    'address_type' => $request->address_type
                ]);
            }
            if($request->lat != null){
                $address->update([
                    'lat' => $request->lat
                ]);
            }
            if($request->long != null){
                $address->update([
                    'long' => $request->long
                ]);
            }
            return response()->json([
                'success' => true,
                'message' => transWord("Address is updated successfully"),
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Address not found"),
            ],401);
        }
    }
    
    public function deleteAddress(Request $request){

        $customMessages = [
            'address_id.required' => transWord('address is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "address_id" => "required",
        ],$customMessages);

        if($validateData->fails()){
            $errors = $validateData->errors();
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'results' => null
            ],401);
        }

        $address = UserAddress::where('id',$request->address_id)->first();
        if ($address) {
            $address->delete();
            return response()->json([
                'success' => true,
                'message' => transWord("Address is deleted successfully"),
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Address not found"),
            ],401);
        }
    }

}
