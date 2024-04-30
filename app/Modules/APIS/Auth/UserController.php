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
            'email.required' => transWord('email is required'),
            'email.email' => transWord('email is not valid'),
            'password.required' => transWord('password number is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "email" => "required|email",
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

        $email = $request->email;
        $password = $request->password;


        $client = User::where('email','=',$email)->first();

        $current = Carbon::now();

        if($client){  // check if client (mobile) exists in DB

            $checkCredentials =
                Auth::guard('app_user')
                    ->attempt([
                    'email' => $email,
                    'password' => $password
                ]);

            if($checkCredentials){  // check if credentials (mobile & password) is right
                
                $data = new ClientResource($client);
                return response()->json([
                    'success' => true,
                    'message' => transWord("Login Successfully"),
                    'token' => $client->createToken("API TOKEN")->plainTextToken,
                    'result' => $data,
                ],200);


            }else{ // credentials are wrong
                return response()->json([
                    'success' => false,
                    'message' => transWord("Mobile Or Password is wrong"),
                    'result' => null,
                ],401);
            }

        }else{
            return response()->json([
                'success' => false,
                'message' => transWord("Login Failed"),
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
            'email.required' => transWord('email is required'),
            'password.required' => transWord('password number is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "name" => "required",
            "avatar" => "mimes:png,jpg,jpeg,svg,webp",
            "email" => "required|unique:users",
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
            'mobile_number' => $request->mobile,
            'type' => 'client',
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'type' => 'client',
            'publish' => 1, 
            'is_verified' => 0 // default:0 => change after check otp code
        ]);

        if($request->hasFile('avatar')){
            $file = $request->avatar;
            $client->avatar = $this->upload($file,'users');
        }


        $data = new ClientResource($client);
        return response()->json([
            'success' => true,
            'message' => transWord("Register new user successfully!"),
            'token' => $client->createToken("API TOKEN")->plainTextToken,
            'result' => $data,
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

}
