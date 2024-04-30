<?php

namespace App\Http\Controllers;

use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Http\Request;
use Thujohn\Twitter\Facades\Twitter;
use File;

class TwitterController extends Controller
{

  // public function connect_twitter(Request $request)
  // {
  //     // $_twitter_connect = new TwitterOAuth('Z2VFSmhFcGloTnk0ZHJwRjBhaGw6MTpjaQ','xV-54EcfcS9c_uOU4-R4vX5L17yK3uhbcBRMrqNKohebjzpWKC','1622535822527418368-XpjYLfcRTY77iwhQfxG7A8OPYU9soI','QaiYxOcdvBB28eu9acLxgAA4BlE8akOrzYlg7zSIpjwbi');
  //     $callback = '';
  //     $_twitter_connect = new TwitterOAuth('Z2VFSmhFcGloTnk0ZHJwRjBhaGw6MTpjaQ','xV-54EcfcS9c_uOU4-R4vX5L17yK3uhbcBRMrqNKohebjzpWKC');
  //     // $_access_token = $_twitter_connect->oauth('oauth/request_token',['oauth_callback'=>$callback]);
  //     $_route = $_twitter_connect->url('oauth/authorize',['oauth_token'=>'1622535822527418368-U0bGImNLO53G6PoME9McvpoKyuxczf']);
  //     return redirect($_route);
  // }
  
  public function connect_twitter(Request $request)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.twitter.com/2/tweets/search/recent?query=from:twitterdev');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    
    
    $headers = array();
    $headers[] = 'Authorization: AAAAAAAAAAAAAAAAAAAAALtTrQEAAAAAZhgDCcETWTb5zkWv4NliG8nmSdU%3Dx29U49YNjzRYB6E2CvQ6CLqD9pQ1OhHFl0Kaq1a3zWnXlCMgnm';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    dd($result);
  }
  
}

