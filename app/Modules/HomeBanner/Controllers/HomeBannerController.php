<?php

namespace HomeBanner\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use HomeBanner\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class HomeBannerController extends Controller
{
    use uploadImage;

    public $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'HomeBanner::';
    }

    public function index()
    {
        hasPermissions('show_home_banner');
        $title = transWord('Home Banner');
        $pages = [
            [transWord('Home Banner'),'show_home_banner']
        ];

        $home_banner =HomeBanner::latest()->first();

        return view($this->path.'index',compact('home_banner','pages','title'));
    }






    public function store(Request $request){
        // hasPermissions('update_home_banner');
        $request->validate([
            'content.*' =>'required|string',
            'btn1_text.*' =>'required|string',
            'btn1_link.*' =>'required|string',
            'btn2_text.*' =>'required|string',
            'btn2_link.*' =>'required|string',
            'content.*' =>'required|string',
            'logo' => 'image|mimes:jpg,png,jpeg',
        ]);

        $home_banner= HomeBanner::create($request->all());

        if($request->hasFile('image')){
            $file = $request->image;
            $home_banner->update([
                'image' => $this->upload($file , 'home_banner')
            ]);
        }

        return redirect()->route('show_home_banner')->with("success" ,"");
    }




    public function update(Request $request , HomeBanner $home_banner){
        // hasPermissions('update_home_banner');
        $request->validate([
            'content.*' =>'required|string',
            'btn1_text.*' =>'required|string',
            'btn1_link.*' =>'required|string',
            'btn2_text.*' =>'required|string',
            'btn2_link.*' =>'required|string',
            'content.*' =>'required|string',
            'image' => 'image|mimes:jpg,png,jpeg',
        ]);


        $home_banner->update($request->all());

        if($request->hasFile('image')){
            $file = $request->image;

            $home_banner->update([
                'image' => $this->upload($file , 'home_banner')
            ]);
        }

        return redirect()->back()->with("success" ,"");
    }










}
