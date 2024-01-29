<?php

namespace Pages\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Trait\UploadImage;
use Pages\Models\Page;


class PageController extends Controller
{
    use uploadImage;
    public $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Pages::';
    }

    public function index()
    {
        //hasPermissions('show_units_availabilities');
        $title = transWord('Pages');
        $pages = [
            [transWord('Pages'),'Pages']
        ];
        $pages =Page::latest()->get();
        return view($this->path.'index',compact('pages','pages','title'));
    }




    public function store(Request $request){
        //hasPermissions('store_units_availabilities');
        //dd($request->all());
        $request->validate([
            'title.*' =>'required|string',
            'content.*' => 'required|string',
            'slug.*' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);

        $page = Page::create($request->all());



        if($request->hasFile('image')){
            $file = $request->image;
            $page->update(
                ['image'=>$this->upload($file,'pages')]
            );
        }



        return redirect()->route('show_pages')->with("success" ,"");
    }



    public  function  edit(Page $p){
//      hasPermissions('update_units_availabilities');
        $title =transWord('Edit Page');
        $pages = [
            [transWord('Pages'),route('show_pages')],
            [$p->title,route('show_pages',$p->id)]
        ];
        return view($this->path.'edit',compact('p','pages','title'));
    }


    public function update(Request $request , Page $p ){
        $request->validate([
            'title.*' =>'required|string',
            'content.*' => 'required|string',
            'slug.*' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);
        if($p){
            $p->update($request->all());

            if($request->hasFile('page_image')){
                $file = $request->page_image;
                $p->update(
                    ['image'=> $this->upload($file,'pages')]
                );
            }
            return redirect()->back()->with('success','');
        }else{
            return redirect()->back();
        }
    }


    public function delete(Page $p){
        //hasPermissions('delete_units_availabilities');
        if($p){
            $p->delete();
            return redirect()->route('show_pages')->with('success' ,'');
        }

    }




}
