<template>
  <div>
    <header class="text-center text-primary font-weight-bold display">
      <h3>SEJA BEM VINDO!</h3>
      <h4 class="text-center text-dark">
        Fique a vontade para testar as novas atualizações!
      </h4>
    </header>

    <div class="flex flex-wrap justify-center">
      <div class="w-full sm:w-full md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
        <router-link to="/financeiro/contasapagar">
          <SCard class="transform hover:scale-105 duration-300 ease-in-out">
            <template v-slot:header> FINANCEIRO </template>
            <template v-slot:body>
              <img src="@/assets/img/home/financeiro.jpg" class="card-img-top" />
            </template>
          </SCard>
        </router-link>
      </div>

      <div class="w-full sm:w-full md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
        <a
          href="https://docs.google.com/spreadsheets/d/1R-O0wlp2gf_At02_Z2NgAQfyQpv5vP4KAUlDu2hOjQQ/edit?usp=sharing"
        >
          <SCard class="transform hover:scale-105 duration-300 ease-in-out">
            <template v-slot:header> FEEDBACK </template>
            <template v-slot:body>
              <img
                src="https://images.unsplash.com/photo-1614028674026-a65e31bfd27c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                class="card-img-top"
              />
            </template>
          </SCard>
        </a>
      </div>

      <div class="w-full sm:w-full md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
        <router-link to="/empreendimentos/Todos" class="nav-link">
          <SCard class="transform hover:scale-105 duration-300 ease-in-out">
            <template v-slot:header>EMPREENDIMENTOS </template>
            <template v-slot:body>
              <img src="@/assets/img/home/empreendimentos.jpg" class="card-img-top" />
            </template>
          </SCard>
        </router-link>
      </div>

      <div class="w-full sm:w-full md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
        <router-link to="/manutencoes" class="nav-link">
          <SCard class="transform hover:scale-105 duration-300 ease-in-out">
            <template v-slot:header>MANUTENÇÕES </template>
            <template v-slot:body>
              <img src="@/assets/img/home/manutencao.jpg" class="card-img-top" />
            </template>
          </SCard>
        </router-link>
      </div>

      <div class="w-full sm:w-full md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
        <router-link to="/clientes/proprietarios" class="nav-link">
          <SCard class="transform hover:scale-105 duration-300 ease-in-out">
            <template v-slot:header>PROPRIETÁRIOS </template>
            <template v-slot:body>
              <img src="@/assets/img/home/proprietarios.jpg" class="card-img-top" />
            </template>
          </SCard>
        </router-link>
      </div>
      <div class="w-full sm:w-full md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
        <router-link to="/clientes/clientes" class="nav-link">
          <SCard class="transform hover:scale-105 duration-300 ease-in-out">
            <template v-slot:header>CLIENTES</template>
            <template v-slot:body>
              <img src="@/assets/img/home/clientes.jpg" class="card-img-top" />
            </template>
          </SCard>
        </router-link>
      </div>

      <div class="w-full sm:w-full md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
        <router-link to="/laspalmas/visitas" class="nav-link">
          <SCard class="transform hover:scale-105 duration-300 ease-in-out">
            <template v-slot:header>LAS PALMAS</template>
            <template v-slot:body>
              <img src="@/assets/img/home/visitalaspalmas.jpg" class="card-img-top" />
            </template>
          </SCard>
        </router-link>
      </div>

      <div class="w-full sm:w-full md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
        <a :href="linkAgenda" class="nav-link">
          <SCard class="transform hover:scale-105 duration-300 ease-in-out">
            <template v-slot:header>AGENDAMENTO</template>
            <template v-slot:body>
              <img
                src="https://images.unsplash.com/photo-1435527173128-983b87201f4d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1347&q=80"
                class="card-img-top"
              />
            </template>
          </SCard>
        </a>
      </div>

      <!-- <div class="w-full sm:w-full md:w-1/4 lg:w-1/4 xl:w-1/4 p-2">
            <a :href="linkFornecedor" class="nav-link">
              <div class="card flex flex-wrap pointer transform hover:scale-105 duration-300 ease-in-out">
                <img src="@/assets/img/home/visitalaspalmas.jpg" class="card-img-top" />
                <div class="card-body text-center">
                  <h6 class="card-title">FORNECEDORES</h6>
                </div>
              </div>
            </a>
          </div> -->
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",

  data() {
    return {
      // linkFinanceiro: process.env.VUE_APP_LARAVEL_SITE_URL + "/financeiro",
      linkAgenda: process.env.VUE_APP_LARAVEL_SITE_URL + "/agenda",
      linkFornecedor: process.env.VUE_APP_LARAVEL_SITE_URL + "/fornecedor",
      // laravelName: localStorage.getItem("laravel_name"),
      // laravelPhoto:
      //   process.env.VUE_APP_LARAVEL_STORAGE_URL +
      //   "/img/users/" +
      //   localStorage.getItem("laravel_photo"),
    };
  },
};
</script>

<style>
.flex flex-wrap:hover {
  -webkit-box-shadow: 4px 4px 13px -1px rgba(0, 0, 0, 0.69);
  -moz-box-shadow: 4px 4px 13px -1px rgba(0, 0, 0, 0.69);
  box-shadow: 4px 4px 13px -1px rgba(0, 0, 0, 0.69);
  -webkit-transform: translateX(-4px);
  transform: translateX(-4px);
}
</style>
