<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(empty($user)){
            return redirect()->route('login');
        }
        return view('home')->with(compact('user'));
    }
}
