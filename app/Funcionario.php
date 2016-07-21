<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable =  ['_token', 'site_id', 'nome', 'meio', 'sobrenome', 'cpf', 'email', 'telefone', 'contato', 'tel_contato', 'rua', 'num', 'comp', 'cep', 'estado', 'cidade', 'nascimento', 'sexo', 'ctps', 'serie', 'tipo', 'cargo', 'salario', 'pis', 'mesa', 'admissao'];
    protected $dates = ['nascimento', 'admissao'];

    public function franqueado()
    {
        return $this->hasOne('App\Franqueado', 'id', 'site_id');
    }

}
