<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=2">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Let's Eat - Intranet </title>

    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset("vendors/iCheck/skins/flat/green.css") }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset("vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="{{ asset("css/maps/jquery-jvectormap-2.0.3.css" ) }}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset("vendors/google-code-prettify/bin/prettify.min.css") }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset("vendors/select2/dist/css/select2.min.css") }}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ asset("vendors/switchery/dist/switchery.min.css") }}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{ asset("vendors/starrr/dist/starrr.css") }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/b-1.2.1/b-colvis-1.2.1/b-html5-1.2.1/b-print-1.2.1/datatables.min.css"/>


    @stack('stylesheets')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        @stack('modal')

        @include('includes/sidebar')

        @include('includes/topbar')

        <div class="right_col" role="main">
            <div class="">
                @yield('main_container')
                <footer>
                    <div class="pull-right">
                        Copyright C Let's Eat
                    </div>
                    <div class="clearfix"></div>
                </footer>
            </div>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="{{ asset("vendors/jquery/dist/jquery.js") }}"></script>
<!-- Bootstrap -->
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<!-- DataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/b-1.2.1/b-colvis-1.2.1/b-html5-1.2.1/b-print-1.2.1/datatables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.12/dataRender/datetime.js"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset("js/gentelella.min.js") }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset("js/moment/moment.min.js") }}"></script>
<script src="{{ asset("js/datepicker/daterangepicker.js") }}"></script>
<script>
    var datapicker_option = {
        "singleDatePicker": true,
        "showDropdowns": true,
        locale: {
            "format": "DD-MM-YYYY",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sab"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            "firstDay": 1
        },
        "minDate": "10/01/1950",
        "maxDate": moment(),
        "drops": "up"

    }
</script>
@stack('scripts')
        <!-- jquery.mask -->
<script src="{{ asset("js/jquery.mask.js") }}"></script>

</body>
</html>