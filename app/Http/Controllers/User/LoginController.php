<?php

namespace App\Http\Controllers\User;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use PDF;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.sign-in',[
            'title' => 'Login'
        ]);
    }

    //Login
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => 'Email ini belum tersedia',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'))->with('success', 'Login Success!');
        }
        
        return back()->with('LoginError', 'Login failed!');
    }
    
    //logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken(); 

        return redirect('/')->with('logout', 'Berhasil Logout!');
    }
}
