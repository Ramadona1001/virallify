<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Orders\Models\Order;
use Pages\Models\Page;
use Plans\Models\Plan;
use Services\Models\Service;
use SocialMedia\Models\SocialMedia;
use Spatie\Permission\Models\Role;
use Translates\Models\Language;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('sendOtp');
    }

    public function index()
    {

        $users_count = User::count();
        $roles_count = Role::count();
        $languages_count = Language::count();
        $pages_count = Page::count();
        $services_count = Service::count();
        $plans_count = Plan::count();
        $social_media_count = SocialMedia::count();
        $orders_count = Order::count();

        $statistics  = [
            [transWord('Users'),$users_count,'<i class="fa fa-users"></i>',route('users')],
            [transWord('Roles'),$roles_count,'<i class="fa fa-lock"></i>',route('roles')],
            [transWord('Pages'),$pages_count,'<i class="fa fa-lock"></i>',route('roles')],
            [transWord('Services'),$services_count,'<i class="fa fa-lock"></i>',route('roles')],
            [transWord('Plans'),$plans_count,'<i class="fa fa-lock"></i>',route('roles')],
            [transWord('Orders'),$orders_count,'<i class="fa fa-lock"></i>',route('roles')],
            [transWord('Social Media'),$social_media_count,'<i class="fa fa-lock"></i>',route('roles')],
            [transWord('Languages'),$languages_count,'<i class="fa fa-globe"></i>',route('langs')],
        ];

        return view('dashboard.index',compact('statistics'));
    }

    public function dashboardProfile(){
        $profile = auth()->user();
        $roles = Role::all();
        $title = transWord('Dashboard Profile');
        $pages = [
            [transWord('Profile'),route('dashboard-profile')]
        ];

        return view('dashboard.profile',compact('profile' , 'title' , 'pages' , 'roles'));
    }


    public function updateProfile(Request $request){
      $profile = auth()->user();

        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($profile->id)->where(function ($query) {
                return $query->where('type','vendor');
            })],
        ]);

      if ($profile){
          $profile->update($request->all());
          return redirect()->back()->with('success' ,'');
      }
    }


    public function changePassword(Request $request){
        /*
         * enter current , new , confirmation password (3)
         * check if current password is correct !
         * if current password is correct check password & password confirmation if  they match  then update password
         */
        $profile = auth()->user();
        $request->validate([
            'password' => 'confirmed|min:6|max:255',
        ]);

        $current_password= $request->current_password;
        $password = $request->password;

        // check if current password is correct !
        if (Hash::check($current_password , $profile->password)){
            $profile->update([
                'password' => $password
            ]);
            return redirect()->back()->with('success' , '');
        }else{
            $errors[] = transWord('Current password is Wrong');
            return redirect()->back()->withErrors($errors)->with('fail','');
        }


    }


    public function deleteAccount(Request $request){
       $user = auth()->user();
        $password = $request->pass;
        if (Hash::check($password , $user->password)){
            $user->delete();
            return redirect()->back();
        }
    }


}
