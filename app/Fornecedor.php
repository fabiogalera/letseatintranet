<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{

    protected $fillable =  ['_token', 'apelido', 'nome', 'cnpj', 'email', 'telefone', 'contato', 'endereco', 'num', 'comp', 'cep', 'estado', 'cidade', 'prazoentrega', 'prazofatura', 'forma', 'faturamento'];

    protected $table="fornecedores";
}
