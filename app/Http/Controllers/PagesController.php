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
        $this->middleware('auth', ['except' => array('login', 'logoff')]);
        $this->loggedUser = Auth::user();
        dd($this->loggedUser);
    }

    public function home () {
        if (!Auth::check())
        {
            return redirect()->route('/login');
        }
        return view('welcome');
    }

    public function login () {
        if (!Auth::check())
        {
            return view('login');
        }
        return redirect()->route('/');
    }

}
