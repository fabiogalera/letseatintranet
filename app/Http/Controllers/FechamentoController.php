<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FechamentoController extends Controller
{
    public function index()
    {
        return view('fechamento');
    }
}
