<!DOCTYPE html>
<html>

<head>
    <title>LS STAR</title>

    <script src="{{URL::asset('/js/all.js')}}" type="text/javascript"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{{ url('/img/lsstar.png') }}}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- ADMIN LTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/AdminLTE.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/skins/skin-blue.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap.css">



    <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/print.css') }}">

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
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="profile-sidebar ">
                    <div class="profile-userpic ">
                        <img src="{{URL::asset('/img/usuarios')}}/{{ Auth::user()->photo }}" class="img-responsive center-block"
                            alt="">
                    </div>
                    <div class="profile-usertitle text-center">
                        <div class="profile-usertitle-name">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="profile-usertitle-job">
                            <span class="menu-ocultar">Conectado -</span> <a href="sair">Sair </a>
                        </div>
                    </div>
                    <div class="drop-menu navbar-collapse profile-usermenu">
                        <ul>
                            <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a class="glyphicon glyphicon-home dropdown-submenu" href="{{Route('inicio.index')}}"><span
                                        class="menu-ocultar">Início </span> </a>
                            </li>
                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a href="{{Route('financeiro.index')}}" class="glyphicon glyphicon-piggy-bank"><span
                                        class="menu-ocultar">Financeiro</span></a>
                            </li>
                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-has-children menu-item-object-custom menu-item-6">
                                <a href="{{Route('casa.index')}}" class="fa fa-building">
                                    <span class="menu-ocultar">Empreendimentos</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{url('/casa?status=Á venda')}}">Á venda</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/casa?status=Vendida')}}">Vendida</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/casa?status=construção')}}">Construção</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a href="{{Route('manutencao.index')}}"><i class="fa fa-wrench" aria-hidden="true"></i><span
                                        class="menu-ocultar">Manutenções</span></a>
                            </li>
                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a href="{{Route('cliente.index')}}" class="glyphicon glyphicon-user"><span class="menu-ocultar">Clientes</span></a>
                            </li>
                            <li id="menu-item-23" class="menu-item menu-item-type-custom  menu-item-object-custom menu-item-6">
                                <a href="{{url('/cliente?tipocliente=proprietario')}}"> <i class="fa fa-address-card"
                                        aria-hidden="true"></i><span class="menu-ocultar">Proprietários</span></a>

                            </li>



                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a href="{{Route('agenda.index')}}" class="glyphicon glyphicon-list-alt"><span class="menu-ocultar">Agenda
                                    </span></a>
                            </li>
                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a href="{{Route('fornecedor.index')}}"><i class="far fa-handshake"></i><span
                                        class="menu-ocultar">Fornecedores </span></a>
                            </li>

                        </ul>
                    </div>
            </section>
        </aside>
        <!-- FIM BARRA LATERAL -->

        <div class="content-wrapper" id="">
            <div class="content">
                @yield('content')
                <div id="rodape">
                </div>