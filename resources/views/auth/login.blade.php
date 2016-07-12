
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
<form>
<div class="animate form login_form">
    <section class="login_content center-block">

    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="row center-block form-group"">
        <div class="center-block" style="width: 400px;">
            <img src="{{ asset("images/logo-lets.png") }}" width="300" height="341"/>
        </div>
     </div>
    <div class="row form-group center-block">
        <div class="col-md-12 col-sm-12 col-xs-12">
                @if (session()->has('message'))
                    <div class="alert alert-{{ session('level') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('message') }}
                    </div>
                @endif
        </div>
    </div>
    <div class="row center-block form-group">
        <div class="center-block" style="width: 250px;">
            <a href="/auth/facebook" class="btn btn-block btn-social btn-lg btn-facebook">
            <span class="fa fa-facebook"></span> Logar com Facebook
            </a>
        </div>
    </div>

    <div class="row center-block form-group"">
        <div class="separator center-block" style="width: 500px;">
            <div>
                <p>©2016 Todos os direitos reservados. Let's Eat ® - Marca registrada de Marcos Nunes.</p>
            </div>
        </div>
</section>
    </div>
</form>
</body>
</html>