import { AclRule } from "vue-acl";
import { api } from "@/http/services.js";

const apiAcl = () => {
  return new Promise((resolve, reject) => {
    api
      .getsemtoken("acl")
      .then((response) => {
        var rotas = response.data;

        return resolve(rotas);
      })
      .catch(function(error) {
        // eslint-disable-next-line
        console.log(error.response);
        reject();
      });
  });
};

var AntigoNivelDeAcesso = {
  rotas: [
    { rota: "1", acl: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] }, // Home
    { rota: "2", acl: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] }, // Institucional
    { rota: "3", acl: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },
    { rota: "4", acl: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },
    { rota: "5", acl: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },
    { rota: "6", acl: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },
    { rota: "7", acl: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },
    { rota: "8", acl: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },
    { rota: "9", acl: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },
    { rota: "10", acl: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },

    { rota: "isPublic", acl: ["public", 1] },
    { rota: "Publica", acl: [2] },
    { rota: "isFrequentador", acl: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },
  ],
};

var globalRules = {};

export const aclRules = {
  teste1() {
    // eslint-disable-next-line
    // console.log('sei la ' + NiveisDeAcesso.rotas)

    var globalRules = {};

    var regras = {};
    var NiveisDeAcesso = AntigoNivelDeAcesso;
    Object.keys(NiveisDeAcesso.rotas).forEach(function(key) {
      // eslint-disable-next-line
      //    console.log(NiveisDeAcesso.rotas[key].rota, NiveisDeAcesso.rotas[key].acl);
      // var rota = NiveisDeAcesso.rotas[key].rota

      // NiveisDeAcesso.rotas[key].rota = new AclRule(acesso).generate()

      var acesso = NiveisDeAcesso.rotas[key].acl;
      //    var acls = [rota, [acesso]]
      var or = [];

      Object.keys(acesso).forEach(function(key) {
        or.push([".or('" + acesso[key] + "')"]);
      });

      var nivel = or.join("") + ".";

      var acl = new AclRule("isAdmin") + nivel;

      globalRules = {
        isAdmin: acl.generate(),
        isUser: new AclRule("user").generate(),
        isLogged: new AclRule("user").and("inside").generate(),
        isPublic: new AclRule("public")
          .or("1")
          .or("2")
          .or("3")
          .or("4")
          .or("5")
          .or("6")
          .or("7")
          .or("8")
          .or("9")
          .or("10")
          .or("11")
          .generate(),
      };
    });

    // eslint-disable-next-line
    console.log("Global " + globalRules);
    return globalRules;

    // eslint-disable-next-line
    console.log(regras);

    // return regras
  },
  teste2() {
    return new Promise((resolve) => {
      apiAcl().then((NiveisDeAcesso) => {
        Object.keys(NiveisDeAcesso.rotas).forEach(function(key) {
          var rota = NiveisDeAcesso.rotas[key].rota;
          var acl = NiveisDeAcesso.rotas[key].acls;

          var type = [];
          Object.keys(acl).forEach(function(key) {
            var acl_users = acl[key].id_users_niveis_de_acesso;

            var aclString = "" + acl_users + "";
            type.push([aclString]);
          });
          globalRules[rota] = type;
        });

        const global = globalRules;

        return resolve(global);
      });
    });
  },

  antigo() {
    var globalRulesAntigo = {
      Institucional: new AclRule("1").generate(),
      isUser: new AclRule("user").generate(),
      isLogged: new AclRule("user").and("inside").generate(),

      isAdmin: new AclRule("2").generate(),
      isObreiroAll: new AclRule("3").or("2").generate(),

      isObreiroApometria: new AclRule("4")
        .or("3")
        .or("2")
        .generate(),
      isObreiroLuz: new AclRule("5")
        .or("3")
        .or("2")
        .generate(),
      isObreiroPasses: new AclRule("6")
        .or("3")
        .or("2")
        .generate(),
      isObreiroEvangelho: new AclRule("7")
        .or("3")
        .or("2")
        .generate(),

      isObreiroDialogoFraterno: new AclRule("8")
        .or("3")
        .or("2")
        .generate(),
      isSemarApometria: new AclRule("9")
        .or("3")
        .or("2")
        .generate(),
      isSemearKardecismoBasico: new AclRule("10")
        .or("3")
        .or("2")
        .generate(),
      isSemearKardecismoAvancado: new AclRule("11")
        .or("3")
        .or("2")
        .generate(),

      isPublic: new AclRule("public")
        .or("1")
        .or("2")
        .or("3")
        .or("4")
        .or("5")
        .or("6")
        .or("7")
        .or("8")
        .or("9")
        .or("10")
        .or("11")
        .generate(),
      isFrequentador: new AclRule("1")
        .or("2")
        .or("3")
        .or("4")
        .or("5")
        .or("6")
        .or("7")
        .or("8")
        .or("9")
        .or("10")
        .or("11")
        .generate(),

      // tem que ter todos os tipos de obreiro aqui
      isObreiro: new AclRule("2")
        .or("3")
        .or("4")
        .or("5")
        .or("6")
        .or("7")
        .or("8")
        .or("9")
        .or("10")
        .or("11")
        .generate(),
    };
    return globalRulesAntigo;
  },
};

// 1 - FREQUENTADOR
// 2 - ADMIN
// 3 - OBREIRO - TODOS ATENDIMENTOS
// 4 - OBREIRO - APOMETRIA
// 5 - OBREIRO - LUZ
// 6 - OBREIRO - PASSES
// 7 - OBREIRO - EVANGELHO
// 8 - OBREIRO - Diálogo Fraterno
// 9 - SEMEAR -  Apometria
// 10 - SEMEAR -  Kardecismo basico
// 11 - SEMEAR - Kardecismo avançado
