<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class ForaController extends Controller
{
    public $franqueado;

    public function __construct(Request $request)
    {
        if ($request->session()->has('franqueado')) {
            $this->franqueado = $request->session()->get('franqueado.0');
        } else {
            Auth::logout();
            $request->session()->flush();
        }
    }
}
