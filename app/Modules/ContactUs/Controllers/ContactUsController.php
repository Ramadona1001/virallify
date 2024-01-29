<?php

namespace ContactUs\Controllers;
use App\Http\Controllers\Controller;
use ContactusSection\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Trait\UploadImage;
use OurTeamSection\Models\OurTeam;


class ContactUsController extends Controller
{
    public $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'ContactusSection::';
    }

    public function index()
    {
        //hasPermissions('show_units_availabilities');
        $title = transWord('Contact Messages');
        $pages = [
            [transWord('Contact Messages'),route('show_contact_messages')]
        ];
        $contacts =Contact::latest()->get();
        return view($this->path.'index',compact('contacts','pages','title'));
    }




    public function delete(Contact $contact){
        //hasPermissions('delete_units_availabilities');
        if($contact){

            $contact->delete();
            return redirect()->route('show_contact_messages')->with('success' ,'');
        }

    }




}
