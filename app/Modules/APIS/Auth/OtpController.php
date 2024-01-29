<?php

namespace App\Modules\APIS\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Modules\APIS\ApiResponse;
use Carbon\Carbon;
use Clients\Models\Client;
use Illuminate\Http\Request;

use Otps\Models\Otp;

class OtpController extends Controller
{

    use ApiResponse;

    // Check OTP Code
    public function checkOTP(Request $request){
        $otpCode = $request->otp_code;
        $current = Carbon::now();

        $otp = Otp::where('code',$otpCode)->first();

        if (!$otp || $otp->expired_at < $current) {
            return $this->customResponse('failed', transWord('Invalid OTP Code'), null, 400);
        }else{
            $client = Client::where('id' , '=' , $otp->client_id)->first();
            $client->update([
                'is_user' => 1,
                'status' => 1,
                'device_token' => $request->device_token ? $request->device_token : $client->device_token
            ]);
            $data = new ClientResource($client);
            return  $this->customResponse('success',
                transWord('OTP Code is valid (Account is Activated) , Login Successfully'),$data ,200);
        }
    }









}
