@extends('layouts.blank')

@push('stylesheets')
<link href="{{ asset("css/bootstrap-tagsinput.css") }}" rel="stylesheet">
@endpush

@section('main_container')
        <!-- page content -->

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph x_panel">
            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Voucher
                        <small>{{session('franqueado')[0]->identificador }}</small>
                    </h3>
                </div>
            </div>
            <div class="x_content">
                <div class="input-group col-md-12 margin-right-1em">
                    <div class="row">

                    </div>

                    <form accept-charset="UTF-8" action="javascript:void(0);" class="new_voucher" id="new_voucher"
                          method="post">
                        <input type="hidden" name="site_id" value="{{ session('franqueado')[0]->id }}">
                        <input type="hidden" id="cidade" value="{{ session('franqueado')[0]->identificador }}">
                        <label for="voucher_name">Nome</label><br>
                        <div class="input-group col-md-3 margin-right-1em">
                            <input type="text" class="form-control" placeholder="Nome Completo" name="nome"
                                   id="voucher_name" value=""/ autofocus>
                        </div>
                        <label for="voucher_name">Items</label><br>
                        <div class="input-group col-md-12 margin-right-1em">
                            <input type="text" class="form-control" name="lista" id="voucher_items" value="" data-role="tagsinput" size="20"/>
                        </div>

                        <div class="input-group col-md-3 margin-right-1em">
                            <div class="input-group-bt">
                                <input class="btn btn-primary voucher-add" name="commit" type="submit"
                                       value="Adicionar"/>
                            </div>
                        </div>
                    </form>
                    <div class="input-group col-md-12 margin-right-1em">
                    <div id="msg">
                    </div>
                        </div>
                    <form role="search" id="search-product-form">
                        <label for="voucher_name">Pesquisar</label><br>
                        <div class="input-group col-md-3 margin-right-1em">
                            <input type="text" class="form-control" placeholder="Nome e Sobrenome" name="s"
                                   id="srch-term" value=""/>
                            <div class="input-group-btn">
                                <button class="btn btn-primary" id="btn-search-product" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="vouchers-table"
                               class="table table-hover table-responsive table-striped jambo_table table-bordered"
                               width="100%">
                            <thead>
                            <tr>
                                <th width="15%">Data</th>
                                <th width="15%">Nome</th>
                                <th>Items</th>
                                <th width="10%">Franqueado</th>
                                <th width="10%">Editar</th>
                            </tr>
                            </thead>
                            <tbody class='tbody'>
                            @foreach($vouchers as $voucher)
                                <tr voucher_id="{{$voucher->id }}">
                                <th class='show-voucher'>{{$voucher->data->formatLocalized('%d-%B-%Y') }}
                                @if ($voucher->data < $expired)
                                        <span class=" label label-danger">VENCIDO</span>
                                @endif </th>
                                <th class='show-voucher nome'>{{$voucher->nome }}</th>
                                <th class='edit-voucher'>{{$voucher->lista }}</th>
                                <th class='show-voucher'> {{$voucher->franqueado->identificador }}</th>
                                <th class='buttons'><a href="javascript:void(0)" class="btn btn-xs btn-danger delete-voucher"><span
                                                class="glyphicon glyphicon-remove"></span></a></th>
                                </tr>
                            <tr class="voucher-details" id="{{$voucher->id }}" style="display:none;"><th colspan="5"></th></tr>
                            @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
@endsection

@push('scripts')
<!-- jQuery Tags Input -->
<script src="{{ asset("js/bootstrap-tagsinput.js") }}"></script>
<!-- jQuery Tags Input -->

<!-- /jQuery Tags Input -->


