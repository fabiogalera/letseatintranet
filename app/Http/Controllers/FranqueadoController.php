<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Franqueado;
use App\Http\Requests;


class FranqueadoController extends ForaController
{
    public function ListFranqueados()
    {
        $franqueados = Franqueado::all();
        return $franqueados;
    }

    public function SetFranqueado(Request $request, Franqueado $franqueado)
    {
        $request->session()->forget('franqueado');
        session()->push('franqueado',$franqueado );
        return back();
    }

}
