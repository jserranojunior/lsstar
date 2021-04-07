import Vue from "vue";
import Router from "vue-router";

// ANTIGO

import beforeEach from "./beforeEach";
// import { rotas } from './MinhasRotas'
import MinhasRotas from "./MinhasRotas";
console.log(MinhasRotas);
Vue.use(Router);

const getRotas = () => {
  return new Promise((resolve) => {
    let routes = MinhasRotas.novasrotas();
    // eslint-disable-next-line
    resolve(routes);
  });
};
export const Rotas = {
  get() {
    return new Promise((resolve) => {
      getRotas().then((routes) => {
        const router = routes;
        const router = new Router({
          mode: "history",
          routes,
        });
        router.beforeEach(beforeEach);

        return resolve(router);
      });
    });
  },
};
