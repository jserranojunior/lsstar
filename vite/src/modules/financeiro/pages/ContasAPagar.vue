<template>
  <div>
    <div class="atualizar" onunload="window.opener.location.reload();"></div>
    <div class="flex flex-wrap no-print justify-between">
      <div class="w-full sm:w-1/3 md:w-1/3 lg:w-1/3 xl:w-1/3 pr-2">
        <SCard>
          <template v-slot:body>
            <div class="flex flex-wrap">
              <div class="w-1/2 px-1">
                <div class="flex">
                  <div class="dropdown inline-block relative w-full">
                    <SBtn color="gray" value="Anual" class="text-sm"> </SBtn>
                    <ul class="dropdown-content absolute hidden text-gray-700 pt-1">
                      <!-- <li><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer" href="#">Option 1</a> -->
                      <li>
                        <a
                          class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          @click="abrirOutraGuia('financeiro/anual/2017')"
                          >2017</a
                        >
                      </li>
                      <li>
                        <a
                          class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          @click="abrirOutraGuia('financeiro/anual/2018')"
                          >2018</a
                        >
                      </li>
                      <li>
                        <a
                          class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          @click="abrirOutraGuia('financeiro/anual/2019')"
                          >2019</a
                        >
                      </li>
                      <li>
                        <a
                          class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          @click="abrirOutraGuia('financeiro/anual/2020')"
                          >2020</a
                        >
                      </li>
                      <li>
                        <a
                          class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          @click="abrirOutraGuia('financeiro/anual/2021')"
                          >2021</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="w-1/2">
                <div class="flex">
                  <div class="w-full">
                    <SBtn
                      color="blue"
                      value="<i class='far fa-file-alt'></i> Consolidado"
                      class="text-sm"
                      @click="abrirOutraGuia('financeiro/relatorioconsolidado')"
                    >
                    </SBtn>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-2" />
            <div class="flex flex-wrap">
              <div class="w-1/2 px-1 text-sm">
                <SBtn
                  color="yellow"
                  value="<i class='far fa-file-alt'></i> Mensal"
                  class="text-sm"
                  @click="abrirOutraGuia('financeiro/mensal')"
                >
                </SBtn>
              </div>
              <div class="w-1/2">
                <div class="flex">
                  <div class="w-full">
                    <SBtn
                      color="red"
                      value="<i class='far fa-file-alt'></i> Negócios"
                      class="text-sm"
                      @click="abrirOutraGuia('financeiro/relatorioarea')"
                    >
                    </SBtn>
                  </div>
                </div>
              </div>
            </div>
          </template>
        </SCard>
      </div>
      <div class="w-full sm:w-1/3 md:w-1/3 lg:w-1/3 xl:w-1/3 px-4">
        <SCard>
          <template v-slot:body>
            <div class="flex flex-wrap">
              <div class="w-1/2">
                <div class="dropdown inline-block relative w-full px-1">
                  <SBtn color="ice" :value="data.datas.mesAtualEscrito" class="text-sm" />
                  <!-- <button
                        class="font-semi rounded inline-flex items-center btn-sm w-full text-center text-sm btn-gray"
                      >
                        <span>{{  }}</span>
                      </button> -->
                  <ul class="dropdown-content absolute hidden text-gray-700 pt-1">
                    <!-- <li><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer" href="#">Option 1</a> -->
                    <li
                      class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                      v-for="mes in data.meses"
                      v-bind:key="mes.numero"
                    >
                      <a v-on:click="mesAtual = mes.numero" class="text-center">{{
                        mes.nome
                      }}</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="w-1/2">
                <div class="dropdown inline-block relative w-full px-1">
                  <SBtn
                    color="ice"
                    :value="data.datas.anoAtual"
                    v-if="data.datas"
                    class="text-sm"
                  />
                  <!-- <button
                        class="rounded inline-flex items-center btn-sm w-full text-center text-sm btn-gray"
                      >
                        <span v-if="data.datas">{{  }}</span>
                      </button> -->
                  <ul class="dropdown-content absolute hidden text-gray-700 pt-1">
                    <li
                      class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                    >
                      <a v-on:click="ano = 2017" class="dropdown-item">2017</a>
                    </li>
                    <li
                      class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                    >
                      <a v-on:click="ano = 2018" class="dropdown-item">2018</a>
                    </li>
                    <li
                      class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                    >
                      <a v-on:click="ano = 2019" class="dropdown-item">2019</a>
                    </li>
                    <li
                      class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                    >
                      <a v-on:click="ano = 2020" class="dropdown-item">2020</a>
                    </li>
                    <li
                      class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                    >
                      <a v-on:click="ano = 2021" class="dropdown-item">2021</a>
                    </li>
                    <li
                      class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                    >
                      <a v-on:click="ano = 2022" class="dropdown-item">2022</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap mt-2">
              <div class="w-1/3 px-1">
                <SBtn
                  color="ice"
                  value="<i class='fas fa-chevron-left'></i> Anterior"
                  class="text-xs"
                  @click="dataAtual = data.datas.dataAnterior"
                />
              </div>
              <div class="w-1/3 text-center">
                <SBtn color="ice" value="Atual" class="text-xs" @click="getDataAtual()" />
              </div>
              <div class="w-1/3 px-1 text-center">
                <SBtn
                  color="ice"
                  value="Pŕoximo <i class='fas fa-chevron-right'></i
                    >"
                  class="text-xs"
                  @click="dataAtual = data.datas.dataPosterior"
                />
              </div>
            </div>
            <div class="flex flex-wrap mt-1">
              <div class="w-1/2 px-1">
                <SInputN
                  name="diaInicial"
                  v-model="diaInicial"
                  max="31"
                  min="1"
                  class="form-sm"
                />
              </div>
              <div class="w-1/2 px-1">
                <SInputN
                  name="diaFinal"
                  v-model="diaFinal"
                  max="31"
                  min="1"
                  class="form-sm"
                />
              </div>
            </div>
          </template>
        </SCard>
      </div>

      <div class="w-full sm:w-1/3 md:w-1/3 lg:w-1/3 xl:w-1/3 pl-2">
        <SCard>
          <template v-slot:body>
            <div class="flex flex-wrap justify-center">
              <div class="w-1/2 sm:w-full md:w-1/2 px-1">
                <span class=" ">A pagar</span><br />
                <div class="btn-green font-bold btn-sm" @click="descerPagina()">
                  <span>{{ data.valorTotalPagar }} </span>
                  <span class="fas fa-chevron-down"></span>
                </div>
              </div>
              <div class="w-1/2 sm:w-full md:w-1/2 px-1">
                <span class=" ">Total</span><br />
                <div
                  class="btn-yellow font-bold cursor-pointer btn-sm"
                  @click="descerPagina()"
                >
                  {{ data.total }}
                  <span class="fas fa-chevron-down"></span>
                </div>
              </div>
            </div>
            <hr class="mt-2" />
            <div class="flex flex-wrap justify-center">
              <div class="w-full text-center">
                <div class="esquerda btn-blue btn-sm font-bold" @click="criarConta()">
                  <i class="fas fa-plus"></i> Adicionar Conta
                </div>
              </div>
            </div>
          </template>
        </SCard>
      </div>
    </div>
    <!-- TABELA  -->
    <div class="flex my-4">
      <div class="w-full mb-4">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table-tail table table-condensed no-padding table-striped table-bordered table-hover"
                id="tabelaprincipal"
              >
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>
                      <div class="dropdown inline-block relative">
                        <button
                          class="bg-gray-300 text-gray-700 font-semi rounded inline-flex items-center btn-blue btn-sm"
                        >
                          <span :class="[area ? 'text-success' : 'text-black font-bold']"
                            >Negócios</span
                          >
                        </button>
                        <ul class="dropdown-content absolute hidden text-gray-700 pt-1">
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          >
                            <a class="dropdown-item" @click="area = ''">Todos</a>
                          </li>
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                            v-for="unidade in data.unidades"
                            v-bind:key="unidade.id"
                          >
                            <a class="dropdown-item" @click="area = unidade.nome">{{
                              unidade.nome
                            }}</a>
                          </li>
                        </ul>
                      </div>
                      <!-- PAINEL AREAS -->
                    </th>
                    <th>
                      <!-- PAINEL CONTAS -->
                      <div class="dropdown inline-block relative">
                        <button
                          class="bg-gray-300 text-gray-700 font-semi rounded inline-flex items-center btn-blue btn-sm"
                        >
                          <span
                            :class="[
                              contasfiltro ? 'text-success' : 'text-black font-bold',
                            ]"
                            >Contas</span
                          >
                        </button>
                        <ul class="dropdown-content absolute hidden text-gray-700 pt-1">
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          >
                            <a class="dropdown-item" @click="contasfiltro = ''">Todos</a>
                          </li>
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                            v-for="tableconta in data.tablecontas"
                            v-bind:key="tableconta.id"
                          >
                            <a
                              class="dropdown-item"
                              @click="contasfiltro = tableconta.nome"
                              ><span v-if="tableconta">{{ tableconta.nome }}</span></a
                            >
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th>
                      <div class="dropdown inline-block relative">
                        <button
                          class="bg-gray-300 text-gray-700 font-semi rounded inline-flex items-center btn-blue btn-sm"
                        >
                          <span :class="[tipo ? 'text-success' : 'text-black font-bold']"
                            >Tipo</span
                          >
                        </button>
                        <ul class="dropdown-content absolute hidden text-gray-700 pt-1">
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          >
                            <a class="dropdown-item" @click="tipo = ''">Todos</a>
                          </li>
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          >
                            <a class="dropdown-item" @click="tipo = 'Extra'">Á vista</a>
                          </li>
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          >
                            <a class="dropdown-item" @click="tipo = 'Parcelado'"
                              >Parcelado</a
                            >
                          </li>
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          >
                            <a class="dropdown-item" @click="tipo = 'Fixo'">Mensal</a>
                          </li>
                        </ul>
                      </div>
                      <!-- PAINEL PAGADOR -->
                    </th>
                    <th>
                      <a class="dropdown-toggle">
                        <span class="text-black font-bold">PG</span>
                      </a>
                    </th>
                    <th @click="ordernarFavorecido()">
                      <a class="dropdown-toggle" @click="ordernarFavorecido()">
                        <span class="text-black font-bold" @click="ordernarFavorecido()"
                          >Favorecido</span
                        >
                        <span class="caret" @click="ordernarFavorecido()"></span>
                      </a>
                    </th>
                    <th>
                      <!-- PAINEL PAGADOR -->
                      <div class="dropdown inline-block relative">
                        <button
                          class="bg-gray-300 text-gray-700 font-semi rounded inline-flex items-center btn-blue btn-sm"
                        >
                          <span :class="[tipo ? 'text-success' : 'text-black font-bold']"
                            >REC/NF</span
                          >
                        </button>
                        <ul class="dropdown-content absolute hidden text-gray-700 pt-1">
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          >
                            <a class="dropdown-item" @click="pagador = ''">Todos</a>
                          </li>
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          >
                            <a class="dropdown-item" @click="pagador = 'Nota Fiscal'"
                              >Nota Fiscal</a
                            >
                          </li>
                          <li
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap cursor-pointer"
                          >
                            <a class="dropdown-item" @click="pagador = 'Recibo'"
                              >Recibo</a
                            >
                          </li>
                        </ul>
                      </div>
                    </th>
                    <th @click="ordenarVencimento()">
                      <a class="dropdown-toggle" @click="ordenarVencimento()">
                        <span @click="ordenarVencimento()" class="text-black font-bold"
                          >Venc</span
                        >
                        <span class="caret" @click="ordenarVencimento()"></span>
                      </a>
                    </th>
                    <th>
                      <a class="dropdown-toggle">
                        <span class="text-black font-bold">Á Pagar</span>
                      </a>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  <!-- <span class="invisible">#</span> -->
                  <tr
                    class="cursor-pointer"
                    v-for="(conta, index) in data.contas"
                    v-bind:key="conta.index"
                  >
                    <!-- <td @click="editarConta(conta.id)">{{conta.id}}</td> -->

                    <td @click="editarConta(conta.id)">{{ index + 1 }}</td>

                    <td @click="editarConta(conta.id)">{{ conta.area }}</td>
                    <td @click="editarConta(conta.id)">{{ conta.ccustos }}</td>
                    <td @click="editarConta(conta.id)">
                      <span v-if="conta.tipo == 'Fixo'">Mensal</span>
                      <span v-else-if="conta.tipo == 'Extra'">Á vista</span>
                      <span v-else>{{ conta.tipo }}</span>
                    </td>
                    <td
                      class="td-without-padding text-center"
                      v-if="conta.valor_pago > ''"
                    >
                      <i
                        class="fas fa-square-full text-primary"
                        @click="pagamentoEmitido(conta.numero_cheque)"
                      ></i>
                    </td>
                    <td class="td-without-padding text-center" v-else>
                      <i
                        class="far fa-square"
                        data-toggle="modal"
                        data-target="#modalEmitirPagamento"
                        @click="emitirPagamento(conta.id, conta.valor, conta.favorecido)"
                      ></i>
                    </td>
                    <td @click="editarConta(conta.id)">
                      <span class="text-font-bold">{{
                        conta.favorecido | touppercase
                      }}</span>
                      | {{ conta.item | toLimit }}
                    </td>
                    <td @click="editarConta(conta.id)">{{ conta.pagador }}</td>
                    <td @click="editarConta(conta.id)">{{ conta.dia }}</td>
                    <td class="text-right" @click="editarConta(conta.id)">
                      {{ conta.valor | money }}
                    </td>
                  </tr>
                  <tr class="trcolor">
                    <td colspan="5"></td>
                    <td class="bg-grey" colspan="2">
                      <h5 class="font-bold text-right m-0 p-0">TOTAL DO MÊS</h5>
                    </td>
                    <td class="trcolor"></td>
                    <td class="bg-grey text-center" colspan="1">
                      <h5 class="font-bold text-primary m-0 p-0">
                        {{ data.total }}
                      </h5>
                    </td>
                  </tr>
                  <tr class="trcolor">
                    <td colspan="6">Total de pendencias:</td>
                    <td class colspan="1">
                      <span class="text-right">Total pago</span>
                    </td>
                    <td class="trcolor"></td>
                    <td class="text-right">
                      <span>{{ data.somaValorPago }}</span>
                    </td>
                  </tr>
                  <tr class="trcolor">
                    <td colspan="6"></td>
                    <td class colspan="1">
                      <span class="direita">A pagar</span>
                    </td>
                    <td class="trcolor"></td>
                    <td class="text-right">
                      <span>{{ data.valorTotalPagar }}</span>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="5"></td>
                    <td class="bg-grey" colspan="2">
                      <h5 class="font-bold text-right bg-grey m-0 p-0">TOTAL ESTIMADO</h5>
                    </td>
                    <td class="trcolor"></td>
                    <td class="bg-grey text-center" colspan="1">
                      <h5 class="font-bold text-primary m-0 p-0">
                        {{ data.total }}
                      </h5>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <emitir-pagamento
      :id="emitirPagamentoId"
      :dataAtual="dataAtual"
      :valor="emitirPagamentoValor"
      :favorecido="emitirPagamentoFavorecido"
      :showModalEmitir="showModalEmitir"
      @event-emitir-pagamento="getApiFinanceiro()"
      @event-fechar-modal-emitir="fecharModalEmitir()"
    ></emitir-pagamento>
  </div>
