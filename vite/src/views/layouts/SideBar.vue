<template>
  <div class="sm:w-4/12 md:w-4/12 lg:w-3/12 xl:w-2/12 bg-white rounded p-3 shadow-lg">
    <div class="flex items-center space-x-4 p-2 mb-5">
      <!-- <img class="h-12 rounded-full" :src="laravelPhoto" alt="James Bhatta" /> -->
      <img
        class="h-12 rounded-full"
        src="http://frontlsstar.localhost/src/assets/img/home/clientes.jpg"
        alt="James Bhatta"
      />

      <div class="justify-center">
        <h4
          class="font-semibold text-lg text-gray-700 capitalize font-poppins tracking-wide"
        >
          {{ laravelName }}
        </h4>
        <span class="text-sm tracking-wide flex items-center space-x-1">
          <a
            class="text-md no-underline hover:text-blue-dark ml-2 px-1 text-red-600"
            :href="linkSair"
          >
            Sair
          </a>
        </span>
      </div>
    </div>
    <ul class="space-y-1 text-sm">
      <li class="nav-item">
        <router-link to="/">
          <i class="fas fa-home nav-icon"></i>
          Início
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/financeiro/contasapagar">
          <i class="nav-icon far fa-money-bill-alt"></i>
          Financeiro
        </router-link>
      </li>
      <li class="nav-item">
        <a
          href="https://docs.google.com/spreadsheets/d/1R-O0wlp2gf_At02_Z2NgAQfyQpv5vP4KAUlDu2hOjQQ/edit?usp=sharing"
        >
          <i class="nav-icon fas fa-thumbtack"></i>
          Feedback
        </a>
      </li>

      <!-- Empreendimentos  -->
      <li class="nav-item">
        <span class="w-full">
          <i class="nav-icon far fa-building"></i>

          Empreendimentos
          <i class="fas fa-angle-left right"></i>
        </span>

        <ul class="space-y-1 text-sm nav-sub hidden">
          <li class="nav-item">
            <router-link to="/novo/empreendimento">
              <i class="far fa-circle nav-icon"></i>
              Novo
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/empreendimentos/Todos">
              <i class="far fa-circle nav-icon"></i>
              Todos
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/empreendimentos/Vendida">
              <i class="far fa-circle nav-icon"></i>
              Vendida
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/empreendimentos/Construção">
              <i class="far fa-circle nav-icon"></i>
              Construção
            </router-link>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <router-link to="/manutencoes">
          <i class="nav-icon fas fa-tools"></i>
          Manutenção
        </router-link>
      </li>

      <li class="nav-item">
        <router-link to="/clientes/proprietarios">
          <i class="fas fa-user-tie nav-icon"></i>
          Proprietários
        </router-link>
      </li>

      <!-- Clientes  -->
      <li class="nav-item">
        <span class="w-full">
          <i class="nav-icon fas fa-users"></i>
          Clientes
          <i class="fas fa-angle-left right"></i>
        </span>
        <!-- <span class="badge badge-info right">0</span> -->

        <ul class="space-y-1 text-sm nav-sub hidden">
          <li class="nav-item">
            <router-link to="/novo/cliente">
              <i class="far fa-circle nav-icon"></i>
              Novo
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/clientes/clientes">
              <i class="far fa-circle nav-icon"></i>
              Clientes
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/clientes/todos">
              <i class="far fa-circle nav-icon"></i>
              Todos
            </router-link>
          </li>
        </ul>
      </li>

      <!-- Las Palmas Clientes  -->
      <li class="nav-item has-treeview">
        <span class="w-full">
          <i class="nav-icon fas fa-tree"></i>

          Las Palmas
          <i class="fas fa-angle-left right"></i>
          <!-- <span class="badge badge-info right">0</span> -->
        </span>
        <ul class="space-y-1 text-sm nav-sub hidden">
          <li class="nav-item">
            <router-link to="/laspalmas/novocliente">
              <i class="far fa-circle nav-icon"></i>
              Novo Cliente
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/laspalmas/visitas">
              <i class="far fa-circle nav-icon"></i>
              Visitas
            </router-link>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a :href="linkAgenda">
          <i class="nav-icon far fa-calendar-alt"></i>
          Agenda
        </a>
      </li>

      <li class="nav-item">
        <a :href="linkFornecedor">
          <i class="nav-icon fas fa-truck"></i>
          Fornecedores
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "SideBar",
  data() {
    return {
      linkFinanceiro: process.env.VUE_APP_LARAVEL_SITE_URL + "/financeiro",
      linkAgenda: process.env.VUE_APP_LARAVEL_SITE_URL + "/agenda",
      linkFornecedor: process.env.VUE_APP_LARAVEL_SITE_URL + "/fornecedor",
      laravelName: localStorage.getItem("laravel_name"),
      laravelPhoto:
        process.env.VUE_APP_LARAVEL_STORAGE_URL +
        "/img/users/" +
        localStorage.getItem("laravel_photo"),
    };
  },
  components: {},
  computed: {},

  methods: {},
  watch: {},
};
</script>
