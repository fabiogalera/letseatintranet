<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CobrancaController extends Controller
{
    public function index()
    {
        return view('cobranca');
    }

    public function create()
    {
        return view('cobranca.create');
    }
}
