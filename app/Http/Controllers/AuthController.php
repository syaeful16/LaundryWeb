<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
