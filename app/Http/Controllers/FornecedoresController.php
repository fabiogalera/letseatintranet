<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Auth;
use Yajra\Datatables\Datatables;
use App\Fornecedor;
use App\Http\Requests;

class FornecedoresController extends ForaController
{

    protected $redirectTo = '/';
    protected $redirectPath = '/';
    protected $loginPath = '/login';


    public function index()
    {
        return view('fornecedor');
    }

    public function show(Fornecedor $fornecedor)
    {
        return view('fornecedor.show', compact('fornecedor'));
    }

    public function create()
    {
        return view('fornecedor.create');
    }

    public function store(Request $request, Fornecedor $fornecedores)
    {
        $data = $request->except(['_token']);
        $fornecedores->create($data);

        $parameters = ['message' => $fornecedores->apelido . ' criado com sucesso;' , 'level' => 'success'];
        return redirect('fornecedores')->with($parameters);
    }

    public function edit(Fornecedor $fornecedores)
    {
        return view('fornecedor.edit', compact('fornecedores'));
    }

    public function update(Request $request, Fornecedor $fornecedores)
    {
        $data = $request->except(['_token']);

        $fornecedores->update($data);
        $parameters = ['message' => $fornecedores->apelido . ' editado com sucesso;' , 'level' => 'success'];
        return redirect('fornecedores')->with($parameters);
    }

    public function destroy(Fornecedor $fornecedores)
    {
        $nome = $fornecedores->apelido;
        $fornecedores->delete($fornecedores->id);
        $parameters = ['message' => $nome . ' removido com sucesso;' , 'level' => 'success'];
        return redirect('fornecedores')->with($parameters);
    }


    public function Ajax()
    {
        $fornecedores = Fornecedor::select(['*']);
        return Datatables::of($fornecedores)
            ->addColumn('edit', function ($fornecedor) {
                return '<a href="/fornecedores/'.$fornecedor->id.'/edit" class="btn btn-xs btn-default" title="Editar"><i class="fa fa-edit"></i></a>
                        <a href="/fornecedores/'.$fornecedor->id.'/delete" onClick="return confirm(\'Deseja realmente remover o funcionário ' .  $fornecedor->apelido . ' ?\')" class="btn btn-xs btn-danger" title="Remover"><i class="fa fa-remove"></i></a>
                ';
            })
            ->make(true);
    }
}
