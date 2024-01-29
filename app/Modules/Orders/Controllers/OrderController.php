<?php

namespace Orders\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use App\Models\User;
use App\Models\UserAddress;
use Properties\Models\PropertyPlan;
use Carbon\Carbon;
use CarTypes\Models\CarType;
use Clients\Models\Client;
use Illuminate\Http\Request;
use Orders\Models\Order;
use Plans\Models\UserPlan;
use Properties\Models\Property;
use Services\Models\Service;

class OrderController extends Controller
{
    public $path;
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Orders::';
    }

    public function index()
    {
//        hasPermissions('show_homepage_footer_links');
        $title = transWord('Orders');
        $pages = [
            [transWord('Orders'),'show_orders']
        ];

        $orders =Order::latest()->get();

        return view($this->path.'index',compact('orders','pages','title'));
    }


    public function  create(){
//        hasPermissions('update_homepage_footer_links');

        $title = transWord('Create Orders');
        $pages = [
            [transWord('Orders'),'show_orders']
        ];
        $car_types = CarType::all();
        $services = Service::all();
        $users = User::role('Client')->get();
        return view($this->path.'create',compact('pages','title','car_types','users','services'));
    }
    
    public function  edit(Order $order){
//        hasPermissions('update_homepage_footer_links');

        $title = transWord('Orders');
        $pages = [
            [transWord('Orders'),'show_orders']
        ];

        if($order){
            return view($this->path.'edit',compact('order','pages','title'));
        }
    }



    public function store(Request $request){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        Order::create([
            'car_type_id' => $request->car_type_id,
            'service_id' => $request->service_id,
            'user_plan_id'=> $request->user_plan_id,
            'order_date'=> $request->order_date,
            'order_time'=> $request->order_time,
            'client_id'=> $request->user_id,
            'user_address_id'=> $request->user_address_id,
            'total'=> Service::findOrfail($request->service_id)->price,
            // 'coupon'=> $request->coupon,
            'payment_method'=> ($request->user_plan_id != null) ? 'wallet' : 'cash',
        ]);

        $userPlan = UserPlan::where('id',$request->user_plan_id)->first();
        

        return redirect()->route('show_orders')->with("success" ,"");
    }


    public function update(Request $request , Order $order){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        if($order){
            $order->update($request->all());
            if($request->hasFile('image')){
                $file = $request->image;
                $order->update(
                    ['image'=>$this->upload($file,'orders')]
                );
            }
        }
        return redirect()->route('show_orders')->with("success" ,"");
    }


    public function delete(Order $order){
//        hasPermissions('delete_homepage_footer_links');

        if($order){
            $order->delete();
        }

        return redirect()->route('show_orders')->with("success" ,"");
    }
    
    public function usersPlans($id){
        return response()->json(UserPlan::where('user_id',$id)->where('wash_number','>','0')->with('plan')->get());
    }
    
    public function usersAddress($id){
        return response()->json(UserAddress::where('user_id',$id)->get());
    }











}
