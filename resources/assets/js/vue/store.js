import Vue from 'vue'
import Vuex from 'vuex'
import Manutencao from './components/Manutencao/VuexManutencao'
import Clientes from './components/Clientes/VuexClientes'

Vue.use(Vuex)

export default new Vuex.Store({
    modules:{
        Manutencao,
        Clientes,
    }
})