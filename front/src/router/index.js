import Vue from 'vue'
import VueRouter from 'vue-router'
import beforeEach from './beforeEach'
import Home from '@/modules/home/pages/'
import Login from '../modules/auth/pages/Login.vue'

import Manutencoes from '@/modules/manutencao/pages/Manutencoes'

import Clientes from '@/modules/clientes/pages/Clientes'
import NewOrEditCliente from '@/modules/clientes/pages/NewOrEditCliente'

import NewOrEditEmpreendimento from '@/modules/empreendimentos/pages/NewOrEditEmpreendimento'
import Empreendimentos from '@/modules/empreendimentos/pages/Empreendimentos'

import Visitas from '@/modules/laspalmas/pages/Visitas'
import NovoClienteLasPalmas from '@/modules/laspalmas/pages/NovoClienteLasPalmas'


// import PagamentoEmitido from './components/Financeiro/PagamentoEmitido'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },


  {path:'/manutencoes', name:'manutencoes', component: Manutencoes},
  {path:'/clientes/:tipocliente', name:'clientes', component: Clientes},
  {path:'/novo/cliente', name:'novocliente', component: NewOrEditCliente},
  {path:'/novo/cliente/:id', name:'novoclienteid', component: NewOrEditCliente},
  {path:'/laspalmas/visitas', name:'visitaslaspalmas', component: Visitas},
  {path:'/laspalmas/novocliente', name:'novoclientelaspalmas', component: NovoClienteLasPalmas},
  {path:'/empreendimentos/:tipoempreendimento', name:'empreendimentos', component: Empreendimentos},
  {path:'/novo/empreendimento', name:'novoempreendimento', component: NewOrEditEmpreendimento},
  {path:'/novo/empreendimento/:id', name:'novoempreendimentoid', component: NewOrEditEmpreendimento},


]

const router = new VueRouter({
  routes
})

router.beforeEach(beforeEach)

export default router
