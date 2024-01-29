<?php

namespace App\Http\Controllers;

use Clients\Models\Client;
use Clientsmessages\Models\ClientMessage;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function success(){
        return view('success-rent');
    }
    
    public function fail(){
        return view('fail-rent');
    }

    public function updatePayment($charge_id){

    }
}
