<?php

namespace FaqSection\Controllers;
use App\Http\Controllers\Controller;
use FaqSection\Models\FaqSetting;
use Illuminate\Http\Request;


class FaqController extends Controller
{
    public $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'FaqSection::';
    }




    public function index(){
        hasPermissions('show_homepage_faqs');

        $title = transWord('FAQ Settings');
        $pages = [
            [transWord('FAQ Settings'),'show_faqs']
        ];

        $faqs = FaqSetting::latest()->get();

        return view($this->path.'index',compact('faqs','pages','title'));
    }



    public function store(Request $request){
        hasPermissions('create_homepage_faqs');
        $request->validate([
            'question.*' =>'required|string',
            'answer.*' => 'required|string',
            'publish' => 'required'
        ]);

            $faq= FaqSetting::create($request->all());


        return redirect()->route('show_faq_settings')->with('success' ,'');
    }


    public function edit(FaqSetting $faq){
        hasPermissions('update_homepage_faqs');

        $title = transWord('FAQ Settings');
        $pages = [
            [transWord('FAQ Settings'),route('show_faq_settings')]
        ];

        return view($this->path.'edit',compact('faq','pages','title'));
    }


    public function update(Request $request , FaqSetting $faq){
        hasPermissions('update_homepage_faqs');

        $request->validate([
            'question.*' =>'required|string',
            'answer.*' => 'required|string',
            'publish' => 'required'
        ]);

        $faq->update($request->all());

        return redirect()->back()->with('success' ,'');
    }



    public function delete(FaqSetting $faq){
        hasPermissions('delete_homepage_faqs');

        $faq->delete();
        return redirect()->route('show_faq_settings')->with('success' ,'');
    }








}
