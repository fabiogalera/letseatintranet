<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Franqueado extends Model
{
    public function BindFranqueado($id)
    {
        $franqueado = Franqueado::where('id', $id)->get();
        Session::put('franqueado', $franqueado);
        return $franqueado;
    }
    
    public function funcionarios()
    {
        return $this->hasMany('App\Funcionario', 'site_id', 'id');
    }

    public function vouchers()
    {
        return $this->hasMany('App\Voucher', 'site_id', 'id');
    }
}
