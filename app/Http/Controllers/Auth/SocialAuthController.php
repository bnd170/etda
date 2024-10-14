<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('instagram')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('instagram')->user();

        // $user->token
    }
}
