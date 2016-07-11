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

    public function __construct()
    {
        $this->middleware('auth', ['except' => array('login', 'logoff')]);
    }

    public function home () {
        return view('welcome');
    }

    public function login () {
        return view('auth.login');
    }

}
