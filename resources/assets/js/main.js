import Vue from 'vue';
import example from './components/Example';
import ContasAPagar from './components/ContasAPagar';
import axios from 'axios'
import VueAxios from 'vue-axios'
 
Vue.use(VueAxios, axios)

new Vue({
    el: '#myappvue',
    data: {
      input: '# hello'
    },mounted(){
        console.log('vue funcionando');
    },components:{
        example,
        ContasAPagar,
    }
  })

 