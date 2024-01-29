<?php

namespace App\Modules\APIS\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\User;
use Carbon\Carbon;
use Clients\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Otp;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function addresses(){
        $addresses = UserAddress::where('user_id',auth()->user()->id)->get();
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
            'address_type.in' => transWord('address should be home or work'),
            'lat.required' => transWord('lat is required'),
            'long.required' => transWord('long is required'),
        ];

        $validateData = Validator::make($request->all(), [
            "street_name" => "required",
            "building_no" => "required",
            "floor_no" => "required",
            "address_type" => "required|in:1,2",
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
            'user_id' => auth()->user()->id
        ]);

        return response()->json([
            'success' => true,
            'message' => transWord("Address is added successfully"),
        ],200);
    }
    
    public function updateAddress(Request $request){

        $customMessages = [
            'address_id.required' => transWord('address is required'),
            // 'address_type.in' => transWord('address should be home or work'),
        ];

        $validateData = Validator::make($request->all(), [
            "address_id" => "required",
            // 'address_type' => 'in:1,2'
            
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
