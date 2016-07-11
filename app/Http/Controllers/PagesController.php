<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;

class PagesController extends Controller
{
    public function home () {
        if (Auth::check())
            return view('welcome');
            return view('auth.login');

    }

    public function login () {
        return view('auth.login');
    }

}
