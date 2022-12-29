<?php

namespace App\Http\Controllers\User;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;

class LandingPageController extends Controller
{

 public function index()
 {
    return view('user.landing',[
      
    ]);
 }

 public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect('/')->with('successUpdate', 'Berhasil Mengedit');
    }

}
