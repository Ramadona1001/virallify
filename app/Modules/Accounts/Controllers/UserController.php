<?php

namespace Accounts\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Hash;
use Plans\Models\Plan;
use Plans\Models\UserPlan;

class UserController extends Controller
{
    public $path;
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Accounts::Users.';
    }

    public function index()
    {
        hasPermissions('show_users');
        $title = transWord('Users');
        $pages = [
            [transWord('Users'),'users']
        ];
        $users = User::all();
        return view($this->path.'index',compact('users','pages','title'));
    }

    public function create()
    {
        hasPermissions('create_users');
        $title = transWord('Create New User');
        $pages = [
            [transWord('Users'),route('users')],
            [transWord('Create New User'),route('create_users')]
        ];
        $roles = Role::all();
        return view($this->path.'create',compact('roles','pages','title'));
    }

    public function store(Request $request)
    {
        hasPermissions('create_users');
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'unique:users,email|required|email',
            'mobile_number' => 'unique:users,mobile_number|required',
            'password' => 'required|confirmed|min:6|max:255',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->password = Hash::make($request->password);

        if($request->hasFile('avatar')){
            $file = $request->avatar;
            $user->avatar = $this->upload($file,'users');
        }

        $user->save();

        foreach ($request->roles as $role) {
            $roleName = Role::findOrfail($role);
            $user->assignRole($roleName->name);
        }

        return redirect()->route('users')->with('success');
    }

    public function show(User $user)
    {
        hasPermissions('show_users');
        $title =transWord('Show User Data');
        $pages = [
            [transWord('Users'),route('users')],
            [$user->name,'']
        ];
        return view($this->path.'show',compact('user','pages','title'));
    }

    public function edit(User $user)
    {
        hasPermissions('update_users');
        $title =transWord('Edit User Data');
        $pages = [
            [transWord('Users'),route('users')],
            [$user->name,route('show_users',$user->id)]
        ];
        $roles = Role::all();
        return view($this->path.'edit',compact('user','roles','pages','title'));
    }

    public function profile()
    {
        $title =transWord('Edit My Profile');
        $user = auth()->user();
        $pages = [
            [transWord('My Profile'),''],
        ];
        $roles = Role::all();
        return view($this->path.'profile',compact('user','roles','pages','title'));
    }

    public function update(User $user,Request $request)
    {
        hasPermissions('update_users');
        if ($request->password) {
            $request->validate([
                'name' => 'required|min:2|max:255',
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'mobile_number' => ['required', Rule::unique('users')->ignore($user->id)],
                'password' => 'confirmed|min:6|max:255',
            ]);
        }else{
            $request->validate([
                'name' => 'required|min:2|max:255',
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)->where(function ($query) {
                    return $query->where('type','vendor');
                })],
            ]);
        }

        if($request->hasFile('avatar')){
            $file = $request->avatar;
            $user->avatar = $this->upload($file,'users');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        if (isset($request->roles)) {
            $user->roles()->detach();
            foreach ($request->roles as $role) {
                $roleName = Role::findOrfail($role);
                $user->assignRole($roleName->name);
            }
        }

        return redirect()->route('users')->with('success','');
    }

    public function destroy(User $user)
    {
        hasPermissions('delete_users');
        $user->delete();
        return redirect()->route('users')->with('success','');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function verify(User $user,$status)
    {
        hasPermissions('verify_users');
        $user->is_verified = $status;
        $user->save();
        return redirect()->route('users')->with('success','');
    }
    
    public function active(User $user,$status)
    {
        hasPermissions('verify_users');
        $user->publish = $status;
        $user->save();
        return redirect()->route('users')->with('success','');
    }

    public function plans(User $user)
    {
        hasPermissions('users_plans');
        $title =transWord('User Plans');
        $pages = [
            [transWord('My Profile'),''],
        ];
        $user_plans = UserPlan::where('user_id',$user->id)->get();
        $plans = Plan::whereNotIn('id',UserPlan::where('user_id',$user->id)->pluck('plan_id'))->get();
        return view($this->path.'plans',compact('user','plans','pages','title','user_plans'));
    }
    
    public function assignPlan(Request $request)
    {
        hasPermissions('users_plans');
        $check = UserPlan::where('user_id',$request->user_id)->where('plan_id',$request->plan_id)->first();
        if (!$check) {
            UserPlan::create([
                'user_id' => $request->user_id,
                'plan_id' => $request->plan_id,
                'wash_number' => Plan::where('id',$request->plan_id)->first()->wash_number,
            ]);
            return back()->with("success" ,"");
        }else{
            return back()->with("fail" ,"");
        }
    }
    
    public function addresses(User $user)
    {
        $title =transWord('User Addresses');
        $pages = [
            [transWord('User Addresses'),''],
        ];
        $user_address = UserAddress::where('user_id',$user->id)->get();
        return view($this->path.'address',compact('user','pages','title','user_address'));
    }
    
    public function storeAddresses(Request $request)
    {
        $request->validate([
            'street_name' => 'required',
            'building_no' => 'required',
            'floor_no' => 'required',
            'flat_no' => 'required',
            'address_type' => 'required',
        ]);

        UserAddress::create([
            'user_id' => $request->user_id,
            'street_name' => $request->street_name,
            'building_no' => $request->building_no,
            'floor_no' => $request->floor_no,
            'flat_no' => $request->flat_no,
            'address_type' => $request->address_type,
            'lat' => $request->lat,
            'long' => $request->long,
        ]);

        return back()->with("success" ,"");
    }

    public function deleteAddress(UserAddress $address)
    {
        $address->delete();
        return back()->with("success" ,"");
    }
}
