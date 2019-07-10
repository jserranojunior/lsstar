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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Base64/1.0.1/base64.min.js"></script>

    
<!-- {{--  CSS  --}} -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">

<!-- bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

<!-- ADMIN LTE -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/AdminLTE.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/skins/skin-blue.css">

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
    crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap.css" />


    <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/css/print.css') }}">


<!-- {{--  CSS  --}} -->

     <!-- js -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<!-- {{--  //CORRIGIR ACHAR CDN EM PORTUGUES --}} -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- // -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

 
 
<script src="{{ URL::asset('/js/select-busca.js') }}"></script>
<script src="{{ URL::asset('/js/cep-automatico.js') }}"></script>
<script src="{{ URL::asset('/js/funcoes.js') }}"></script>


<!-- js -->
    

    <!-- {{--  <script src="{{URL::asset('/js/all.js')}}" type="text/javascript"></script>  --}} -->
</head>

<body class="skin-blue">   
    
    <div class="appvue" id="appvue">       


        <div class="wrapper">
            <header class="main-header">
                <a href="../public/vue" class="logo">
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
    </div>
    
    
    
   
</body>
</html>