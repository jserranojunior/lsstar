import { createRouter, createWebHistory } from "vue-router";
// import beforeEach from "./beforeEach.js";
import Home from "@/modules/home/pages/index.vue";
import Login from "../modules/auth/pages/Login.vue";

import Manutencoes from "@/modules/manutencao/pages/Manutencoes.vue";

import Clientes from "@/modules/clientes/pages/Clientes.vue";
import NewOrEditCliente from "@/modules/clientes/pages/NewOrEditCliente.vue";

import NewOrEditEmpreendimento from "@/modules/empreendimentos/pages/NewOrEditEmpreendimento.vue";
import Empreendimentos from "@/modules/empreendimentos/pages/Empreendimentos.vue";

import Visitas from "@/modules/laspalmas/pages/Visitas.vue";
import NovoClienteLasPalmas from "@/modules/laspalmas/pages/NovoClienteLasPalmas.vue";

import ContasAPagar from "@/modules/financeiro/pages/ContasAPagar.vue";
import PagamentoEmitido from "@/modules/financeiro/pages/PagamentoEmitido.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },
  {
    path: "/login",
    name: "login",
    component: Login,
  },

  { path: "/manutencoes", name: "manutencoes", component: Manutencoes },
  { path: "/clientes/:tipocliente", name: "clientes", component: Clientes },
  { path: "/novo/cliente", name: "novocliente", component: NewOrEditCliente },
  {
    path: "/novo/cliente/:id",
    name: "novoclienteid",
    component: NewOrEditCliente,
  },
  { path: "/laspalmas/visitas", name: "visitaslaspalmas", component: Visitas },
  {
    path: "/laspalmas/novocliente",
    name: "novoclientelaspalmas",
    component: NovoClienteLasPalmas,
  },
  {
    path: "/empreendimentos/:tipoempreendimento",
    name: "empreendimentos",
    component: Empreendimentos,
  },
  {
    path: "/novo/empreendimento",
    name: "novoempreendimento",
    component: NewOrEditEmpreendimento,
  },
  {
    path: "/novo/empreendimento/:id",
    name: "novoempreendimentoid",
    component: NewOrEditEmpreendimento,
  },
  {
    path: "/financeiro/pagamentoemitido/:id",
    name: "pagamentoemitido",
    component: PagamentoEmitido,
  },
  {
    path: "/financeiro/contasapagar",
    name: "contaspagar",
    component: ContasAPagar,
  },
];

// const router = new VueRouter({
//   routes,
// });

// router.beforeEach(beforeEach);

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
