<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use PDF;

class RegisterController extends Controller
{
    public function index()
    {
        $schools = Http::get('https://akmalweb.my.id/api/daftar_smp.php')->json();

        return view('user.sign-up',[
            'schools' => $schools,
            'title' => 'Register'
        ]);
    }


    public function register(Request $request)
    {
        //Validasi data
        // $getName = substr($request->name, 0, 4);
        $getNisn = ($request->nisn);
        $generatePassword = $getNisn;
        
        $request->validate([
            'nisn' => 'required|unique:users',
            'name' => 'required|max:225',
            'school' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users',
            'pn_father' => 'required|unique:users',
            'pn_mother' => 'required|unique:users',
            'gender'=>'required'
        ]);

     
        User::create([
            'nisn' => $request->nisn,
            'gender' => $request->gender,
            'name' => $request->name,
            'school' => $request->school,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'pn_father' => $request->pn_father,
            'pn_mother' => $request->pn_mother,
            'role' => 'user',
            'password' => Hash::make($generatePassword),
        ]);


        // $request['nisn'] = bcrypt($request['nisn']);

        // $pdf = PDF::loadView('user.pdf',[
        //     'user' => User::latest()->first(),
        //     'nisn' => $request->nisn,
        // ]);

        // return redirect('/')->with('success', 'Registration successfull!');
        // return $pdf->download('PPDB-Wikrama.pdf');
        

        return view('user.pdf',[
            'user' => User::latest()->first(),
        ]);

        // return $pdf->stream('anjing.pdf');


    //    return redirect('/pdf')->with('success', 'Registration successfull! Please login');

    }

}
