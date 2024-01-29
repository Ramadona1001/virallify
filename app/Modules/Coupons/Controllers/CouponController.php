<?php

namespace Coupons\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use Properties\Models\PropertyPlan;
use Carbon\Carbon;
use Clients\Models\Client;
use Illuminate\Http\Request;
use Coupons\Models\Coupon;
use Properties\Models\Property;

class CouponController extends Controller
{
    public $path;
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Coupons::';
    }

    public function index()
    {
//        hasPermissions('show_homepage_footer_links');
        $title = transWord('Coupons');
        $pages = [
            [transWord('Coupons'),'show_coupons']
        ];

        $coupons =Coupon::latest()->get();

        return view($this->path.'index',compact('coupons','pages','title'));
    }


    public function  edit(Coupon $coupon){
//        hasPermissions('update_homepage_footer_links');

        $title = transWord('Coupons');
        $pages = [
            [transWord('Coupons'),'show_coupons']
        ];

        if($coupon){
            return view($this->path.'edit',compact('coupon','pages','title'));
        }
    }



    public function store(Request $request){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        $coupon= Coupon::create($request->all());
        if($request->hasFile('image')){
            $file = $request->image;
            $coupon->update(
                ['image'=>$this->upload($file,'coupons')]
            );
        }

        return redirect()->route('show_coupons')->with("success" ,"");
    }


    public function update(Request $request , Coupon $coupon){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        if($coupon){
            $coupon->update($request->all());
            if($request->hasFile('image')){
                $file = $request->image;
                $coupon->update(
                    ['image'=>$this->upload($file,'coupons')]
                );
            }
        }
        return redirect()->route('show_coupons')->with("success" ,"");
    }


    public function delete(Coupon $coupon){
//        hasPermissions('delete_homepage_footer_links');

        if($coupon){
            $coupon->delete();
        }

        return redirect()->route('show_coupons')->with("success" ,"");
    }











}
