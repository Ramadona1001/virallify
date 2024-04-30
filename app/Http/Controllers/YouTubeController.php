<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_YouTube;
use Youtube;
use Illuminate\Http\Request;

class YouTubeController extends Controller
{

  protected $client;

  public function index(){
    return view('youtube.index');
  }
  
  public function store(Request $request)
  {
      $this->client = new Google_Client();
      $this->client->setClientId(env('GOOGLE_CLIENT_ID'));
      $this->client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
      $this->client->setScopes('https://www.googleapis.com/auth/youtube'); 
      $this->client->setRedirectUri('https://www.youtube.com'); 
  }

  public function getYouTubeService()
  {
      return new Google_Service_YouTube($this->client);
  }
  
}

