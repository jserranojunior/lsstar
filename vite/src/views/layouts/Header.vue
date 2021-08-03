<template>
  <!-- CORRIGIR ESPAÇAMENTO  -->
  <div class="w-full">
    <div class="flex flex-wrap justify-between">
      <STogglesidebar />
      <div class="w-auto mr-auto my-auto items-center align-middle">
        <!-- <a
          href="/home"
          class="text-1xl text-grey-darkest hover:text-blue-dark font-sans font-bold"
          >LS Star</a
        > -->
      </div>

      <div class="w-auto my-auto items-center align-middle text-sm">
        <!-- <div class="h-10" style="display: table-cell, vertical-align: middle;"> -->

        <router-link
          to="/"
          class="text-md no-underline text-black dark:text-gray-100 hover:text-blue-dark ml-2 px-1"
        >
          Home
        </router-link>
        <router-link
          to="/financeiro/contasapagar"
          class="text-md no-underline text-black dark:text-gray-100 hover:text-blue-dark ml-2 px-1"
        >
          Financeiro
        </router-link>

        <a
          class="text-md no-underline hover:text-red-800 ml-2 px-1 text-red-600"
          v-if="linkSair"
          :href="linkSair"
        >
          Sair
        </a>

        <!-- </div> -->
      </div>

      <SToggledark class="p-0 m-0"></SToggledark>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
export default {
  name: "Header",
  data() {
    return {
      linkSair: process.env.VUE_APP_LARAVEL_SITE_URL + "/sair",
    };
  },
  methods: {
    ...mapActions("Auth", ["Logout"]),

    sair() {
      this.Logout();
      this.$router.go("/login");
    },
  },
  computed: {
    ...mapState({
      Auth: (state) => state.Auth,
    }),
  },
};
</script>
