<template>
  <!-- CORRIGIR ESPAÇAMENTO  -->
  <div class="flex justify-between">
    <div class="mb-2 sm:mb-0 inner">
      <a
        class="text-md no-underline text-blue-800 hover:text-blue-dark ml-2 px-1 mr-2"
        data-widget="pushmenu"
        href="#"
        ><i class="fas fa-bars"></i
      ></a>
      <a
        href="/home"
        class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold"
        >LS Star</a
      >
    </div>

    <div class="mb-2 sm:mb-0 inner">
      <!-- <div class="h-10" style="display: table-cell, vertical-align: middle;"> -->

      <router-link
        to="/"
        class="text-md no-underline text-black hover:text-blue-dark ml-2 px-1"
      >
        Home
      </router-link>
      <router-link
        to="/financeiro/contasapagar"
        class="text-md no-underline text-black hover:text-blue-dark ml-2 px-1"
      >
        Financeiro
      </router-link>

      <a
        class="text-md no-underline hover:text-blue-dark ml-2 px-1 text-red-600"
        v-if="linkSair"
        :href="linkSair"
      >
        Sair
      </a>

      <!-- </div> -->
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
