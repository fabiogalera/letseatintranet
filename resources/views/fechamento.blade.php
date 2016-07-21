
@extends('layouts.blank')


@push('stylesheets')
<link href="{{ asset("css/bootstrap-tagsinput.css") }}" rel="stylesheet">
@endpush


@push('modal')
        <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Gastos em Dinheiro</h4>
            </div>
            <div class="modal-body">
                <div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Adicionar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Troco Extra</h4>
            </div>
            <div class="modal-body">
                <div>
                    <input type="text" class="form-control money-bank" id="troco_extra" name="troco_extra" placeholder="R$0,00">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Adicionar</button>
            </div>
        </div>
    </div>
</div>
@endpush

@section('main_container')
        <!-- page content -->

<div class="panel panel-danger col-md-12">
    <div class="panel-body" style="vertical-align:top;">
        <h2>
            <div class="pull-left" id="txt">
            </div>
        </h2>
        <div class="pull-right" style="padding-left:5px;">
            <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> GASTOS </button>
        </div>
        <div class="pull-right" style="padding-left:5px;">
            <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-plus"></span> TROCO </button>
        </div>
    </div></div>


<form class="form-horizontal">

    <section class="container-fluid" id="stats">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-danger col-md-3">
                    <div class="panel-heading">
                        <i class="fa fa-cc-mastercard  fa-lg"></i>
                        <strong>GetNet 1</strong>
                    </div>
                    <div class="panel-body">
                        <label >MASTER DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet1_masterdeb" name="getnet1_masterdeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >MASTER CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet1_mastercred" name="getnet1_mastercred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >VISA DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet1_visadeb" name="getnet1_visadeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >VISA CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet1_visacred" name="getnet1_visacred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >ELO DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet1_elodeb" name="getnet1_elodeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >ELO CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet1_elocred" name="getnet1_elocred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >AMEX</label>
                        <div><input type="text" class="form-control money-bank" id="getnet1_amex" name="getnet1_amex" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >SODEXO</label>
                        <div><input type="text" class="form-control money-bank" id="getnet1_sodexo" name="getnet1_sodexo" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >TICKET</label>
                        <div><input type="text" class="form-control money-bank" id="getnet1_ticket" name="getnet1_ticket" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <center><label>Total</label></center>
                        <div><input type="text" class="form-control" id="getnet1" name="getnet1"  placeholder="0,00" disabled></div>
                    </div>
                </div>
                <div class="panel panel-danger col-md-3">
                    <div class="panel-heading">
                        <i class="fa fa-cc-mastercard fa-lg"></i>
                        <strong>GetNet 2</strong>
                    </div>
                    <div class="panel-body">
                        <label >MASTER DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet2_masterdeb" name="getnet2_masterdeb"  onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >MASTER CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet2_mastercred" name="getnet2_mastercred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >VISA DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet2_visadeb" name="getnet2_visadeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >VISA CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet2_visacred" name="getnet2_visacred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >ELO DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet2_elodeb" name="getnet2_elodeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >ELO CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet2_elocred" name="getnet2_elocred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >AMEX</label>
                        <div><input type="text" class="form-control money-bank" id="getnet2_amex" name="getnet2_amex" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >SODEXO</label>
                        <div><input type="text" class="form-control money-bank" id="getnet2_sodexo" name="getnet2_sodexo" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >TICKET</label>
                        <div><input type="text" class="form-control money-bank" id="getnet2_ticket" name="getnet2_ticket" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <center><label>Total</label></center>
                        <div><input type="text" class="form-control" id="getnet2" name="getnet2" placeholder="R$0,00" disabled></div>
                    </div>
                </div>
                <div class="panel panel-danger col-md-3">
                    <div class="panel-heading">
                        <i class="fa fa-cc-mastercard  fa-lg"></i>
                        <strong>GetNet 3</strong>
                    </div>
                    <div class="panel-body">
                        <label >MASTER DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet3_masterdeb" name="getnet3_masterdeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >MASTER CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet3_mastercred" name="getnet3_mastercred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >VISA DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet3_visadeb" name="getnet3_visadeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >VISA CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet3_visacred" name="getnet3_visacred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >ELO DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet3_elodeb" name="getnet3_elodeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >ELO CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet3_elocred" name="getnet3_elocred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >AMEX</label>
                        <div><input type="text" class="form-control money-bank" id="getnet3_amex" name="getnet3_amex" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >SODEXO</label>
                        <div><input type="text" class="form-control money-bank" id="getnet3_sodexo" name="getnet3_sodexo" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >TICKET</label>
                        <div><input type="text" class="form-control money-bank" id="getnet3_ticket" name="getnet3_ticket" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <center><label>Total</label></center>
                        <div><input type="text" class="form-control" id="getnet3" name="getnet3" placeholder="R$0,00" disabled></div>
                    </div>
                </div>
                <div class="panel panel-danger col-md-3">
                    <div class="panel-heading">
                        <i class="fa fa-cc-mastercard  fa-lg"></i>
                        <strong>GetNet 4</strong>
                    </div>
                    <div class="panel-body">
                        <label >MASTER DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet4_masterdeb" name="getnet4_masterdeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >MASTER CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet4_mastercred" name="getnet4_mastercred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >VISA DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet4_visadeb" name="getnet4_visadeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >VISA CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet4_visacred" name="getnet4_visacred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >ELO DEB</label>
                        <div><input type="text" class="form-control money-bank" id="getnet4_elodeb" name="getnet4_elodeb" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >ELO CRED</label>
                        <div><input type="text" class="form-control money-bank" id="getnet4_elocred" name="getnet4_elocred" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >AMEX</label>
                        <div><input type="text" class="form-control money-bank" id="getnet4_amex" name="getnet4_amex" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >SODEXO</label>
                        <div><input type="text" class="form-control money-bank" id="getnet4_sodexo" name="getnet4_sodexo" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <label >TICKET</label>
                        <div><input type="text" class="form-control money-bank" id="getnet4_ticket" name="getnet4_ticket" onblur="SomarTotal(this.id,this.value);" placeholder="0,00"></div>
                        <center><label>Total</label></center>
                        <div><input type="text" class="form-control" id="getnet4" name="getnet4" placeholder="R$0,00" disabled></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="panel panel-default col-md-6 ">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart fa-lg"></i>
                        <strong>GetNet Total</strong>
                    </div>
                    <div class="panel-body">
                        <label for="full_name_id">MASTER DEB</label>
                        <div><input type="text" class="form-control money-bank" id="masterdeb_total" name="getnet_masterdeb" placeholder="R$0,00" disabled></div>
                        <label >MASTER CRED</label>
                        <div><input type="text" class="form-control money-bank" id="mastercred_total" name="getnet_mastercred" placeholder="R$0,00" disabled></div>
                        <label >VISA DEB</label>
                        <div><input type="text" class="form-control money-bank" id="visadeb_total" name="getnet_visadeb" placeholder="R$0,00" disabled></div>
                        <label >VISA CRED</label>
                        <div><input type="text" class="form-control money-bank" id="visacred_total" name="getnet_visacred"  placeholder="R$0,00" disabled></div>
                        <label >ELO DEB</label>
                        <div><input type="text" class="form-control money-bank" id="elodeb_total" name="getnet_elodeb" placeholder="R$0,00" disabled></div>
                        <label >ELO CRED</label>
                        <div><input type="text" class="form-control money-bank" id="elocred_total" name="getnet_elocred"  placeholder="R$0,00" disabled></div>
                        <label >AMEX</label>
                        <div><input type="text" class="form-control money-bank" id="amex_total" name="getnet_amex"  placeholder="R$0,00" disabled></div>
                        <label >SODEXO</label>
                        <div><input type="text" class="form-control money-bank" id="sodexo_total" name="getnet_sodexo" placeholder="R$0,00" disabled></div>
                        <label >TICKET</label>
                        <div><input type="text" class="form-control money-bank" id="ticket_total" name="getnet_ticket" placeholder="R$0,00" disabled></div>
                        <center><label>Total</label></center>
                        <div><input type="text" class="form-control" id="getnet" name="getnet" placeholder="R$0,00" disabled></div>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="row">
                        <div class="panel panel-info col-md-12 ">
                            <div class="panel-heading">
                                <i class="fa fa-cc-mastercard fa-lg"></i>
                                <strong>Cielo</strong>
                            </div>
                            <div class="panel-body">
                                <label >ALELO</label>
                                <div><input type="text" class="form-control money-bank" id="alelo" name="cielo_alelo" onblur="SomarTotalCielo(this.id,this.value);" placeholder="0,00"></div>
                                <label >DINNERS</label>
                                <div><input type="text" class="form-control money-bank" id="dinners" name="cielo_dinners" onblur="SomarTotalCielo(this.id,this.value);" placeholder="0,00"></div>
                                <center><label>Total</label></center>
                                <div><input type="text" class="form-control" id="cielo" name="cielo" placeholder="R$0,00" disabled></div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-warning col-md-12 ">
                            <div class="panel-heading">
                                <i class="fa fa-money fa-lg"></i>
                                <strong>Cortesia</strong>
                            </div>
                            <div class="panel-body">
                                <div><input type="text" class="form-control money-bank" id="cortesia" name="cortesia" onblur="CalculaTotal();" placeholder="0,00"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-success col-md-12 ">
                            <div class="panel-heading">
                                <i class="fa fa-money fa-lg"></i>
                                <strong>Dinheiro</strong>
                            </div>
                            <div class="panel-body">
                                <div><input type="text" class="form-control money-bank" id="dinheiro" name="dinheiro" onblur="CalculaTotal();" placeholder="0,00"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-primary col-md-12 ">
                            <div class="panel-heading">
                                <i class="fa fa-money fa-lg"></i>
                                <strong>TOTAL VENDAS</strong>
                            </div>
                            <div class="panel-body">
                                <div>
                                    <center><h2><div id="total">R$ 0,00</div></h2></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-success col-md-5 ">
                <div class="panel-heading">
                    <strong>CONTAGEM</strong>
                </div>
                <div class="panel-body">
                    <div class="col-md-6 ">
                        <div class="panel panel-success col-md-12 ">
                            <div class="panel-heading">
                                <i class="fa fa-money fa-lg"></i>
                                <strong>Dinheiro</strong>
                            </div>
                            <div class="panel-body">
                                <label >R$100,00</label>
                                <div>
                                    <input type="text" class="" id="nota_100" name="nota_100" onblur="CalculaDinheiro(); recalculateSum2();" placeholder=0 size=3>
                                    <input type="text" class="" id="total_100" name="total_100" placeholder="R$0,00" disabled size=8>
                                </div>
                                <label >R$50,00</label>
                                <div>
                                    <input type="text" class="" id="nota_50" name="nota_50" onblur="CalculaDinheiro(); recalculateSum2();" placeholder="0" size=3>
                                    <input type="text" class="" id="total_50" name="total_50" placeholder="R$0,00" disabled size=8>
                                </div>
                                <label >R$20,00</label>
                                <div>
                                    <input type="text" class="" id="nota_20" name="nota_20" onblur="CalculaDinheiro(); recalculateSum2();" placeholder="0" size=3>
                                    <input type="text" class="" id="total_20" name="total_20" placeholder="R$0,00" size=8 disabled>
                                </div>
                                <label >R$10,00</label>
                                <div>
                                    <input type="text" class="" id="nota_10" name="nota_10" onblur="CalculaDinheiro(); recalculateSum2();" placeholder="0" size=3>
                                    <input type="text" class="" id="total_10" name="total_10" placeholder="R$0,00" disabled size=8>
                                </div>
                                <label >R$5,00</label>
                                <div>
                                    <input type="text" class="" id="nota_5" name="nota_5" onblur="CalculaDinheiro(); recalculateSum2();" placeholder="0" size=3>
                                    <input type="text" class="" id="total_5" name="total_5" placeholder="R$0,00" disabled size=8>
                                </div>
                                <label >R$2,00</label>
                                <div>
                                    <input type="text" class="" id="nota_2" name="nota_2" onblur="CalculaDinheiro(); recalculateSum2();" placeholder="0" size=3>
                                    <input type="text" class="" id="total_2" name="total_2" placeholder="R$0,00" disabled size=8>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="panel panel-default col-md-12 ">
                            <div class="panel-heading">
                                <i class="fa fa-money fa-lg"></i>
                                <strong>Moeda</strong>
                            </div>
                            <div class="panel-body">
                                <label >R$1,00</label>
                                <div>
                                    <input type="text" class="" id="nota_1" name="nota_1" onblur="CalculaDinheiro(); recalculateSum2();" placeholder="0" size=3>
                                    <input type="text" class="" id="total_1" name="total_1" placeholder="R$0,00" disabled size=8>
                                </div>
                                <label >R$0,50</label>
                                <div>
                                    <input type="text" class="" id="nota_050" name="nota_050" onblur="CalculaDinheiro(); recalculateSum2();" placeholder="0" size=3>
                                    <input type="text" class="" id="total_050" name="total_050" placeholder="R$0,00" disabled size=8>
                                </div>
                                <label >R$0,25</label>
                                <div>
                                    <input type="text" class="" id="nota_025" name="nota_025" onblur="CalculaDinheiro(); recalculateSum2();" placeholder="0" size=3>
                                    <input type="text" class="" id="total_025" name="total_025" placeholder="R$0,00" disabled size=8>
                                </div>
                                <label >R$0,10</label>
                                <div>
                                    <input type="text" class="" id="nota_010" name="nota_010" onblur="CalculaDinheiro(); recalculateSum2();" placeholder="0" size=3>
                                    <input type="text" class="" id="total_010" name="total_010" placeholder="R$0,00" disabled size=8>
                                </div>
                                <label >R$0,05</label>
                                <div>
                                    <input type="text" class="" id="nota_005" name="nota_005" onblur="CalculaDinheiro(); recalculateSum2();" placeholder="0" size=3>
                                    <input type="text" class="" id="total_005" name="total_005" placeholder="R$0,00" disabled size=8>
                                </div>
                                <center><label>Total</label></center>
                                <div><input type="text" class="form-control" id="dinheiro_contado" name="dinheiro_contado" placeholder="R$0,00" disabled></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="row">
                    <div class="panel panel-info col-md-12 ">
                        <div class="panel-heading">
                            <i class="fa fa-cc-mastercard fa-lg"></i>
                            <strong>SIMULADOR</strong>
                        </div>
                        <div class="panel-body">
                            <div>Troco inicial <input type="text" class="form-control money-bank" id="troco" name="troco" onblur="recalculateSum2();" placeholder="0,00"></div>
                            <div>Gastos do dia <input type="text" class="form-control money-bank" id="gastos" name="gastos" onblur="recalculateSum2();" placeholder="0,00"></div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-primary col-md-12 ">
                        <div class="panel-heading">
                            <i class="fa fa-money fa-lg"></i>
                            <strong>TOTAL CONFERENCIA</strong>
                        </div>
                        <div class="panel-body">
                            <div>
                                <div id="total_conferencia">
                                    <table class="table table-sm">
                                        <tbody>
                                        <tr>
                                            <th>Troco Inicial (=) </th><th><div id="div_troco">R$0,00</div></th>
                                        </tr>
                                        <tr>
                                            <th>Vendas (+) </th><th><div id="div_vendas">R$0,00</div></th>
                                        </tr>
                                        <tr>
                                            <th>Gastos (-) </th><th><div id="div_gastos">R$0,00</div></th>
                                        </tr>
                                        <tr>
                                            <th>Dinheiro CAIXA (-) </th><th><div id="div_dinheiro_contado">R$0,00</div></th>
                                        </tr>
                                        <tr id="trconf" class="active">
                                            <th colspan="2"><h2><center><div id="div_conf">R$0,00</div></center></h2></th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="panel panel-primary col-md-12 ">
                    <div class="panel-heading">
                        <i class="fa fa-money fa-lg"></i>
                        <strong>CHECAGEM (CTRL+F)</strong>
                    </div>
                    <div class="panel-body">
                        <div>
                            <div id="div_f">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</form>


<!-- /page content -->
@endsection

@push('scripts')
<script src="{{ asset("js/fechamento.js") }}"></script>

<script>
    (function () {
        var video = document.getElementById('video'),
                    vendorUrl = windows.URL || window.webkitURL;

        navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

        navigator.getMEdia({
            video: true,
            audio: false
        }, function(stream) {
            video.src = vendorUrl.createObjectURL(stream);
            video.play();
        }, function(error) {
            // An error occured
        });

    })();

</script>
@endpush