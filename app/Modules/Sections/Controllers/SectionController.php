<?php

namespace Sections\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use Illuminate\Http\Request;
use Sections\Models\Section;
use Sections\Models\SectionGallery;

class SectionController extends Controller
{
    public $path;
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Sections::';
    }

    public function index()
    {
//        hasPermissions('show_Aboutpage_footer_links');
        $title = transWord('Sections');
        $pages = [
            [transWord('Sections'),'show_sections']
        ];

        $sections = Section::orderBy('order_no','asc')->get();

        return view($this->path.'index',compact('sections','pages','title'));
    }


    public function  edit(Section $section){
//        hasPermissions('update_Aboutpage_footer_links');

        $title = transWord('Sections');
        $pages = [
            [transWord('Sections'),'show_sections']
        ];

        if($section){
            return view($this->path.'edit',compact('section','pages','title'));
        }
    }



    public function store(Request $request){
//        hasPermissions('create_Aboutpage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        $section= Section::create($request->all());
        if (isset($request->images)) {
            foreach ($request->file('images') as $image) {
                SectionGallery::create([
                    'section_id' => $section->id,
                    'image' => $this->upload($image,'sections')
                ]);
            }
        }
        
        return redirect()->route('show_sections')->with("success" ,"");
    }


    public function update(Request $request , Section $section){
//        hasPermissions('create_Aboutpage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        if($section){
            $section->update($request->all());
            if (isset($request->images)) {
                foreach ($request->file('images') as $image) {
                    SectionGallery::create([
                        'section_id' => $section->id,
                        'image' => $this->upload($image,'sections')
                    ]);
                }
            }
        }
        return redirect()->route('show_sections')->with("success" ,"");
    }


    public function delete(Section $section){
//        hasPermissions('delete_Aboutpage_footer_links');

        if($section){
            $section->delete();
        }

        return redirect()->route('show_sections')->with("success" ,"");
    }
    
    public function deleteGallery(SectionGallery $gallery){
//        hasPermissions('delete_Aboutpage_footer_links');

        if($gallery){
            $gallery->delete();
        }

        return back()->with("success" ,"");
    }











}
