@extends('layouts.blank')

@section('main_container')


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="row x_title">
                    <h3>Funcionários <small></small></h3>
            </div>

            <div class="x_content">
                <form class="form-horizontal" action="/funcionarios" method="POST">
                    @include('funcionario.form', [ 'methodfield' => 'POST', 'buttonlabel' => 'Adicionar'])
                </form>
        </div>
        </div>
    </div>



@endsection
