<?php

namespace HomeSections\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use Illuminate\Http\Request;
use HomeSections\Models\HomeSection;
use HomeSections\Models\HomeSectionGallery;

class HomeSectionController extends Controller
{
    public $path;
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'HomeSections::';
    }

    public function index()
    {
//        hasPermissions('show_homepage_footer_links');
        $title = transWord('Home Sections');
        $pages = [
            [transWord('Home Sections'),'show_home_sections']
        ];

        $home_sections = HomeSection::orderBy('order_no','asc')->get();

        return view($this->path.'index',compact('home_sections','pages','title'));
    }


    public function  edit(HomeSection $home_section){
//        hasPermissions('update_homepage_footer_links');

        $title = transWord('Home Sections');
        $pages = [
            [transWord('Home Sections'),'show_home_sections']
        ];

        if($home_section){
            return view($this->path.'edit',compact('home_section','pages','title'));
        }
    }



    public function store(Request $request){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        $home_section= HomeSection::create($request->all());
        if (isset($request->images)) {
            foreach ($request->file('images') as $image) {
                HomeSectionGallery::create([
                    'home_section_id' => $home_section->id,
                    'image' => $this->upload($image,'home_sections')
                ]);
            }
        }
        
        return redirect()->route('show_home_sections')->with("success" ,"");
    }


    public function update(Request $request , HomeSection $home_section){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        if($home_section){
            $home_section->update($request->all());
            if (isset($request->images)) {
                foreach ($request->file('images') as $image) {
                    HomeSectionGallery::create([
                        'home_section_id' => $home_section->id,
                        'image' => $this->upload($image,'home_sections')
                    ]);
                }
            }
        }
        return redirect()->route('show_home_sections')->with("success" ,"");
    }


    public function delete(HomeSection $home_section){
//        hasPermissions('delete_homepage_footer_links');

        if($home_section){
            $home_section->delete();
        }

        return redirect()->route('show_home_sections')->with("success" ,"");
    }
    
    public function deleteGallery(HomeSectionGallery $gallery){
//        hasPermissions('delete_homepage_footer_links');

        if($gallery){
            $gallery->delete();
        }

        return back()->with("success" ,"");
    }











}
