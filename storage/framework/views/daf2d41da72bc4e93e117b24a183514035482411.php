<aside class="main-sidebar" v-if="showSidebarMenu">
    <section class="sidebar">
        <div class="profile-sidebar ">
            <div class="profile-userpic ">
                <img src="<?php echo e(URL::asset('/img/usuarios')); ?>/<?php echo e(Auth::user()->photo); ?>" class="img-responsive center-block"
                    alt="">
            </div>
            <div class="profile-usertitle text-center">
                <div class="profile-usertitle-name">
                    <?php echo e(Auth::user()->name); ?>

                </div>
                <div class="profile-usertitle-job">
                    <span class="menu-ocultar">Conectado -</span> <a href="sair">Sair </a>
                </div>
            </div>
            <div class="drop-menu navbar-collapse profile-usermenu">
                <ul>
                    <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                        <a class="glyphicon glyphicon-home dropdown-submenu" href="../public/vue"><span
                                class="menu-ocultar">Início </span> </a>
                    </li>
                    <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                        <a href="<?php echo e(Route('financeiro.index')); ?>" class="glyphicon glyphicon-piggy-bank"><span
                                class="menu-ocultar">Financeiro</span></a>
                    </li>
                    <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-has-children menu-item-object-custom menu-item-6">
                        <a href="../public/vue#/empreendimentos/Todos" class="fa fa-building">
                            <span class="menu-ocultar">Empreendimentos</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="../public/vue#/empreendimentos/Á%20venda">Á venda</a>
                            </li>
                            <li>
                                <a href="../public/vue#/empreendimentos/Vendida">Vendida</a>
                            </li>
                            <li>
                                <a href="../public/vue#/empreendimentos/Construção">Construção</a>
                            </li>
                        </ul>
                    </li>
                    <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                        <a href="../public/vue#/manutencoes"><i class="fa fa-wrench" aria-hidden="true"></i><span
                                class="menu-ocultar">Manutenções</span></a>
                    </li>
                    <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                        <a href="../public/vue#/clientes/clientes" class="glyphicon glyphicon-user">
                        <span class="menu-ocultar">Clientes</span></a>
                    </li>
                    <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                        <a href="../public/vue#/laspalmas/novocliente" class="glyphicon glyphicon-user"><span class="menu-ocultar">Las Palmas</span></a>

                        <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                        <a href="../public/vue#/laspalmas/visitas"> <i class="far fa-file-alt"></i><span class="menu-ocultar">Relatorio de Visitas</span></a>

                      
                    </li>
                    <li id="menu-item-23" class="menu-item menu-item-type-custom  menu-item-object-custom menu-item-6">
                        <a href="../public/vue#/clientes/proprietarios"> <i class="fa fa-address-card"
                                aria-hidden="true"></i><span class="menu-ocultar">Proprietários</span></a>

                    </li>
                    <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                        <a href="<?php echo e(Route('agenda.index')); ?>" class="glyphicon glyphicon-list-alt"><span class="menu-ocultar">Agenda
                            </span></a>
                    </li>
                    <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                        <a href="<?php echo e(Route('fornecedor.index')); ?>"><i class="far fa-handshake"></i><span class="menu-ocultar">Fornecedores
                            </span></a>
                    </li>

                </ul>
            </div>
    </section>
</aside>