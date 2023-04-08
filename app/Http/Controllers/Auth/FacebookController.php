<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Socialite;
use Str;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $finduser = User::where('facebook_id', $user->id)->first();

        if ($finduser) {
            Auth::login($finduser);

            return redirect()->route('dashboard');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email ?? ($user->id.'@facebook.com.noemail'),
                'facebook_id'=> $user->id,
                'password' => bcrypt(Str::random(40)),
            ]);

            Auth::login($newUser);

            return redirect()->route('locationForm');
        }
    }
}
