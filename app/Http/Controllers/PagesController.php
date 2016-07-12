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

    protected $loggedUser;

    public function __construct()
    {
        $this->middleware('auth', ['except' => array('logoff','login')]);
        $this->loggedUser = Auth::user();

    }

    public function home () {
        if (is_null($loggedUser))
        {
            return view('login');
        }
        return view('welcome');
    }

    public function login () {
        dd($loggedUser);
        if (is_null($loggedUser))
        {
            return view('login');
        }

        return view('welcome');
    }

}
