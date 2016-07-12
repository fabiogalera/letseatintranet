<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use DateTime;
use App\Funcionario;
use App\User;
use Auth;
use Yajra\Datatables\Datatables;

use App\Http\Requests;

class FuncionariosController extends Controller
{

    protected $redirectTo = '/';
    protected $redirectPath = '/';
    protected $loginPath = '/login';

    public function index()
    {
        //$funcionario = Funcionario::all();
        return view('funcionario');
    }

    public function show(Funcionario $funcionario)
    {
        return view('funcionario.show', compact('funcionario'));
    }

    public function create()
    {
        return view('funcionario.create');
    }

    public function store(Request $request, Funcionario $funcionarios)
    {
        $data = $request->except(['_token']);
        $data['nascimento'] = Carbon::createFromFormat('d-m-Y', $request->nascimento)->format('Y-m-d');
        $data['admissao'] = Carbon::createFromFormat('d-m-Y', $request->admissao)->format('Y-m-d');
        $data['salario'] = floatval(str_replace(',', '.', str_replace('.', '', $request->salario)));

        $funcionarios->create($data);

        $parameters = ['message' => '<strong> Sucesso ! </strong> Funcionário ' . $funcionarios->nome . ' ' . $funcionarios->sobrenome . ' criado com sucesso;' , 'level' => 'success'];
        return redirect('funcionarios')->with($parameters);
    }

    public function edit(Funcionario $funcionarios)
    {
        $decimal = floatval(str_replace(',', '.', str_replace('.', '', $funcionarios->salario)));
        $funcionarios->salario = $decimal;
        return view ('funcionario.edit', compact('funcionarios'));
    }

    public function update(Request $request, Funcionario $funcionarios)
    {
        $data = $request->except(['_token']);
        $data['nascimento'] = Carbon::createFromFormat('d-m-Y', $request->nascimento)->format('Y-m-d');
        $data['admissao'] = Carbon::createFromFormat('d-m-Y', $request->admissao)->format('Y-m-d');
        $data['salario'] = floatval(str_replace(',', '.', str_replace('.', '', $request->salario)));

        $funcionarios->update($data);
        $parameters = ['message' => '<strong> Sucesso ! </strong> Funcionário ' . $funcionarios->nome . ' ' . $funcionarios->sobrenome . ' editado com sucesso;' , 'level' => 'success'];
        return redirect('funcionarios')->with($parameters);
    }

    public function Ajax()
    {
        $funcionarios = Funcionario::select(['*']);

        return Datatables::of($funcionarios)
            ->addColumn('edit', function ($funcionario) {
                return '<a href="/funcionarios/'.$funcionario->id.'/edit" class="btn btn-xs btn-default" title="Editar"><i class="fa fa-edit"></i></a>
                        <a href="/funcionarios/'.$funcionario->id.'/delete" class="btn btn-xs btn-danger" title="Remover"><i class="fa fa-remove"></i></a>
                ';
            })
            ->make(true);
    }
}
