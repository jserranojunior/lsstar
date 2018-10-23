<!DOCTYPE html>
<html>

<head>
    <title>LS STAR</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{{ url('/img/lsstar.png') }}}">

    <!-- {{--  CSS  --}} -->
    @extends('includes.styles')
    <!-- {{--  CSS  --}} -->

    

    <!-- {{--  <script src="{{URL::asset('/js/all.js')}}" type="text/javascript"></script>  --}} -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="{{Route('inicio.index')}}" class="logo">
                <span class="logo-mini"><b>L</b></span>
                <span class="logo-lg"><b>LS STAR</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <div class="text-left col-md-6">
                    <a class="btn btn-menu-toogle" data-toggle="offcanvas">
                        <i class="fas fa-bars "></i>
                    </a>
                </div>
                <div class="navbar-custom-menu">
                    <div class="text-right">
                        <div class="btn btn-primary" id="imprimir">
                            <span class="glyphicon glyphicon-print"></span>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        @extends('layouts.sidebar')
        <!-- FIM BARRA LATERAL -->

        <div class="content-wrapper" id="">
            <div class="content">
                @yield('content')
                <div id="rodape">
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
        @extends('includes.scripts')
    <!-- JS -->
</body>
</html>