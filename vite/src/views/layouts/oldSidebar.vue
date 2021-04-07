<template>
  <div>
    <aside class="main-sidebar sidebar-light-info elevation-4" id="sidebarlateral">
      <div class="sidebar">
        <a href="http://lsstar.com.br" class="brand-link text-center">
          <!-- <img src="alitre.net/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
          <span class="text-center brand-text font-weight-light">LS STAR</span>
        </a>

        <div class="user-panel mt-3 pb-3 d-flex">
          <div class="image">
            <img :src="laravelPhoto" class="img-circle elevation-2" alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ laravelName }}</a>
          </div>
        </div>

        <nav class="mt-2 flex">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <li class="nav-header">MENU</li>

            <li class="nav-item">
              <router-link to="/" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                Início
              </router-link>
            </li>

            <!-- <li class="nav-item">
                         <router-link to="/financeiro/contasapagar" class="nav-link">
                            <i class="nav-icon far fa-money-bill-alt"></i>
                            Financeiro
                        </router-link>
                    </li> -->

            <li class="nav-item">
              <router-link to="/financeiro/contasapagar" class="nav-link">
                <i class="nav-icon far fa-money-bill-alt"></i>
                Financeiro
              </router-link>
            </li>

            <li class="nav-item">
              <a
                href="https://docs.google.com/spreadsheets/d/1R-O0wlp2gf_At02_Z2NgAQfyQpv5vP4KAUlDu2hOjQQ/edit?usp=sharing"
                class="nav-link"
              >
                <i class="nav-icon fas fa-thumbtack"></i>
                Feedback
              </a>
            </li>

            <!-- Empreendimentos  -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-building"></i>

                Empreendimentos
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/novo/empreendimento" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    Novo
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/empreendimentos/Todos" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    Todos
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/empreendimentos/Vendida" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    Vendida
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/empreendimentos/Construção" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    Construção
                  </router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <router-link to="/manutencoes" class="nav-link">
                <i class="nav-icon fas fa-tools"></i>
                Manutenção
              </router-link>
            </li>

            <li class="nav-item">
              <router-link to="/clientes/proprietarios" class="nav-link">
                <i class="fas fa-user-tie nav-icon"></i>
                Proprietários
              </router-link>
            </li>

            <!-- Clientes  -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>

                Clientes
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">0</span> -->
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/novo/cliente" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    Novo
                  </router-link>
                </li>

                <li class="nav-item">
                  <router-link to="/clientes/clientes" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    Clientes
                  </router-link>
                </li>

                <li class="nav-item">
                  <router-link to="/clientes/todos" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    Todos
                  </router-link>
                </li>
              </ul>
            </li>

            <!-- Las Palmas Clientes  -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>

                Las Palmas
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">0</span> -->
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/laspalmas/novocliente" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    Novo Cliente
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/laspalmas/visitas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    Visitas
                  </router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a :href="linkAgenda" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                Agenda
              </a>
            </li>

            <li class="nav-item">
              <a :href="linkFornecedor" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                Fornecedores
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
  </div>
</template>
