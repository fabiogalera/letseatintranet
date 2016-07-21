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
        var totalBoleto = 0 ;
        var options2 = { style: "currency", currency: "BRL" };
        var boletosNum = [];
        var boletosVenc = [];
        var boletosValor = [];

        if(Leitor){
            var barcode="";
            $(document).keydown(function(e) {

                var code = (e.keyCode ? e.keyCode : e.which);
                if(code==13 || code==9)
                {
                    numero = barcode.replace(/[^0-9]/g,'');
                    barcode = '';
                    console.log(numero.length);
                    if (numero.length < 44) {
                        alert("Código de Barra não suportado");
                    }
                    if (numero.length == 44) {
                        Boleto(numero);
                    }
                    if (numero.length > 45) {
                        alert ('Nota Fiscal: ' + numero)
                    }
                }
                else
                {
                    barcode=barcode+String.fromCharCode(code);
                }
            });
        }

    function AdicionaCobranca(convertido, vencimento, valor){
        var boleto = "";
        boleto += "<tr>";
        boleto += "<th>" + convertido + "</th>";
        boleto += "<th>" + vencimento + "</th>";
        boleto += "<th>" + valor.toLocaleString("pt-BR", options2) + "</th>";
        //boleto += "<th><input class='form-control' id='vencimento' name='vencimento' type='text' required size='10' value='"+vencimento+"' /></th>";
        //boleto += "<th><input class='form-control' id='valor' name='valor' type='text' required size='10' value='"+valor+"' /></th>";
        boleto += "<th class='buttons'><a href='javascript:void(0)' class='btn btn-xs btn-danger delete-voucher'><span class='glyphicon glyphicon-remove'></span></a></th>";
        boleto += "</tr>";
        $(boleto).hide().appendTo(tabBoleto).fadeIn("slow");

    }

     function Boleto(numero){
        var convertido = calcula_linha(numero);
        var vencimento = fator_vencimento(numero.substr(5,4));
        var valor      = parseFloat((numero.substr(9,8)*1)+'.'+numero.substr(17,2));
        if(jQuery.inArray(convertido, boletosNum) !== -1) {
            alert("Boleto ja adicionado otário");
        } else {
            boletosNum.push(convertido);
            boletosVenc.push(vencimento);
            boletosValor.push(valor);
            totalBoleto = totalBoleto + valor;
            AdicionaCobranca(convertido,vencimento,valor);
            if ( numero.substr(5,4) == 0 ) {
                alert('O boleto pode ser pago em qualquer data');
            }

        }
        $("#total_boletos").html(totalBoleto.toLocaleString("pt-BR", options2));
    }

    });

    function fator_vencimento (dias) {
        //Fator contado a partir da data base 07/10/1997
        //*** Ex: 04/07/2000 fator igual a = 1001
        //alert(dias);
        var currentDate, t, d, mes;
        t = new Date();
        currentDate = new Date();
        currentDate.setFullYear(1997,9,7);//alert(currentDate.toLocaleString());
        t.setTime(currentDate.getTime() + (1000 * 60 * 60 * 24 * dias));//alert(t.toLocaleString());
        mes = (currentDate.getMonth()+1); if (mes < 10) mes = "0" + mes;
        dia = (currentDate.getDate()+1); if (dia < 10) dia = "0" + dia;
        //campo.value = dia +"."+mes+"."+currentDate.getFullYear();campo.select();campo.focus();
        return(t.toLocaleDateString("pt-BR"));
    }


    function modulo11_banco(numero)
    {

        numero = numero.replace(/[^0-9]/g,'');
        //debug('Barra: '+numero);
        var soma  = 0;
        var peso  = 2;
        var base  = 9;
        var resto = 0;
        var contador = numero.length - 1;
        //debug('tamanho:'+contador);
        // var numero = "12345678909";
        for (var i=contador; i >= 0; i--) {
            //alert( peso );
            soma = soma + ( numero.substring(i,i+1) * peso);
            //debug( i+': '+numero.substring(i,i+1) + ' * ' + peso + ' = ' +( numero.substring(i,i+1) * peso)+' soma='+ soma);
            if (peso < base) {
                peso++;
            } else {
                peso = 2;
            }
        }
        var digito = 11 - (soma % 11);
        //debug( '11 - ('+soma +'%11='+(soma % 11)+') = '+digito);
        if (digito >  9) digito = 0;
        /* Utilizar o dígito 1(um) sempre que o resultado do cálculo padrão for igual a 0(zero), 1(um) ou 10(dez). */
        if (digito == 0) digito = 1;
        return digito;
    }

    function modulo10(numero)
    {
        numero = numero.replace(/[^0-9]/g,'');
        var soma  = 0;
        var peso  = 2;
        var contador = numero.length-1;
        //alert(contador);
        //numero = '00183222173';
        //for (var i=0; i <= contador - 1; i++) {
        //alert(10);
        //for (contador=10; contador >= 10 - 1; contador--) {
        while (contador >= 0) {
            //alert(contador);
            //alert(numero.substr(contador,1));
            multiplicacao = ( numero.substr(contador,1) * peso );
            if (multiplicacao >= 10) {multiplicacao = 1 + (multiplicacao-10);}
            soma = soma + multiplicacao;
            //alert(numero.substr(contador,1)+' * '+peso+' = '+multiplicacao + ' =>' + soma) ;
            //alert(soma);
            if (peso == 2) {
                peso = 1;
            } else {
                peso = 2;
            }
            contador = contador - 1;
        }
        var digito = 10 - (soma % 10);
        //alert(numero + '\n10 - (' + soma + ' % 10) = ' + digito);
        if (digito == 10) digito = 0;
        return digito;
    }

    function calcula_linha(barra)
    {
        //var barra = form.barra.value;	// Codigo da Barra
        linha = barra.replace(/[^0-9]/g,'');
        //
        if (modulo10('399903512') != 8) alert('Função "modulo10" está com erro!');
        if (linha.length != 44) alert ('A linha do código de barras está incompleta!');
        //
        var campo1 = linha.substr(0,4)+linha.substr(19,1)+'.'+linha.substr(20,4);
        var campo2 = linha.substr(24,5)+'.'+linha.substr(24+5,5);
        var campo3 = linha.substr(34,5)+'.'+linha.substr(34+5,5);
        var campo4 = linha.substr(4,1);		// Digito verificador
        var campo5 = linha.substr(5,14);	// Vencimento + Valor
        //
        if (  modulo11_banco(  linha.substr(0,4)+linha.substr(5,99)  ) != campo4 )
            alert('Digito verificador '+campo4+', o correto é '+modulo11_banco(  linha.substr(0,4)+linha.substr(5,99)  )+'\nO sistema não altera automaticamente o dígito correto na quinta casa!');
        //
        if (campo5 == 0) campo5 = '000';
        //
        linha =	 campo1 + modulo10(campo1)
                +' '
                +campo2 + modulo10(campo2)
                +' '
                +campo3 + modulo10(campo3)
                +' '
                +campo4
                +' '
                +campo5
        ;
        //if (form.linha.value != form.linha2.value) alert('Linhas diferentes');
        return(linha);
    }


</script>

@endpush
