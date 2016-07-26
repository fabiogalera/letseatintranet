@extends('layouts.blank')

@push('stylesheets')

@endpush

@section('main_container')
        <!-- page content -->

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Cobrança <small>{{session('franqueado')[0]->identificador}}</small></h3>
                </div>
                <div class="pull-right">
                    <a href='/cobranca/create' class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> Adicionar </a>
                </div>
            </div>
            <div class="x_content">
                <div class="demo-container" style="height:250px">
                    <div id="placeholder3xx3" class="demo-placeholder" style="width: 100%; height:100%;">
                        <div class="row">
                            @if (session()->has('message'))
                                <div class="alert alert-{{ session('level') }}">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>


                        <form accept-charset="UTF-8" action="javascript:void(0);" class="new_boleto" id="new_boleto"
                              method="post">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-danger col-md-12">
                                        <ul class="nav nav-pills" style="margin-top: 10px">
                                            <li role="presentation" class="active"><a data-toggle="pill" href="#boleto">Boleto</a></li>
                                            <li role="presentation"><a data-toggle="pill" href="#transfer">Transfrência</a></li>
                                            <li role="presentation"><a data-toggle="pill" href="#money">Dinheiro</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="boleto" class="tab-pane fade in active" style="margin-top: 20px;">

                                                <!-- BOLETOS -->
                                                <table id="boleto-table"
                                                       class="table table-hover table-striped jambo_table table-bordered"
                                                       width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Boleto</th>
                                                        <th width="15%">Vencimento</th>
                                                        <th width="10%">Valor</th>
                                                        <th width="10%">Editar</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class='tbody'  id="boleto-tbody">
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th class="text-right">Total:</th>
                                                            <th colspan="3"><div id="total_boletos"></div></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>


                                                <!-- BOLETOS -->

                                            </div>
                                            <div id="transfer" class="tab-pane fade" style="margin-top: 20px;">
                                                <h3>Menu 1</h3>
                                                <p>Some content in menu 1.</p>
                                            </div>
                                            <div id="money" class="tab-pane fade" style="margin-top: 20px;">
                                                <h3>Menu 2</h3>
                                                <p>Some content in menu 2.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-danger col-md-12">
                                        <ul class="nav nav-pills" style="margin-top: 10px">
                                            <li class="active"><a data-toggle="pill" href="#nota">Nota Fiscal</a></li>
                                            <li><a data-toggle="pill" href="#semnota">Sem Nota</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="nota" class="tab-pane fade in active" style="margin-top: 20px;">

                                                <!-- BOLETOS -->
                                                <table id="xml-table"
                                                       class="table table-hover table-striped jambo_table table-bordered"
                                                       width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Chave XML</th>
                                                        <th width="15%">Status</th>
                                                        <th width="10%">Editar</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class='tbody' id="xml-tbody">
                                                    <tr>
                                                        <th></th>
                                                        <th><span class=" label label-danger">NÃO ENCONTRADO</span></th>
                                                        <th class='buttons'><a href="javascript:void(0)" class="btn btn-xs btn-danger delete-boleto"><span
                                                                        class="glyphicon glyphicon-remove"></span></a></th>
                                                    </tr>
                                                    <tbody>
                                                </table>

                                                <!-- BOLETOS -->


                                            </div>
                                            <div id="semnota" class="tab-pane fade">
                                                <h3>Menu 2</h3>
                                                <p>Some content in menu 2.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary voucher-add" name="commit" type="submit" value="Salvar"/>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- /page content -->
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        tabBoleto = $("#boleto-tbody");
        tabXML = $("#xml-tbody");
        var Leitor = true;
        var totalBoleto = 0;
        var options2 = {style: "currency", currency: "BRL"};
        var cobranca = [];

        if (Leitor) {
            var barcode = "";
            $(document).keydown(function (e) {

                var code = (e.keyCode ? e.keyCode : e.which);
                if (code == 13 || code == 9) {
                    numero = barcode.replace(/[^0-9]/g, '');
                    barcode = '';
                }
                else {
                    barcode = barcode + String.fromCharCode(code);
                }
            });
        }

        function AdicionaCobranca(obj) {
            var html = "<tr>";
            html += "<th>" + convertido + "</th>";
            html += "<th>" + vencimento + "</th>";
            html += "<th>" + valor.toLocaleString("pt-BR", options2) + "</th>";
            //boleto += "<th><input class='form-control' id='vencimento' name='vencimento' type='text' required size='10' value='"+vencimento+"' /></th>";
            //boleto += "<th><input class='form-control' id='valor' name='valor' type='text' required size='10' value='"+valor+"' /></th>";
            html += "<th class='buttons'><a href='javascript:void(0)' class='btn btn-xs btn-danger delete-voucher'><span class='glyphicon glyphicon-remove'></span></a></th>";
            html += "</tr>";
            $(html).hide().appendTo(tabBoleto).fadeIn("slow");
        }
    });

</script>

@endpush