<script>
    $(document).ready(function () {
        var msg = document.getElementById("msg");
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        var loja_cidade = $("#cidade").val();
        $(".voucher-add").on("click", function (e) {
            e.preventDefault();
            $(this).attr("disabled", true);
            var nome = document.getElementById("voucher_name").value;
            var lista = document.getElementById("voucher_items").value;
            if (!nome || !lista) {
                alert("Preencha todos os campos!");
                $(this).attr("disabled", false);
                return false;
            }
            $.ajax({
                type: "POST",
                url: "/voucher",
                data: $("#new_voucher").serialize(),
                success: function (data) {
                    var id = data;
                    if (id > 0) {
                        var date = moment().locale("pt").format('DD-MMMM-YYYY');
                        msg.classList.add('alert');
                        msg.classList.add('alert-success');
                        $("#msg").html("<strong>Sucesso!</strong> Voucher criado com sucesso!");
                        var vouchers = "";
                        vouchers += "<tr voucher-id='" + id + "'>";
                        vouchers += "<th class='show-voucher'>" + date + "</th>";
                        vouchers += "<th class='show-voucher nome'>" + nome + "</th>";
                        vouchers += "<th class='edit-voucher' >" + lista + "</th>";
                        vouchers += "<th class='show-voucher'>" + loja_cidade + "</th>";
                        vouchers += "<th class='buttons'><a href='javascript:void(0)' class='btn btn-xs btn-danger delete-voucher'><span class='glyphicon glyphicon-remove'></span></a></th>";
                        vouchers += "</tr>";
                        $(vouchers).hide().prependTo(".tbody").fadeIn("slow");
                        console.log($(vouchers).find(".edit-voucher"));
                        document.getElementById("voucher_name").value = "";
                        $("#voucher_items").tagsinput('removeAll');
                        $("#voucher_name").focus();
                        $(".voucher-add").attr("disabled", false);
                        enableClick();
                    } else {
                        msg.classList.add('alert');
                        msg.classList.add('alert-danger');
                        $("#msg").html('<strong>Error!</strong> Voucher não foi criado!');
                        $(".voucher-add").attr("disabled", false);
                    }
                }
            });
        });
    });

    var c_items;

    function changeEdit(e) {
        disableClick();
        c_items =  ($(e).text());
        var buttons = $(e).parent().find(".buttons").html;
        $(e).html("<input type='text' name='EditLista' id='EditLista' value='" + c_items + "' data-role='tagsinput'>");
        $("#EditLista").tagsinput('refresh');
        var bt1 = "<button type='button' class='btn btn-success btn-xs save-voucher'><span class='glyphicon glyphicon-edit'></span></button>";
        var bt2 = "<button type='button' class='cancel-voucher btn btn-danger btn-xs'><span class='glyphicon glyphicon-chevron-left'></span></button>";
        $(e).parent().find(".buttons").html(bt1+bt2);
    }

    $(".edit-voucher").click(function(){
        changeEdit($(this));
    });

    $(document).on("click", ".save-voucher", function () {
        SaveEdit($(this))
    });

    $(document).on("click", ".cancel-voucher", function () {
        CancelEdit($(this))
    });

    function disableClick() {
        $(".edit-voucher").each(function() {
            $(this).off('click');
        });
    }

    function enableClickOne(e) {
            $(e).click('click', function () {
                changeEdit($(this));
            } );
    }

    function enableClick() {
        $(".edit-voucher").each(function() {
            $(this).click('click', function () {
                changeEdit($(this));
            } );
        });
    }

    function SaveEdit(e) {
        var tr = $(e).parent().parent();
        var th = $(e).parent();
        var id = tr.attr('voucher_id');
        var lista_antiga = c_items;
        var lista_nova = tr.find("#EditLista").val();
        $.post("voucher/" + id, {
            lista : lista_nova,
            id:	id,
            listaanterior: lista_antiga
        }).done(function(data){
            th.html("<a href='javascript:void(0)' class='btn btn-xs btn-danger delete-voucher'><span class='glyphicon glyphicon-remove'></span></a>");
            tr.find(".edit-voucher").html(lista_antiga);
            msg.classList.add('alert');
            msg.classList.add('alert-success');
            msg.innerHTML = data;
        });
        enableClick();
    }

    function CancelEdit(e) {
        var tr = $(e).parent().parent();
        var th = $(e).parent();
        th.html("<a href='javascript:void(0)' class='btn btn-xs btn-danger delete-voucher'><span class='glyphicon glyphicon-remove'></span></a>");
        tr.find(".edit-voucher").html(c_items);
        enableClick();
    };


    // SHOW DETAILS
    $(document).on("click", ".show-voucher", function(e){
        e.preventDefault();
        var tr=$(this).parents('tr');
        var tr2=$(this).closest('tr').next('tr')
        var id = tr.attr('voucher_id');
        if ( tr.next().css('display') == 'none' ){
            $.ajax({
                type: "GET",
                url: "/voucher_audit/"+id,
                data: { },
                success: function(data)
                {
                    console.log(data);
                    tr2.children(0).text(data);
                    console.log(tr2.children(0));
                }
            });
        }
        tr.next().toggle('fast');
    });

// DELETE VOUCHER
    $(document).on("click", ".delete-voucher", function(){
        var tr=$(this).parent().parent();
        var id = tr.attr('voucher_id');
        var nome = tr.find(".nome").text();
        $(".voucher-details").fadeOut("Slow");
        // show user a confirmation pop up
        if(confirm("Confirma? " + nome)){
            $.ajax({
                type: "POST",
                url: "voucher/"+ id +"/delete",
                data: { id:id},
                success: function(data)
                {
                    tr.fadeOut("fast", function() { $(this).remove(); });
                    msg.classList.add('alert');
                    msg.classList.add('alert-success');
                    msg.innerHTML = data;
                }
            });
        }
    });




</script>
@endpush