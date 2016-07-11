<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;

class PagesController extends Controller
{
    public function home () {
        return view('welcome');
    }

    public function login () {
        if (Auth::check())
            return 'Welcome back, ' . Auth::user()->username;
            return view('auth.login');
    }

}
