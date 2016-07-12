
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Let's Eat ® - Intranet </title>

    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset("css/bootstrap-social.css") }}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>


    <div class="login_wrapper">
        <div class="animate form login_form">
                    <div class="form-group center-block"><img src="{{ asset("images/logo-lets.png") }}" width="240" height="272"/></div>
                        <br />

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if (session()->has('message'))
                                    <div class="alert alert-{{ session('level') }}">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <br />
                        <br />
                    </div>
        </div>

                    <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook">
                        <span class="fa fa-facebook"></span> Logar com Facebook
                    </a>
                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <p>©2016 Todos os direitos reservados. Let's Eat ® - Marca registrada de Marcos Nunes.</p>
                        </div>
                    </div>
    </div>
</div>
</body>
</html>