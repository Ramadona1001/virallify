<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
 
  private $api;
  public function __construct(Facebook $fb)
  {
      $this->middleware(function ($request, $next) use ($fb) {
          $fb->setDefaultAccessToken('EAACT89d2kZCMBO3kiHSpmPp82FsJOCQGW8EAQExtZCKoHJXuFxI1a5YRndzK0eDLHNrfcyof0kotZAEwXQGumZBXoeOKjlF6Kl8dtUKnFSKiCeALX4szKUc5BVLIZC0882IKcKMs1XTv87U2h88obJPNYfqXzdLSEJoMJxuSNwI4rIZAhbYwyfzCxD3tAk16ZB63YTJVyCK7gZDZD');
          $this->api = $fb;
          return $next($request);
      });
  }

  public function fb(){
    return Socialite::driver('facebook')->redirect();
  }

  public function retrieveUserProfile(){
    try {

        $params = "first_name,last_name,age_range,gender";

        $user = $this->api->get('/me?fields='.$params)->getGraphUser();

        dd($user);

    } catch (FacebookSDKException $e) {

    }

  }
  
  public function publishToProfile(Request $request){
      try {
          $response = $this->api->post('/me/feed', [
              'message' => $request->message
          ])->getGraphNode()->asArray();
          if($response['id']){
            // post created
          }
      } catch (FacebookSDKException $e) {
          dd($e); // handle exception
      }
  }

public function getPageAccessToken($page_id){
    try {
         // Get the \Facebook\GraphNodes\GraphUser object for the current user.
         // If you provided a 'default_access_token', the '{access-token}' is optional.
         $response = $this->api->get('/me/accounts', Auth::user()->token);
    } catch(FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
 
    try {
        $pages = $response->getGraphEdge()->asArray();
        foreach ($pages as $key) {
            if ($key['id'] == $page_id) {
                return $key['access_token'];
            }
        }
    } catch (FacebookSDKException $e) {
        dd($e); // handle exception
    }
}

public function publishToPage(Request $request){

  $page_id = 'YOUR_PAGE_ID';

  try {
      $post = $this->api->post('/' . $page_id . '/feed', array('message' => request->message), $this->getPageAccessToken($page_id));

      $post = $post->getGraphNode()->asArray();

      dd($post);

  } catch (FacebookSDKException $e) {
      dd($e); // handle exception
  }
}


  public function redirectToFacebookProvider()
  {
      return Socialite::driver('facebook')->scopes([
          "publish_actions, manage_pages", "publish_pages"])->redirect();
  }
  
  public function handleProviderFacebookCallback()
  {
      $auth_user = Socialite::driver('facebook')->user();

      $user = User::updateOrCreate(
          [
              'email' => $auth_user->email
          ],
          [
              'token' => $auth_user->token,
              'name'  =>  $auth_user->name
          ]
      );

      Auth::login($user, true);
      return redirect()->to('/'); // Redirect to a secure page
  }

  public function index(Request $request)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v19.0/me?fields=id%2Cposts&access_token=EAACT89d2kZCMBOx85OyQw5i8VnJH5go5utAdtRFGMwT3EUCot6mC6HDF6F46OjBBa8hrKAMBZCsdCnf1NAtT1eNVD66vqpADvVJNFtkSDnjxQTizdChjd7sGAhEhwZAunOWprBwC9WJY9PhPJ7oXIj2EQQ6OvTOQGStVdvhJKXemBj9eMicO9fAUbL4uMSl364LZB9vxHZCG8Tu51FTfFuIvJfb0OQem8ZBKD9hWZAJVndqUds8l0sZD');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    dd(json_decode($result));
  }
  
  public function post(Request $request)
  {
    // Step 1: Create an upload session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v19.0/EAACT89d2kZCMBO4zOsqOCpvWANo0IHQZCU2XZBesqNOUjnw6RELLhtnZAQQkV1eZA3QAfOoxRImlpVLDwxeJZABfPLskNY6vFJs60RrQwuB0gXEquY8eTY0CMu4mHsMqdiEIOwaaZBraXsADMnaNsedVZCfD0nbgBbqjrD3rYSOpk3RsytooMjBrlumyi68g2z0SMfDtOm0nDwZDZD/uploads");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'file_length' => '109981',
        'file_type' => 'image/jpeg',
        'access_token' => 'EAACT89d2kZCMBO4zOsqOCpvWANo0IHQZCU2XZBesqNOUjnw6RELLhtnZAQQkV1eZA3QAfOoxRImlpVLDwxeJZABfPLskNY6vFJs60RrQwuB0gXEquY8eTY0CMu4mHsMqdiEIOwaaZBraXsADMnaNsedVZCfD0nbgBbqjrD3rYSOpk3RsytooMjBrlumyi68g2z0SMfDtOm0nDwZDZD',
    ]);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    $uploadSessionId = json_decode($result)->id;

    // Step 2: Initiate the upload
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v19.0/{$uploadSessionId}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'file_offset' => '0',
        'data-binary' => '@{file-name}',
    ]);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: OAuth EAACT89d2kZCMBO4zOsqOCpvWANo0IHQZCU2XZBesqNOUjnw6RELLhtnZAQQkV1eZA3QAfOoxRImlpVLDwxeJZABfPLskNY6vFJs60RrQwuB0gXEquY8eTY0CMu4mHsMqdiEIOwaaZBraXsADMnaNsedVZCfD0nbgBbqjrD3rYSOpk3RsytooMjBrlumyi68g2z0SMfDtOm0nDwZDZD',
    ]);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    $fileHandle = json_decode($result);

  }

}

