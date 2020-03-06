import Vue from 'vue'
import Vuex from 'vuex'
import Auth from '@/modules/auth/vuex/AuthIndex'

import Manutencao from '@/modules/manutencao/vuex/VuexManutencao'
import Clientes from '@/modules/clientes/vuex/VuexClientes'
import Empreendimentos from '@/modules/empreendimentos/vuex/VuexEmpreendimentos'



Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    Auth,
    Manutencao,
    Clientes,
    Empreendimentos,
  
  }
})
