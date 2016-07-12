@extends('layouts.blank')

@push('stylesheets')

@endpush

@section('main_container')
 <!-- page content -->
<div class="row">
    @if (session()->has('message'))
        <div class="alert alert-{{ session('level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ session('message') }}
        </div>
    @endif
</div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph x_panel">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Funcionários <small></small></h3>
                        </div>
                        <div class="pull-right">
                            <a href='/funcionarios/create' class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> Adicionar </a>
                        </div>
                    </div>
                    <div class="x_content">
                        <div class="demo-container" style="height:250px">
                            <div id="placeholder3xx3" class="demo-placeholder" style="width: 100%; height:100%;">
                                <table id="users-table" class="table table-striped jambo_table   table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Mesa</th>
                                        <th>CPF</th>
                                        <th>Cargo</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Salário</th>
                                        <th>Nascimento</th>
                                        <th>Rua</th>
                                        <th>Número</th>
                                        <th>Cidade</th>
                                        <th>CEP</th>
                                        <th>Editar</th>
                                    </tr>
                                    </thead>
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
<script>

    function format ( d ) {

        return '<table class="table" cellpadding="3" cellspacing="1" border="0" style="padding-left:10px;">'+
                '<tr>'+
                '<td><label>Endereço:</label></td>'+
                '<td>'+d.rua+', '+ d.num + ' ' + d.comp + '</td>'+
                '<td><label>Admissão:</label></td>'+
                '<td>'+d.admissao+'</td>'+
                '<td><label>Carteira:</label></td>'+
                '<td>'+d.ctps+', '+ d.tipo + ' ' + d.serie + '</td>'+
                '<td><label>CPF:</label></td>'+
                '<td>'+d.cpf+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td><label>Cidade / CEP</label></td>'+
                '<td>'+d.cidade +'/' + d.estado +'    ' +d.cep +'</td>'+
                '<td><label>Cargo:</label></td>'+
                '<td>'+d.cargo+'</td>'+
                '<td><label>PIS:</label></td>'+
                '<td>'+d.pis+'</td>'+
                '<td><label>Telefone:</label></td>'+
                '<td>'+d.telefone+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td><label>Contato:</label></td>'+
                '<td>'+d.contato+' - ' + d.tel_contato+ '</td>'+
                '<td><label>Salário:</label></td>'+
                '<td>R$ '+ parseFloat(d.salario).toLocaleString('pt-BR') +'</td>'+
                '<td></td>'+
                '<td></td>'+
                '<td><label>Email:</label></td>'+
                '<td>'+d.email+'</td>'+
                '</tr>'+
                '</table>';
    }

$(document).ready(function() {
    var dt = $('#users-table').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', text: 'Copiar' },
            'excel', 'pdf', 'csv',
            { extend: 'print', text: 'Imprimir' },
            { extend: 'colvis', text: 'Mostrar/Esconder colunas' }
        ],
        "language": {
            "decimal":        "",
            "emptyTable":     "Nenhum dado disponível",
            "info":           "Mostrando _START_ até _END_  de  _TOTAL_",
            "infoEmpty":      "Nenhum dado encontrado",
            "infoFiltered":   "(Mostrando total de  _MAX_ entries)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_",
            "loadingRecords": "Carregando...",
            "decimal":          ",",
            "thousands":        ".",
            "processing":     "Processando...",
            "search":         "Procurar:",
            "zeroRecords":    "Nenhum dado encontrado",
            "paginate": {
                "first":      "Primeiro",
                "last":       "Último",
                "next":       "Próximo",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        },
        ajax: {
            "url": "/funcionarios/json",
            "type": "GET"
        },
        columnDefs: [
            {
                "render": function ( data, type, row ) {
                    return data +' '+ row.meio +' '+ row.sobrenome;
                },
                "targets": 0
            },
            {   render: $.fn.dataTable.render.number('.', ',', 2, 'R$ '),
                "targets": 6
            },
            {
                "render": function ( data, type, row ) {
                    var mDate = moment(data);
                    return  mDate.format("DD-MMM-YYYY");
                },
                "targets": 7
            },
            { "visible": false,  "targets": [ 6, 8, 9, 10, 11 ] }
        ],
        columns: [
            { data: 'nome', name: 'nome', class: "details-control" },
            { data: 'mesa', name: 'mesa', class: "details-control" },
            { data: 'cpf', name: 'cpf', class: "details-control", searchable: false, orderable: false},
            { data: 'cargo', name: 'cargo', class: "details-control" },
            { data: 'telefone', name: 'telefone', orderable: false, class: "details-control" },
            { data: 'email', name: 'email', class: "details-control" },
            { data: 'salario', name: 'salario', class: "details-control" },
            { data: 'nascimento', name: 'nascimento', searchable: false, class: "details-control" },
            { data: 'rua', name: 'rua', class: "details-control", searchable: false, orderable: false},
            { data: 'num', name: 'num', class: "details-control", searchable: false, orderable: false},
            { data: 'cidade', name: 'cidade', class: "details-control", searchable: false, orderable: false},
            { data: 'cep', name: 'cep', class: "details-control", searchable: false, orderable: false},
            { data: 'edit', name: 'edit', orderable: false, searchable: false}
        ],
        order: [[1, 'asc']]
        ,
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
            });
        }
    } );
    // Array to track the ids of the details displayed rows
    var detailRows = [];

    $('#users-table tbody').on( 'click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );

        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();

            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();

            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );

    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );
} );

</script>
@endpush