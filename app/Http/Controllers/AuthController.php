<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    public function login() 
    {
        return view('auth.login');
    }

    public function authLogin(Request $request)
    {
        $request->validate([
            'email'=> 'required|email|exists:users,email',
            'password'=> 'required|min:8'
        ],[
            'email'=> [
                'required'=> 'Email tidak boleh kosong',
                'email'=> 'Email tidak sesuai format',
                'exists'=> 'Email belum terdaftar'
            ],
            'password'=>[
                'required'=> 'Password tidak boleh kosong',
                'min'=> 'Minimal :min karakter'
            ]
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect('/auth/login')->with('failed', "Login gagal");
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'=> 'required|regex:/^[A-Za-z\s]+$/',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8'
        ],[
            'name' => [
                'required'=> 'Nama tidak boleh kosong',
                'regex'=> 'Nama tidak boleh mengandung angka'
            ],
            'email'=> [
                'required'=> 'Email tidak boleh kosong',
                'email'=> 'Email tidak sesuai format',
                'unique'=> 'Email sudah terdaftar'
            ],
            'password'=>[
                'required'=> 'Password tidak boleh kosong',
                'min'=> 'Minimal :min karakter'
            ]
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/auth/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('auth/login');
    }

    public function viewForgot()
    {
        return view('auth.forgot-password');
    }

    public function sendEmailForgot(Request $request) 
    {
        $request->validate([
            'email'=> 'required|email|exists:users,email',
        ],[
            'email'=> [
                'required'=> 'Email tidak boleh kosong',
                'email'=> 'Email tidak sesuai format',
                'exists'=> 'Email belum terdaftar',
            ]
        ]);

        $findUser = User::where('email', $request->email)->where('created_by', 'google')->first();

        if($findUser) {
            return redirect()->route('login')->with('info', 'Email Anda terdaftar melalui google, silahkan masuk dengan google');
        } else {
            $status = Password::sendResetLink(
                $request->only('email')
            );
    
            return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
        }

    }

    public function resetPassword($token) {
        return view('auth.update-password', ['token'=> $token]);
    }

    public function updatePassword(Request $request) 
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ],[
            'password'=>[
                'required'=> 'Password tidak boleh kosong',
                'min'=> 'Minimal :min karakter'
            ]
        ]);

        
        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
        
                $user->save();
        
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
        

    }
}
