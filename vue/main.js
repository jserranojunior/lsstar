import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes'
import store from './store'




import App from './views/Layouts/App.vue';

const router = new VueRouter({
    routes
})

Vue.config.productionTip = false

Vue.use(VueRouter)
new Vue({

    store,
    router,
    components:{
        App,
    }
}).$mount('#appvue')