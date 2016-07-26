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
                    <h3>Fornecedores <small></small></h3>
                </div>
                <div class="pull-right">
                    <a href='/fornecedores/create' class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> Adicionar </a>
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
                        <table id="users-table" class="table table-striped jambo_table   table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Apelido</th>
                                <th>Razão</th>
                                <th>CNPJ</th>
                                <th>Email</th>
                                <th>Contato</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
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
                "url": "/fornecedores/json",
                "type": "GET"
            },
            columnDefs: [
                { "visible": false,  "targets": [ 7, 8 ] }
            ],
            columns: [
                { data: 'apelido', name: 'apelido', class: "details-control" },
                { data: 'razao', name: 'razao', class: "details-control" },
                { data: 'cnpj', name: 'cnpj', class: "details-control" },
                { data: 'email', name: 'email', class: "details-control" },
                { data: 'contato', name: 'contato', orderable: false, class: "details-control" },
                { data: 'telefone', name: 'telefone', class: "details-control" },
                { data: 'endereco', name: 'endereco', class: "details-control" },
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