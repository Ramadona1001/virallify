<?php

namespace Countries\Controllers;

use App\Http\Controllers\Controller;
use Countries\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Trait\UploadImage;



class CountryController extends Controller
{
    public $path;
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Countries::';
    }

    public function index()
    {
        //hasPermissions('show_countries');
        $title = transWord('Countries');
        $pages = [
            [transWord('Countries'),'countries']
        ];
        $countries = Country::all();
        return view($this->path.'index',compact('countries','pages','title'));

    }






    public function store(Request $request){
        //hasPermissions('update_countries');

        $customMessage = [
            'required' => transWord('The :attribute is required')
        ];

        $validateData = Validator::make($request->all() , [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'code'    => 'nullable',
            'file'    => 'nullable',
            'Currency_code'  => 'nullable',
            'exchange_rate'  => 'nullable'
            ] , $customMessage);

        if ($validateData->fails()){
            $errors = $validateData->errors();
            return redirect()->back()->withErrors($errors);
        }


        $country = Country::create($request->all());

        if ($request->hasFile('file')){
            $file = $request->file;
            $country->update([
                'file' => $this->upload($file,'countries')
            ]);
        }


        return redirect()->route('show_countries')->with('success','');

    }



    public  function  edit(Country $country){
//        hasPermissions('update_countries');
        $title =transWord('Edit Country');
        $pages = [
            [transWord('Countries'),route('show_countries')],
            [$country->name_en,route('edit_countries',$country->id)]
        ];

        return view($this->path.'edit',compact('country','pages','title'));
    }


    public function update(Request $request , Country $country){
        //hasPermissions('update_countries');

        $customMessage=[
            'required' => transWord('The :attribute is required')
        ];

        $validateData = Validator::make($request->all() , [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'code'    => 'nullable',
            'file'    => 'nullable',
            'Currency_code'  => 'nullable',
            'exchange_rate'  => 'nullable'
        ] , $customMessage);

        if ($validateData->fails()){
            $errors = $validateData->errors();
            return redirect()->back()->withErrors($errors);
        }


        $country->update($request->all());

        if ($request->hasFile('file')){
            $file = $request->file;
            $country->update([
                'file' => $this->upload($file,'countries')
            ]);
        }


        return redirect()->route('show_countries')->with('success','');

    }


    public function delete(Country $country){
        //hasPermissions('delete_countries');
        if ($country){
            $country->delete();
        }
        return redirect()->route('show_countries')->with('success','');
    }




}
