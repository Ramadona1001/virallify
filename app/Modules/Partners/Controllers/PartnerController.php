<?php

namespace Partners\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use Illuminate\Http\Request;
use Partners\Models\Partner;

class PartnerController extends Controller
{
    public $path;
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Partners::';
    }

    public function index()
    {
//        hasPermissions('show_homepage_footer_links');
        $title = transWord('Partners');
        $pages = [
            [transWord('Partners'),'show_partners']
        ];

        $partners =Partner::latest()->get();

        return view($this->path.'index',compact('partners','pages','title'));
    }


    public function  edit(Partner $partner){
//        hasPermissions('update_homepage_footer_links');

        $title = transWord('Partners');
        $pages = [
            [transWord('Partners'),'show_partners']
        ];

        if($partner){
            return view($this->path.'edit',compact('partner','pages','title'));
        }
    }



    public function store(Request $request){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
        ]);

        $partner= Partner::create($request->all());
        if($request->hasFile('image')){
            $file = $request->image;
            $partner->update(
                ['image'=>$this->upload($file,'partners')]
            );
        }

        return redirect()->route('show_partners')->with("success" ,"");
    }


    public function update(Request $request , Partner $partner){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
        ]);

        if($partner){
            $partner->update($request->all());
            if($request->hasFile('image')){
                $file = $request->image;
                $partner->update(
                    ['image'=>$this->upload($file,'partners')]
                );
            }
        }
        return redirect()->route('show_partners')->with("success" ,"");
    }


    public function delete(Partner $partner){
//        hasPermissions('delete_homepage_footer_links');

        if($partner){
            $partner->delete();
        }

        return redirect()->route('show_partners')->with("success" ,"");
    }











}
