<?php

namespace App\Http\Controllers\User;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{
    public function index(){
        return view('user.dashboard.index',[
            'user' => auth()->user(),
            'title' => 'Dashboard',
            "active" => 'dashboard',
            'payment' => Payment::where('user_id', '=', Auth::user()->id)->first(),
        ]);
    }

    public function error()
    {
        return view('user.error',[
            'title' => '404 | Not Found',
        ]);
    }
}
