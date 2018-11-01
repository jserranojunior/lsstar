import Vue from 'vue';
import axios from 'axios'
import VueAxios from 'vue-axios'



import example from './components/Example';
import ContasAPagar from './components/ContasAPagar';
import SidebarMenuTop from './components/SidebarMenuTop';
import EmitirPagamento from './components/EmitirPagamento';


 
Vue.config.productionTip = false;

Vue.use(VueAxios, axios)

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

 