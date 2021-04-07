import { api } from "@/http/services.js";
import components from "../componentsRotas";

class Acl {
  convertRouter(rotas) {
    if (rotas) {
      let ObjRota = [];
      Object.keys(rotas).forEach(function (key) {
        rotas[key].forEach((rota) => {
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
      });
      const routes = Object.values(ObjRota);
      return routes;
    }
  }
  getRoutesWithToken() {
    const token = localStorage.getItem("token");
    if (token) {
      return api
        .get("getuserrouteswithtoken")
        .then((response) => {
          if (
            response.data.message == "Token is expired" ||
            response.data.message == "Token is invalid"
          ) {
            localStorage.setItem("token", "");
            window.location.href = window.location.hostname;
          }

          let rotas = response.data.rotas;
          if (rotas) {
            let routes = this.convertRouter(rotas);
            return routes;
          } else {
            console.log(response.data);
          }
        })
        .catch((err) => {
          console.log(err);
        });
    } else {
      return api
        .getsemtoken("getroutespublic")
        .then((response) => {
          if (response.data.rotas) {
            let rotas = response.data.rotas;

            let routes = this.convertRouter(rotas);
            return routes;
          }
        })
        .catch(function (error) {
          // eslint-disable-next-line
          console.log(error);
        });
    }
  }
}

export default Acl;
