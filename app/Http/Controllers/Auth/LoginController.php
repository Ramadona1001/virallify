<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
        // dd(Socialite::driver('facebook'));
        // return Socialite::driver('facebook')->scopes(["publish_actions, manage_pages", "publish_pages"])->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return void
     */
    public function handleProviderFacebookCallback()
    {
        $auth_user = Socialite::driver('facebook')->user();
        dd($auth_user);

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







}
