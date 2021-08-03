<template>
  <div class="w-full">
    <div class="flex flex-wrap mb-2 justify-center">
      <div class="w-full mr-auto my-auto items-center align-middle text-center">
        <a
          href="/home"
          class="text-2xl text-grey-darkest hover:text-blue-dark font-sans font-bold text-lsstar"
          >LS Star</a
        >
      </div>
    </div>

    <router-link to="/" class="nav-btn">
      <i class="fas fa-home nav-icon"></i>
      Início
    </router-link>

    <router-link to="/financeiro/contasapagar" class="nav-btn">
      <i class="nav-icon far fa-money-bill-alt"></i>
      Financeiro
    </router-link>

    <a
      class="nav-btn"
      href="https://docs.google.com/spreadsheets/d/1R-O0wlp2gf_At02_Z2NgAQfyQpv5vP4KAUlDu2hOjQQ/edit?usp=sharing"
    >
      <i class="nav-icon fas fa-thumbtack"></i>
      Feedback
    </a>

    <!-- Empreendimentos  -->

    <span class="w-full nav-btn">
      <i class="nav-icon far fa-building"></i>

      Empreendimentos
      <i class="fas fa-angle-left right ml-1"></i>
    </span>

    <ul class="space-y-1 text-sm nav-sub hidden">
      <li class="nav-btn">
        <router-link to="/novo/empreendimento">
          <i class="far fa-circle nav-icon"></i>
          Novo
        </router-link>
      </li>
      <li class="nav-btn">
        <router-link to="/empreendimentos/Todos">
          <i class="far fa-circle nav-icon"></i>
          Todos
        </router-link>
      </li>
      <li class="nav-btn">
        <router-link to="/empreendimentos/Vendida">
          <i class="far fa-circle nav-icon"></i>
          Vendida
        </router-link>
      </li>
      <li class="nav-btn">
        <router-link to="/empreendimentos/Construção">
          <i class="far fa-circle nav-icon"></i>
          Construção
        </router-link>
      </li>
    </ul>

    <router-link to="/manutencoes" class="nav-btn">
      <i class="nav-icon fas fa-tools"></i>
      Manutenção
    </router-link>

    <router-link to="/clientes/proprietarios" class="nav-btn">
      <i class="fas fa-user-tie nav-icon"></i>
      Proprietários
    </router-link>

    <!-- Clientes  -->

    <span class="w-full nav-btn">
      <i class="nav-icon fas fa-users"></i>
      Clientes
      <i class="fas fa-angle-left ml-1"></i>
    </span>
    <!-- <span class="badge badge-info right">0</span> -->

    <ul class="space-y-1 text-sm nav-sub hidden">
      <li class="nav-btn">
        <router-link to="/novo/cliente">
          <i class="far fa-circle nav-icon"></i>
          Novo
        </router-link>
      </li>

      <li class="nav-btn">
        <router-link to="/clientes/clientes">
          <i class="far fa-circle nav-icon"></i>
          Clientes
        </router-link>
      </li>

      <li class="nav-btn">
        <router-link to="/clientes/todos">
          <i class="far fa-circle nav-icon"></i>
          Todos
        </router-link>
      </li>
    </ul>

    <!-- Las Palmas Clientes  -->

    <span class="w-full nav-btn has-treeview">
      <i class="nav-icon fas fa-tree"></i>

      Las Palmas
      <i class="fas fa-angle-left right ml-1"></i>
      <!-- <span class="badge badge-info right">0</span> -->
    </span>
    <ul class="space-y-1 text-sm nav-sub hidden">
      <li class="nav-btn">
        <router-link to="/laspalmas/novocliente">
          <i class="far fa-circle nav-icon"></i>
          Novo Cliente
        </router-link>
      </li>
      <li class="nav-btn">
        <router-link to="/laspalmas/visitas">
          <i class="far fa-circle nav-icon"></i>
          Visitas
        </router-link>
      </li>
    </ul>

    <a :href="linkAgenda" class="nav-btn">
      <i class="nav-icon far fa-calendar-alt"></i>
      Agenda
    </a>

    <a :href="linkFornecedor" class="nav-btn">
      <i class="nav-icon fas fa-truck"></i>
      Fornecedores
    </a>
  </div>
</template>

<script>
export default {
  name: "SideBar",
  data() {
    return {
      linkSair: process.env.VUE_APP_LARAVEL_SITE_URL + "/sair",
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
<style>
.text-lsstar {
  background-color: #f3ec78;
  background-image: linear-gradient(
    90deg,
    rgba(2, 0, 36, 1) 0%,
    rgba(70, 93, 193, 1) 0%,
    rgba(191, 103, 220, 1) 100%
  );
  background-size: 100%;
  -webkit-background-clip: text;
  -moz-background-clip: text;
  -webkit-text-fill-color: transparent;
  -moz-text-fill-color: transparent;
}
</style>
