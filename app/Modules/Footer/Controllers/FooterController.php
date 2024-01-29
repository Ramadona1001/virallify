<?php

namespace Footer\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use Footer\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class FooterController extends Controller
{
    use uploadImage;

    public $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Footer::';
    }

    public function index()
    {
        hasPermissions('show_homepage_footer');
        $title = transWord('Footer Settings ');
        $pages = [
            [transWord('Footer Settings'),'show_footer']
        ];

        $footer =Footer::latest()->first();

        return view($this->path.'index',compact('footer','pages','title'));
    }






    public function store(Request $request){
        // hasPermissions('update_homepage_footer');
        $request->validate([
            'content.*' =>'required|string',
            'logo' => 'image|mimes:jpg,png,jpeg',
        ]);

        $footer= Footer::create($request->all());

        if($request->hasFile('logo')){
            $file = $request->logo;
            $footer->update([
                'logo' => $this->upload($file , 'footer')
            ]);
        }

        return redirect()->route('show_footer')->with("success" ,"");
    }




    public function update(Request $request , Footer $footer){
        // hasPermissions('update_homepage_footer');
        $request->validate([
            'content.*' =>'required|string',
            'logo' => 'image|mimes:jpg,png,jpeg',
        ]);

        $footer->update($request->all());

        if($request->hasFile('logo_img')){
            $file = $request->logo_img;
            if(File::exists($footer->logo)){
                File::delete($footer->logo);
            }

            $footer->update([
                'logo' => $this->upload($file , 'footer')
            ]);
        }

        return redirect()->back()->with("success" ,"");
    }










}
