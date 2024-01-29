<?php

namespace Services\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use Properties\Models\PropertyPlan;
use Carbon\Carbon;
use Clients\Models\Client;
use Illuminate\Http\Request;
use Services\Models\Service;
use Properties\Models\Property;

class ServiceController extends Controller
{
    public $path;
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Services::';
    }

    public function index()
    {
//        hasPermissions('show_homepage_footer_links');
        $title = transWord('Services');
        $pages = [
            [transWord('Services'),'show_services']
        ];

        $services =Service::latest()->get();

        return view($this->path.'index',compact('services','pages','title'));
    }


    public function  edit(Service $service){
//        hasPermissions('update_homepage_footer_links');

        $title = transWord('Services');
        $pages = [
            [transWord('Services'),'show_services']
        ];

        if($service){
            return view($this->path.'edit',compact('service','pages','title'));
        }
    }



    public function store(Request $request){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        $service= Service::create($request->all());
        if($request->hasFile('image')){
            $file = $request->image;
            $service->update(
                ['image'=>$this->upload($file,'services')]
            );
        }

        return redirect()->route('show_services')->with("success" ,"");
    }


    public function update(Request $request , Service $service){
//        hasPermissions('create_homepage_footer_links');
        $request->validate([
            'name.*' =>'required|string',
            'content.*' => 'required|string',
        ]);

        if($service){
            $service->update($request->all());
            if($request->hasFile('image')){
                $file = $request->image;
                $service->update(
                    ['image'=>$this->upload($file,'services')]
                );
            }
        }
        return redirect()->route('show_services')->with("success" ,"");
    }


    public function delete(Service $service){
//        hasPermissions('delete_homepage_footer_links');

        if($service){
            $service->delete();
        }

        return redirect()->route('show_services')->with("success" ,"");
    }











}
