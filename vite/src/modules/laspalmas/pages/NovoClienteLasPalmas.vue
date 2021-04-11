<template>
  <div>
    <header class="text-center text-primary font-weight-bold display">
      <h3>Cadastro de Cliente - Las Palmas</h3>
    </header>

    <div class="col-xs-10 col-xs-offset-1">
      <div class="box box-info">
        <div class="box-body no-padding">
          <table class="table text-center table-condensed">
            <tr>
              <td>
                <h5 class="text-primary">Nome</h5>
              </td>
              <td colspan="4">
                <input
                  v-model="inputs.nome"
                  class="form-control"
                  name="nome"
                  type="text"
                />
              </td>
            </tr>
            <tr>
              <td>
                <h5 class="">Email</h5>
              </td>
              <td colspan="4">
                <input
                  v-model="inputs.email"
                  class="form-control"
                  name="email"
                  type="text"
                />
              </td>
            </tr>
            <tr>
              <td>
                <h5 class="">Telefone</h5>
              </td>
              <td>
                <input
                  colspan="2"
                  v-model="inputs.telefone"
                  class="form-control telefone_mascara"
                  name="telefone"
                  type="text"
                />
              </td>

              <td>
                <h5 class="">Idade</h5>
              </td>
              <td colspan="2">
                <input
                  v-model="inputs.idade"
                  class="form-control"
                  id="idade"
                  name="idade"
                  type="number"
                />
              </td>
            </tr>
            <tr>
              <td>
                <h5 class="">Profissão</h5>
              </td>
              <td>
                <input
                  colspan="2"
                  v-model="inputs.profissao"
                  class="form-control"
                  name="profissao"
                  type="text"
                />
              </td>

              <td>
                <h5>Empresa</h5>
              </td>
              <td colspan="2">
                <input
                  v-model="inputs.empresa"
                  class="form-control"
                  name="empresa"
                  type="text"
                />
              </td>
            </tr>

            <tr>
              <td>
                <h5 class="">CEP</h5>
              </td>
              <td>
                <input
                  v-model="inputs.cep"
                  class="form-control"
                  name="cep"
                  id="cep"
                  type="number"
                />
              </td>

              <td>
                <h5>Bairro</h5>
              </td>
              <td colspan="2">
                <input
                  v-model="inputs.bairro"
                  class="form-control"
                  name="bairro"
                  id="bairro"
                  type="text"
                />
              </td>
            </tr>
            <tr>
              <td>
                <h5 class="">Logradouro</h5>
              </td>
              <td>
                <input
                  v-model="inputs.logradouro"
                  class="form-control"
                  name="logradouro"
                  id="rua"
                  type="text"
                />
              </td>

              <td>
                <h5 class="">Moradia</h5>
              </td>
              <td colspan="2">
                <select
                  v-model="inputs.tipomoradia"
                  class="form-control"
                  name="tipomoradia"
                >
                  <option></option>
                  <option>Aluguel</option>
                  <option>Própria</option>
                  <option>Parente</option>
                </select>
              </td>
            </tr>

            <tr>
              <td>
                <h5 class="">Número</h5>
              </td>
              <td>
                <input
                  v-model="inputs.numero"
                  class="form-control"
                  name="numero"
                  type="number"
                />
              </td>
              <td>
                <h5>Cidade</h5>
              </td>
              <td colspan="2">
                <input
                  v-model="inputs.cidade"
                  class="form-control"
                  name="cidade"
                  id="cidade"
                  type="text"
                />
              </td>
            </tr>

            <tr>
              <td>
                <h5 class="">Como ficou sabendo?</h5>
              </td>
              <td colspan="3">
                <input
                  v-model="inputs.indicacao"
                  class="form-control"
                  name="indicacao"
                  type="text"
                />
              </td>
            </tr>

            <tr>
              <td>
                <h5 class="">Data da visita</h5>
              </td>
              <td colspan="">
                <input
                  v-model="inputs.data_visita"
                  class="form-control"
                  name="data_visita"
                  type="date"
                />
              </td>
            </tr>
          </table>

          <div class="box-footer no-print">
            <div class="col-sm-4">
              <div class="btn btn-primary" @click="cadastrarClienteLasPalmas(inputs)">
                CADASTRAR
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Main from "@/views/layouts/Main.vue";
import { api } from "@/http/services.js";
export default {
  name: "CreateClientes",
  data() {
    return {
      inputs: {},
    };
  },

  components: {
    Main,
  },
  mounted() {
    this.inputs.evento_palmas = true;
  },
  // ADICIONAR UMA COLUNA PRA MARCAR QUE È LAS PALMAS
  methods: {
    cadastrarClienteLasPalmas(data) {
      let url = "../public/api/v1/cliente";
      api
        .post(url, data)
        .then((response) => {
          console.log(response);
          this.inputs = "";
        })
        .catch(function (error) {
          console.log(error);
          console.log("naõ cadastrado");
        });
    },
  },
};
</script>

<style>
td,
th {
  padding-top: 3px !important;
}
</style>
