<template>
<div>
    <aside class="main-sidebar sidebar-light-info elevation-4" id="sidebarlateral">
        <div class="sidebar">
            <a href="alvitre.net" class="brand-link text-center">
                <!-- <img src="alitre.net/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="text-center brand-text font-weight-light">LS STAR</span>
            </a>

            <div class="user-panel mt-3 pb-3 d-flex">
                <div class="image">
                    <img :src="laravelPhoto" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{laravelName}}</a>
                </div>
            </div> 

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">MENU</li>

                    <li class="nav-item">
                        <router-link to="/" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Início</p>
                        </router-link>
                    </li>

                    <!-- <li class="nav-item">
                         <router-link to="/financeiro/contasapagar" class="nav-link">
                            <i class="nav-icon far fa-money-bill-alt"></i>
                            <p>Financeiro</p>
                        </router-link>
                    </li> -->

                    <li class="nav-item">
                        <a :href="linkFinanceiro" class="nav-link">
                            <i class="nav-icon far fa-money-bill-alt"></i>
                            <p>Financeiro</p>
                        </a>
                    </li>
                    
                    <!-- Empreendimentos  -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Empreendimentos
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/novo/empreendimento" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Novo</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/empreendimentos/Todos" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Todos</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/empreendimentos/Vendida" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Vendida</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/empreendimentos/Construção" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Construção</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <router-link to="/manutencoes" class="nav-link">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Manutenção</p>
                        </router-link>
                    </li>

                     <li class="nav-item">
                        <router-link to="/clientes/proprietarios" class="nav-link">
                            <i class="fas fa-user-tie nav-icon"></i>
                            <p>Proprietários</p>
                        </router-link>
                    </li>

                    <!-- Clientes  -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Clientes
                                <i class="fas fa-angle-left right"></i>
                                <!-- <span class="badge badge-info right">0</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/novo/cliente" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Novo</p>
                                </router-link>
                            </li>                            
                           
                            <li class="nav-item">
                                <router-link to="/clientes/clientes" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Clientes</p>
                                </router-link>
                            </li>

                            <li class="nav-item">
                                <router-link to="/clientes/todos" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Todos</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>

                     <!-- Las Palmas Clientes  -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Las Palmas
                                <i class="fas fa-angle-left right"></i>
                                <!-- <span class="badge badge-info right">0</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/laspalmas/novocliente" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Novo Cliente</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/laspalmas/visitas" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Visitas</p>
                                </router-link>
                            </li>                            
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a :href="linkAgenda" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>Agenda</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a :href="linkFornecedor" class="nav-link">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>Fornecedores</p>
                        </a>
                    </li>

                    

                </ul>
            </nav>

        </div>

    </aside>
</div>
</template>

<script>
  
export default {

    name: "SideBar",
    data() {
        return {
            linkFinanceiro: process.env.VUE_APP_LARAVEL_SITE_URL + '/financeiro',
            linkAgenda: process.env.VUE_APP_LARAVEL_SITE_URL + '/agenda',
            linkFornecedor: process.env.VUE_APP_LARAVEL_SITE_URL + '/fornecedor',
            laravelName:localStorage.getItem('laravel_name'),
            laravelPhoto: process.env.VUE_APP_LARAVEL_STORAGE_URL + '/img/users/' + localStorage.getItem("laravel_photo"),
            
        }
    },
    components: {

    },
    computed: {
       
    
    },

    methods: {

    },
    watch: {

    },

}
</script>
