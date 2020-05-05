<?php

namespace App\Http\Controllers;

use App\GithubAuth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $name = $user->name;
        $token = $user->token;
        $foundUser = \App\GithubAuth::where("name", $name)->first();
        if ($foundUser) {
            return [
                "token" => $token
            ];
        }

        $gitUser = new GithubAuth();
        $gitUser->register($name);
        return [
            "token" => $token
        ];
    }
}
