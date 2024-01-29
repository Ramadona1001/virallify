<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Trait\UploadImage;


class VendorAuthController extends Controller
{

    use UploadImage;

    public function index(){
        return view('sales-dashboard.vendor-index');
    }

    public function vendorLogin(){
        return view('auth.vendor-login');
    }

    public function handleLogin(Request $req)
    {
        $customMessages =[
            'email.required' => transWord('Email  is required'),
            'password.required' => transWord('Password is required'),
        ];
        $validateData = Validator::make($req->all(), [
            "email" => "required|email",
            "password" => "required|string",
        ] , $customMessages);

        if($validateData->fails()) {
            $errors = $validateData->errors();
            return redirect()->back()->with('errors' , $errors);
        }

        if(Auth::guard('vendor')
            ->attempt($req->only(['email', 'password'])))
        {
            return redirect()
                ->route('vendor.dashboard');
        }

        return redirect()
            ->back()
            ->withErrors([
                'credentials' => transWord('Credentials are wrong !')
            ]);
    }



    public function updateVendorProfile(Request $request){
        $user = Auth::guard('vendor')->user();
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required|unique:employees,email,'.$user->id,
            'mobile_number' => 'string|required|unique:employees,mobile_number,'.$user->id,
            'address' => 'string|required',
            'avatar' => 'image|mimes:jpg,png,jpeg',
            'country_id' => 'required',
            'city_id' => 'required',
            'area_id' => 'required',
        ]);


        $mobile_number = str_replace(' ', '', $request->mobile_number);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'area_id' => $request->area_id,
            'mobile_number' => $mobile_number,
        ]);


        if ($request->hasFile('avatar')){
            if(File::exists($user->avatar)){
                File::delete($user->avatar);
            }
            $user->update([
                'avatar' => $this->upload($request->avatar,'employees')
            ]);
        }

        toastify()->success(transWord('Profile has been updated successfully'));
        return redirect()->back()->with('success','');

    }


    public function changePassword(Request $request){
        $user = Auth::guard('vendor')->user();
        $old_password = $request->old_password;
        $new_password = $request->password;

        $customMessages =[
            'old_password.required' => transWord('old password is required'),
            'old_password.min' => transWord('old password must be 6 numbers at least'),
            'password.required' => transWord('new password is required'),
            'password.min' => transWord('new password must be 6 numbers at least'),
            'password.confirmed' => transWord('password must be the same (confirmed)'),
        ];
        $validateData = Validator::make($request->all(), [
            "old_password" => "required|string|min:6",
            "password" => "required|string|min:6|confirmed",
        ] , $customMessages);

        if($validateData->fails()) {
            $errors = $validateData->errors();
            return redirect()->back()->with('errors' , $errors);

        }

        // check if old password is correct !
        if (Hash::check($old_password , $user->password)){
            $new_password = Hash::make($new_password);
            $user->update([
                'password' => $new_password
            ]);

            toastify()->success(transWord('Password has been updated successfully'));
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors('wrong password');
        }

  }



    public function logout()
    {
        Auth::guard('vendor')
            ->logout();

        return redirect()
            ->route('vendor.login');
    }





}