</template>

<script>
import EmitirPagamento from "./EmitirPagamento.vue";

import axios from "axios";
import _ from "lodash";
export default {
  name: "ContasAPagar",

  data() {
    return {
      data: "nome",
      mesAtual: "",
      dataAtual: "",
      diaInicial: 1,
      diaFinal: 31,
      ordem: "dia",
      area: "",
      ano: "",
      debug: "",
      emitirPagamentoId: "",
      dataAtualHoje: "",
      emitirPagamentoValor: "",
      emitirPagamentoFavorecido: "",
      showModalEmitir: "",
      sortProperty: "favorecido",
      sortDirection: 1,
      tipo: "",
      contasfiltro: "",
      pagador: "",
      count: 0,
    };
  },
  components: {
    EmitirPagamento,
  },
  filters: {
    touppercase: function (value) {
      if (!value) return "";
      value = value.toString();
      return value.charAt(0).toUpperCase() + value.slice(1);
    },
    toLimit: function (value) {
      if (!value) return "";
      value = value.toString();
      value = value.substring(0, 45);
      return value;
    },
    money: function (value) {
      if (!value) return "0,00";
      let val = (value / 1).toFixed(2).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  },
  methods: {
    descerPagina() {
      window.scroll(0, document.body.offsetHeight);
    },
    abrirOutraGuia(link) {
      var url = process.env.VUE_APP_LARAVEL_SITE_URL + "/" + link;
      window.open(url);
    },
    abrirPopUp(link) {
      var $url = process.env.VUE_APP_LARAVEL_SITE_URL + "/" + link;

      var width = 1280;
      var height = 800;
      var left = 550;
      var top = 250;
      window.open(
        $url,
        "janela",
        "width=" +
          width +
          ", height=" +
          height +
          ", top=" +
          top +
          ", left=" +
          left +
          ", scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no"
      );
      console.log("abriu");
    },
    pagamentoEmitido($cheque) {
      var $url =
        process.env.VUE_APP_VUE_BUILD_URL + "/#/financeiro/pagamentoemitido/" + $cheque;

      var width = 900;
      var height = 400;
      var left = 550;
      var top = 250;
      window.open(
        $url,
        "janela",
        "width=" +
          width +
          ", height=" +
          height +
          ", top=" +
          top +
          ", left=" +
          left +
          ", scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no"
      );
      console.log("abriu");
    },

    editarConta(id) {
      var $url =
        process.env.VUE_APP_LARAVEL_SITE_URL +
        "/financeiro/" +
        id +
        "/" +
        this.dataAtual +
        "/editar";
      var width = 560;
      var height = 570;
      var left = 400;
      var top = 100;
      window.open(
        $url,
        "janela",
        "width=" +
          width +
          ", height=" +
          height +
          ", top=" +
          top +
          ", left=" +
          left +
          ", scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no"
      );
    },
    criarConta() {
      var $url =
        process.env.VUE_APP_LARAVEL_SITE_URL + "/financeiro/criar/" + this.dataAtual;
      var width = 560;
      var height = 570;
      var left = 400;
      var top = 100;
      window.open(
        $url,
        "janela",
        "width=" +
          width +
          ", height=" +
          height +
          ", top=" +
          top +
          ", left=" +
          left +
          ", scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no"
      );
    },
    fecharModalEmitir() {
      this.showModalEmitir = false;
    },
    emitirPagamento(id, valor, favorecido) {
      this.emitirPagamentoId = id;
      this.emitirPagamentoValor = valor;
      this.emitirPagamentoFavorecido = favorecido;

      this.showModalEmitir = true;
    },
    getApiFinanceiro() {
      this.count = 0;
      var objThis = this;
      var url =
        process.env.VUE_APP_LARAVEL_API_URL +
        "/financeiro?data=" +
        this.dataAtual +
        "&diaInicial=" +
        this.diaInicial +
        "&diaFinal=" +
        this.diaFinal +
        "&ordem=" +
        this.ordem +
        "&area=" +
        this.area +
        "&tipo=" +
        "&contasfiltro=" +
        this.contasfiltro +
        "&pagador=" +
        this.pagador +
        "&tipo=" +
        this.tipo;

      axios.get(url).then((response) => {
        objThis.data = response.data.data;
        objThis.data.meses = JSON.parse(objThis.data.datas.meses);
        objThis.data.total = objThis.data.total.toLocaleString();
        objThis.data.somaValorPago = objThis.data.somaValorPago.toLocaleString();
        objThis.data.valorTotalPagar = objThis.data.valorTotalPagar.toLocaleString();
      });
    },
    getDataAtual() {
      var dataAtual = new Date();
      this.ano = dataAtual.getFullYear();
      this.mesAtual = ("0" + (dataAtual.getMonth() + 1)).slice(-2);
      this.dataAtual = this.ano + "-" + this.mesAtual;
    },
    ordernarFavorecido() {
      this.data.contas = _.sortBy(
        this.data.contas,
        [(conta) => conta.favorecido.toLowerCase()],
        ["desc"]
      );
    },
    ordenarVencimento() {
      this.data.contas = _.sortBy(this.data.contas, [(conta) => conta.dia], ["asc"]);
      console.log("ordenando");
    },
  },
  beforeMount() {
    this.getDataAtual();
    this.getApiFinanceiro();

    // return _.sortBy(this.data.contas, 'id');
    // this.data.contas = _.sortBy(this.data.contas,[conta => conta.valor.toLowerCase()],['desc']);
  },
  watch: {
    dataAtual: function () {
      this.getApiFinanceiro();
    },
    diaInicial: function () {
      this.dataAtual = this.ano + "-" + this.mesAtual;
      this.getApiFinanceiro();
    },
    diaFinal: function () {
      this.dataAtual = this.ano + "-" + this.mesAtual;
      this.getApiFinanceiro();
    },
    mesAtual: function () {
      this.dataAtual = this.ano + "-" + this.mesAtual;
      this.getApiFinanceiro();
    },
    ano: function () {
      this.dataAtual = this.ano + "-" + this.mesAtual;
      this.getApiFinanceiro();
    },
    ordem: function (val) {
      this.ordem = val;
      this.getApiFinanceiro();
    },
    contasfiltro: function (val) {
      this.contasfiltro = val;
      this.getApiFinanceiro();
    },
    pagador: function (val) {
      this.pagador = val;
      this.getApiFinanceiro();
    },
    area: function (val) {
      this.area = val;
      this.getApiFinanceiro();
    },
    tipo: function (val) {
      this.tipo = val;
      this.getApiFinanceiro();
    },
  },
};
</script>
