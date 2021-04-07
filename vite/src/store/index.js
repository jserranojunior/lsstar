import Vuex from "vuex";
import Auth from "@/modules/auth/vuex/AuthIndex.js";

// import Manutencao from "@/modules/manutencao/vuex/VuexManutencao.js";
import Clientes from "@/modules/clientes/vuex/VuexClientes.js";
import Empreendimentos from "@/modules/empreendimentos/vuex/VuexEmpreendimentos.js";

export default new Vuex.Store({
  modules: {
    Auth,
    // Manutencao,
    Clientes,
    Empreendimentos,
  },
});
