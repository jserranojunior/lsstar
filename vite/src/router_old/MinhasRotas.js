import components from "./componentsRotas";
import { api } from "@/http/services.js";

const apiRota = () => {
  return new Promise((resolve, reject) => {
    var routes = "";
    var ObjRota = {};

    api
      .getsemtoken("rotas")
      .then((response) => {
        console.log(response);
        var rotas = response.data.data;
        Object.keys(rotas).forEach(function (key) {
          var rota = rotas[key];
          ObjRota[key] = rota;
          ObjRota[key].meta = {
            rule: rota.id,
            titulo: rota.titulo,
          };

          ObjRota[key].props = {
            idPage: rota.id,
          };
          ObjRota[key].component = components[rota.component];
        });
        routes = Object.values(ObjRota);
        //  eslint-disable-next-line
        return resolve(routes);
      })
      .catch(function (error) {
        // eslint-disable-next-line
        console.log(error.response);
        reject();
      });
  });
};

export const rotas = {
  novasrotas() {
    return new Promise((resolve) => {
      apiRota().then((router) => {
        return resolve(router);
      });
    });
  },

  antigarota() {
    const routes = [
      {
        path: "/",
        name: "home",
        component: components.Home,
        meta: {
          rule: 1,
        },
      },
      {
        path: "/login",
        name: "login",
        component: components.Login,
        meta: {
          rule: 3,
        },
      },
    ];

    return routes;
  },
};

export default rotas;
