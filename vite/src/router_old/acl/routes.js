import { createWebHistory, createRouter } from "vue-router";
// import Vue from "vue";
import RotasWithToken from "./RotasWithToken";
import registerToken from "./registerToken";

// Vue.use(VueRouter);
const userRoutes = new RotasWithToken();

export default userRoutes.getRoutesWithToken().then((routes) => {
  // const Router = new VueRouter({
  //   mode: "history",
  // routes;
  // });

  if (routes) {
    const router = createRouter({
      history: createWebHistory(),
      routes,
    });

    router.beforeEach(registerToken);

    return router;
  }
});
