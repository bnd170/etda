<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('instagrambasic')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('instagrambasic')->user();

        dd($user);
    }
}
