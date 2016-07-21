@extends('layouts.blank')

@push('stylesheets')

@endpush

@section('main_container')
        <!-- page content -->

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count red">
            <span class="count_top"><i class="fa fa-money"></i> Hoje</span><small></small>
            <div class="count">R$ 10.500,00</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count red">
            <span class="count_top"><i class="fa fa-money"></i> Amanhã</span><small></small>
            <div class="count">R$ 10.500,00</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count red">
            <span class="count_top"><i class="fa fa-money"></i> Essa Semana</span>
            <div class="count">R$ 2.500,00</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count red">
            <span class="count_top"><i class="fa fa-money"></i> Total Contas à Pagar</span>
            <div class="count">R$ 4.640,00</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Cobranças</span>
            <div class="count">1025</div>
        </div>
    </div>
</div>
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

                        <!-- page BODY -->
                        <table id="cobranca-table"
                               class="table table-hover table-striped jambo_table table-bordered"
                               width="100%">
                            <thead>
                            <tr>
                                <th width="10%">Data</th>
                                <th width="15%">Fornecedor</th>
                                <th width="10%">Forma de Pagamento</th>
                                <th width="10%">Status</th>
                                <th width="10%">Valor</th>
                                <th width="10%">Editar</th>
                            </tr>
                            </thead>
                            <tbody class='tbody'>
                                <tr>
                                    <th>10-Junho-2016</th>
                                    <th>WESSEL</th>
                                    <th>BOLETO</th>
                                    <th><span class="label label-danger">ABERTO</span></th>
                                    <th>R$ 22.450,29</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>10-Junho-2016</th>
                                    <th>MARIUSSO</th>
                                    <th>BOLETO</th>
                                    <th><span class="label label-success">PAGO</span></th>
                                    <th>R$ 3.450,29</th>
                                    <th></th>
                                </tr>
                            {{--@foreach($vouchers as $voucher)--}}
                                {{--<tr voucher_id="{{$voucher->id }}">--}}
                                    {{--<th class='show-voucher'>{{$voucher->data->formatLocalized('%d-%B-%Y') }}--}}
                                        {{--@if ($voucher->data < $expired)--}}
                                            {{--<span class=" label label-danger">VENCIDO</span>--}}
                                        {{--@endif </th>--}}
                                    {{--<th class='show-voucher nome'>{{$voucher->nome }}</th>--}}
                                    {{--<th class='edit-voucher'>{{$voucher->lista }}</th>--}}
                                    {{--<th class='show-voucher'> {{$voucher->franqueado->identificador }}</th>--}}
                                    {{--<th class='buttons'><a href="javascript:void(0)" class="btn btn-xs btn-danger delete-voucher"><span--}}
                                                    {{--class="glyphicon glyphicon-remove"></span></a></th>--}}
                                {{--</tr>--}}
                                {{--<tr class="voucher-details" id="{{$voucher->id }}" style="display:none;"><th colspan="5"></th></tr>--}}
                            {{--@endforeach--}}
                            <tbody>
                        </table>



                        <!-- /page BODY-->



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
@endsection

@push('scripts')

@endpush