import Vue from 'vue';
import axios from 'axios'
import VueAxios from 'vue-axios'
import Vuelidate from 'vuelidate'




import example from './components/Example';
import ContasAPagar from './components/ContasAPagar';
import SidebarMenuTop from './components/SidebarMenuTop';
import Emitir_Pagamento from './components/EmitirPagamento';

let EmitirPagamento = Vue.component('EmitirPagamento', Emitir_Pagamento);
 
Vue.config.productionTip = false;


Vue.use(VueAxios, axios, Vuelidate)

new Vue({
    el: '#myappvue',
    data: {
      input: '# hello'
    },components:{
        example,
        ContasAPagar,
        SidebarMenuTop,
        EmitirPagamento,
    }
  })

 