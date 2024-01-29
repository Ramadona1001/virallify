<?php

namespace Translates\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Translates\Models\Language;
use Translates\Models\Translate;

class TranslateController extends Controller
{
    public $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'Translates::';
    }

    public function index()
    {
        $title = transWord('Languages Settings');
        $pages = [
            [transWord('Languages'),'langs'],
        ];
        $languages = Language::all();
        $languages_codes = Language::pluck('code')->toArray();
        return view($this->path.'index',compact('pages','title','languages','languages_codes'));
    }

    public function saveLang(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'direction' => 'in:rtl,ltr'
        ]);
        $check = Language::where('code',$request->code)->first();
        if (!$check) {
            return back()->with('success','');
        }else{
            return back()->with('fail','');
        }
    }

    public function deleteLang($id)
    {
        Language::findOrfail($id)->delete();
        return back()->with('success','');
    }

    public function translate($key = null)
    {
        $title = transWord('Translation');
        $pages = [
            [transWord('Languages'),'langs'],
            [$key,'langs'],
        ];
        $key = ($key != null) ? $key : 'en';
        $langs = Translate::where('key',$key)->get();
        return view($this->path.'translation',compact('langs','pages','title','key'));
    }

    public function save(Request $request)
    {
        $lang = $request->key;
        if (isset($request->trans)) {
            for ($i=0; $i < count($request->trans); $i++) {
                $trans = Translate::where('id',$request->ids[$i])->where('key',$lang)->get()->first();
                $trans->translation = $request->trans[$i];
                $trans->save();
            }
        }
        return back()->with('success','');
    }

    public function addNew(Request $request)
    {
        $lang = $request->key;
        $trans = new Translate();
        $trans->key = $lang;
        $trans->word = $request->word;
        $trans->translation = $request->translation;
        $trans->save();
        return back()->with('success','');
    }
}
