<?php

namespace AboutSections\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use Illuminate\Http\Request;
use AboutSections\Models\AboutSection;
use AboutSections\Models\AboutSectionGallery;

class AboutSectionController extends Controller
{
    public $path;
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'AboutSections::';
    }

    public function index()
    {
//        hasPermissions('show_Aboutpage_footer_links');
        $title = transWord('About Sections');
        $pages = [
            [transWord('About Sections'),'show_about_sections']
        ];

        $about_sections = AboutSection::orderBy('order_no','asc')->get();

        return view($this->path.'index',compact('about_sections','pages','title'));
    }


    public function  edit(AboutSection $about_section){
//        hasPermissions('update_Aboutpage_footer_links');

        $title = transWord('About Sections');
        $pages = [
            [transWord('About Sections'),'show_about_sections']
        ];

        if($about_section){
            return view($this->path.'edit',compact('about_section','pages','title'));
        }
    }



    public function store(Request $request){
//        hasPermissions('create_Aboutpage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        $about_section= AboutSection::create($request->all());
        if (isset($request->images)) {
            foreach ($request->file('images') as $image) {
                AboutSectionGallery::create([
                    'about_section_id' => $about_section->id,
                    'image' => $this->upload($image,'about_sections')
                ]);
            }
        }
        
        return redirect()->route('show_about_sections')->with("success" ,"");
    }


    public function update(Request $request , AboutSection $about_section){
//        hasPermissions('create_Aboutpage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        if($about_section){
            $about_section->update($request->all());
            if (isset($request->images)) {
                foreach ($request->file('images') as $image) {
                    AboutSectionGallery::create([
                        'about_section_id' => $about_section->id,
                        'image' => $this->upload($image,'about_sections')
                    ]);
                }
            }
        }
        return redirect()->route('show_about_sections')->with("success" ,"");
    }


    public function delete(AboutSection $about_section){
//        hasPermissions('delete_Aboutpage_footer_links');

        if($about_section){
            $about_section->delete();
        }

        return redirect()->route('show_about_sections')->with("success" ,"");
    }
    
    public function deleteGallery(AboutSectionGallery $gallery){
//        hasPermissions('delete_Aboutpage_footer_links');

        if($gallery){
            $gallery->delete();
        }

        return back()->with("success" ,"");
    }











}
