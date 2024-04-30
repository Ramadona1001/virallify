<?php

namespace App\Http\Controllers;

use Facebook\Facebook;
use Illuminate\Http\Request;

class Graph2Controller extends Controller
{
    protected $fb;

    public function __construct(Facebook $fb)
    {
        $this->fb = $fb;
    }

    public function createPost(Request $request)
    {
        // Get user's access token from the authenticated user
        $accessToken = auth()->user()->facebook_token;

        $this->fb->setDefaultAccessToken($accessToken);

        dd($this->fb);

        try {
            // Create a post on the user's timeline
            $response = $this->fb->post('/me/feed', [
                'message' => 'ssss',
            ]);

            // Decode the response
            $graphNode = $response->getGraphNode();

            // Handle successful post creation
            return redirect()->back()->with('success', 'Post created successfully.');
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // Handle Facebook response exceptions
            return redirect()->back()->with('error', 'Graph returned an error: ' . $e->getMessage());
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // Handle Facebook SDK exceptions
            return redirect()->back()->with('error', 'Facebook SDK returned an error: ' . $e->getMessage());
        }
    }


    public function redirectToFacebook()
    {
        $helper = $this->fb->getRedirectLoginHelper();
        $permissions = ['email']; // Optional permissions

        $loginUrl = $helper->getLoginUrl('https://virallify.com', $permissions);

        return redirect()->away($loginUrl);
    }

    public function handleFacebookCallback(Request $request)
    {
        $helper = $this->fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            return redirect()->route('login')->with('error', 'Graph returned an error: ' . $e->getMessage());
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            return redirect()->route('login')->with('error', 'Facebook SDK returned an error: ' . $e->getMessage());
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                return redirect()->route('login')->with('error', 'Error: ' . $helper->getError());
            } else {
                return redirect()->route('login')->with('error', 'Bad request');
            }
        }

        // Logged in
        $this->fb->setDefaultAccessToken($accessToken);

        try {
            $response = $this->fb->get('/me?fields=id,name,email');
            $userNode = $response->getGraphUser();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            return redirect()->route('login')->with('error', 'Graph returned an error: ' . $e->getMessage());
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            return redirect()->route('login')->with('error', 'Facebook SDK returned an error: ' . $e->getMessage());
        }

        // User information
        $user = [
            'id' => $userNode->getId(),
            'name' => $userNode->getName(),
            'email' => $userNode->getEmail(),
            // Add any additional fields you want to retrieve
        ];

        // Do whatever you want with the user data (e.g., store in the database, log in the user, etc.)

        return redirect()->route('home')->with('success', 'Logged in with Facebook successfully.');
    }
}
