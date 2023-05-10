<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle() 
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {
        try {
            $user = Socialite::driver('google')->user();
            //find google id
            $findUser = User::where('google_id', $user->id)->where('email', $user->email)->first();

            if($findUser) {
                Auth::login($findUser);
                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('syaeful'),
                    'google_id' => $user->id,
                    'created_by' => 'google',
                ]);
    
                Auth::login($newUser);
                return redirect()->intended('/');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
