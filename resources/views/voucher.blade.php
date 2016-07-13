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
                    <h3>Voucher <small></small></h3>
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

                        <form accept-charset="UTF-8" action="javascript:void(0);" class="new_voucher" id="new_voucher" method="post">

                            <div class="form-group">
                                <label for="voucher_name">Nome</label><br>
                                <input class="form-control" id="voucher_name" name="nome" type="text" required />
                            </div>
                            <div class="form-group">
                                <label for="voucher_items">Items</label><br>
                                <input class="form-control" id="voucher_items" name="lista" type="text" required />
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary voucher-add" name="commit" type="submit" value="Salvar" />
                            </div>
                        </form>

                        <form role="search" id="search-product-form" >
                            <div class="input-group col-md-3 pull-left margin-right-1em">

                                <input type="text" class="form-control" placeholder="Nome e Sobrenome" name="s" id="srch-term" value=""/>
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" id="btn-search-product" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

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