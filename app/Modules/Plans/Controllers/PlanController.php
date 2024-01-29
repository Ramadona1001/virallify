<?php

namespace Plans\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Plans\Models\Plan;
use Plans\Models\UserPlan;

class PlanController extends Controller
{
    public $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Plans::';
    }

    public function index()
    {
//        hasPermissions('show_homepage_footer_links');
        $title = transWord('Plans');
        $pages = [
            [transWord('Plans'),'show_plans']
        ];

        $plans =Plan::latest()->get();
        $users = User::role('Client')->get();
        return view($this->path.'index',compact('plans','pages','title','users'));
    }
 
    public function  edit(Plan $plan){
//        hasPermissions('update_homepage_footer_links');

        $title = transWord('Plans');
        $pages = [
            [transWord('Plans'),'show_plans']
        ];

        if($plan){
            return view($this->path.'edit',compact('plan','pages','title'));

        }
    }



    public function store(Request $request){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
            'price' => 'required',
        ]);


        $plan= Plan::create($request->all());

        return redirect()->route('show_plans')->with("success" ,"");
    }


    public function update(Request $request , Plan $plan){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
            'price' => 'required',
        ]);

        if($plan){
            $plan->update($request->all());
        }
        return redirect()->route('show_plans')->with("success" ,"");
    }


    public function delete(Plan $plan){
//        hasPermissions('delete_homepage_footer_links');

        if($plan){
            $plan->delete();
        }

        return redirect()->route('show_plans')->with("success" ,"");
    }
    
    public function users(Plan $plan){
        $title = transWord('Users Plans');
        $pages = [
            [transWord('Plans'),route('show_plans')],
            [transWord('Users Plans'),''],
        ];
        if($plan){
            $users_plans = UserPlan::where('plan_id',$plan->id)->get();
            return view($this->path.'users',compact('users_plans','pages','title'));
        }
    }
    
    public function addUserPlan(Request $request){
        foreach ($request->users as $user) {
            $check = UserPlan::where('plan_id',$request->plan)->where('user_id',$user)->first();
            if (!$check) {
                UserPlan::create([
                    'user_id' => $user,
                    'plan_id' => $request->plan,
                    'wash_number' => Plan::where('id',$request->plan)->first()->wash_number,
                ]);
            }
        }
        return redirect()->route('show_plans')->with("success" ,"");
    }
    
    public function removeUserPlan(UserPlan $user_plan){
        
        if($user_plan){
            $user_plan->delete();
        }

        return back()->with("success" ,"");
    }








}
