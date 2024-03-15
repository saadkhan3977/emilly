<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // echo url('dashboard');
        return view('backend.dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
