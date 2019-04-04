<aside class="main-sidebar" v-if="showSidebarMenu">
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
                    <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                        <a href="{{url('/api/v1/clientelaspalmas')}}" class="glyphicon glyphicon-user"><span class="menu-ocultar">Las Palmas</span></a>
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
                        <a href="{{Route('fornecedor.index')}}"><i class="far fa-handshake"></i><span class="menu-ocultar">Fornecedores
                            </span></a>
                    </li>

                </ul>
            </div>
    </section>
</aside>
