import Vue from "vue";
import { AclInstaller, AclCreate } from "vue-acl";
import { aclRules } from "./aclRules";

const pegarAcl = () => {
  return new Promise((resolve) => {
    var minhaAcl = aclRules.teste2();
    resolve(minhaAcl);
  });
};

Vue.use(AclInstaller);

function mudarAcl(acl) {
  let getStore;
  if (localStorage.getItem("type") > "") {
    getStore = localStorage.getItem("type");
  } else {
    localStorage.setItem("type", 1);
    getStore = "1";
  }

  acl.change(getStore);
}

export const Acls = {
  get(router) {
    return new Promise((resolve) => {
      pegarAcl().then((minhaAcl) => {
        const All = new AclCreate({
          initial: "public",
          notfound: {
            path: "/",
            forwardQueryParams: true,
          },
          router,
          acceptLocalRules: true,
          globalRules: minhaAcl,
          middleware: async (acl) => {
            mudarAcl(acl);
          },
        });
        return resolve(All);
      });
    });
  },
};

// var globalRulesAntigo = {
//   // 1: new AclRule('1').generate(),
//   // 2: new AclRule('1').generate(),
//   isUser: new AclRule('user').generate(),
//   isLogged: new AclRule('user').and('inside').generate(),

//   isAdmin: new AclRule('2').generate(),
//   isObreiroAll: new AclRule('3').or('2').generate(),

//   isObreiroApometria: new AclRule('4').or('3').or('2').generate(),
//   isObreiroLuz: new AclRule('5').or('3').or('2').generate(),
//   isObreiroPasses: new AclRule('6').or('3').or('2').generate(),
//   isObreiroEvangelho: new AclRule('7').or('3').or('2').generate(),

//   isObreiroDialogoFraterno: new AclRule('8').or('3').or('2').generate(),
//   isSemarApometria: new AclRule('9').or('3').or('2').generate(),
//   isSemearKardecismoBasico: new AclRule('10').or('3').or('2').generate(),
//   isSemearKardecismoAvancado: new AclRule('11').or('3').or('2').generate(),

//   isPublic: new AclRule('public').or('1')
//   .or('2').or('3').or('4').or('5').or('6').or('7').or('8').or('9').or('10').or('11').generate(),
//   isFrequentador: new AclRule('1')
//   .or('2').or('3').or('4').or('5').or('6').or('7').or('8').or('9').or('10').or('11').generate(),

//   // tem que ter todos os tipos de obreiro aqui
//   isObreiro: new AclRule('2').or('3').or('4').or('5').or('6').or('7').or('8').or('9').or('10').or('11').generate(),

// }

// var aclAntiga = globalRulesAntigo

// const pegarRota = () => {
//   return new Promise((resolve) =>{
//     let router = Rotas.get()
//     resolve(router)
//   })
// }
