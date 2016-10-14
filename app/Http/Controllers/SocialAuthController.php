<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\FacebookAccountService;

use Socialite;

use Auth;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(FacebookAccountService $service)
    {
        $user = $service->createOrGetUser(\Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect('/');
    }
}
