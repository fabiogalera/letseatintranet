<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;

class PagesController extends Controller
{

    protected $redirectTo = '/';
    protected $redirectPath = '/';
    protected $loginPath = '/login';

    public function home () {
        if (!Auth::check())
        {
            return redirect('auth/login');
        }

        return view('welcome');
    }

    public function login () {
        if (Auth::check())
        {
            return redirect('/');
        }

        return view('auth.login');

    }

}
