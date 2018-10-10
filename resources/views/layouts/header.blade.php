<!DOCTYPE html>
<html>

<head>
    <title>LS STAR</title>
    <link rel="stylesheet" href="{{ URL::asset('/css/all.css') }}">
    <script src="{{URL::asset('/js/all.js')}}" type="text/javascript"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{{ url('/img/lsstar.png') }}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="{{Route('inicio.index')}}" class="logo">
                <span class="logo-mini"><b>L</b></span>
                <span class="logo-lg"><b>LS STAR</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="">
                    <div class="btn btn-primary" id="imprimir">
                        <span class="glyphicon glyphicon-print"></span>
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
                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a href="{{Route('casa.index')}}" class="fa fa-building"><span class="menu-ocultar">Empreendimentos</span></a>
                            </li>
                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a href="{{Route('manutencao.index')}}"><i class="fa fa-wrench" aria-hidden="true"></i><span
                                        class="menu-ocultar">Manutenções</span></a>
                            </li>
                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a href="{{Route('cliente.index')}}" class="glyphicon glyphicon-user"><span class="menu-ocultar">Clientes</span></a>
                            </li>
                            <li id="menu-item-23" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">                                
                                <a href="{{url('/cliente?tipocliente=proprietario')}}">    <i class="fa fa-address-card-o" aria-hidden="true"></i><span
                                        class="menu-ocultar">Proprietários</span></a>
                            </li>
                            </li>
                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a href="{{Route('agenda.index')}}" class="glyphicon glyphicon-list-alt"><span class="menu-ocultar">Agenda
                                    </span></a>
                            </li>
                            <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                                <a href="{{Route('fornecedor.index')}}"><i class="fa fa-handshake-o" aria-hidden="true"></i><span
                                        class="menu-ocultar">Fornecedores </span></a>
                            </li>
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