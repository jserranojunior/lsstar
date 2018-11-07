<template>
  <div>
    <div class="row no-print">
      <div class="col-md-4">
        <div class="box box-info">
          <div class="box-header with-border">
            <p class="center bold">Relatórios</p>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-5 ">
                <a class="btn btn-warning btn-xs" href="../financeiro/mensal" role="button">Relatório Mensal</a>
              </div>
              <div class="col-md-3 text-center">
                <a class="btn btn-primary btn-xs" href="../financeiro/anual/2017" role="button">Anual 2017</a>
              </div>
              <div class="col-md-3 text-center">
                <a class="btn btn-primary btn-xs" href="../financeiro/anual" role="button">Anual 2018</a>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6 ">
                <a class="btn btn-info btn-xs" href="../financeiro/relatorioconsolidado" role="button">Relatório
                  Consolidado</a>
              </div>
              <div class="col-md-6 ">
                <a class="btn btn-danger btn-xs" href="../financeiro/relatorioarea" role="button">Relatório de Negócios</a>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <input type="button" class="esquerda btn btn-success excel btn-sm" value="Exportar Excel">
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="box box-info">
          <div class="box-header with-border">
            <div class="text-center">
              <h6>DATA</h6>
            </div>
            <div class="row">
              <div class="col-sm col-xs-6">
                <div class="btn-group">
                  <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    <a href="#" class="point" v-if="data.datas">
                      {{data.datas.mesAtualEscrito}}
                      <span class="caret"></span>
                    </a></button><a href="#">
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li v-if="data.meses" class="point" v-for="mes in data.meses" v-bind:key="mes.numero">
                      <a v-on:click="mesAtual = mes.numero" class="dropdown-item">{{mes.nome}}</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-sm col-xs-6 float-right text-right">
                <div class="btn-group">
                  <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    <a href="#" v-if="data.datas">
                      {{data.datas.anoAtual}}
                      <span class="caret"></span>
                    </a></button><a href="#">
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="point">
                      <a v-on:click="ano = 2017" class="dropdown-item">2017</a>
                      <a v-on:click="ano = 2018" class="dropdown-item">2018</a>
                      <a v-on:click="ano = 2019" class="dropdown-item">2019</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row row-space">
              <div class="col-md text-center">
                <a class="btn btn-default btn-xs" v-on:click="dataAtual = data.datas.dataAnterior">Anterior</a>
                <a class="btn btn-default btn-xs float-center" v-on:click="getDataAtual()">Atual</a>
                <a class="btn btn-default btn-xs " v-on:click="dataAtual = data.datas.dataPosterior">Pŕoximo</a>
              </div>
            </div>
            <div class="box-footer">
              <div class="row row-space">
                <div class="col-md-12">
                  <div class="col-xs-5">
                    <input type="number" class="form-control" value="1" max="31" min="1" v-model="diaInicial">
                  </div>
                  <div class="col-xs-5 float-right text-right">
                    <input type="number" value="31" class="form-control" max="31" min="1" v-model="diaFinal">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="box box-info">
          <div class="box-header with-border">
            <p class="center bold">Legenda</p>
          </div>
          <div class="box-body">
            <div class="col-md-6 ">
              <span class="icone icone-cheque"></span> Cheque emitido
              <br>
              <span class="icone icone-setemaior"></span> Maior que 7%
              <br>
              <span class="glyphicon glyphicon-ok icone"></span> Selecionado
            </div>
            <div class="col-md-6 ">
              <span class="icone icone-transferencia"></span> Transferência
              <br>
              <span class="icone icone-setemenor"></span> Menor que 7%
              <br>
              <span class="glyphicon glyphicon-unchecked icone"></span> Não selecionado
            </div>
          </div>
          <div class="box-footer">
            <a class="esquerda btn btn-primary btn-sm" href="#" @click="criarConta()">
              (+) Incluir</a>
            <div class="col-md-6 float-right">
              <div class=" btn btn-warning btn-sm" id="descerpagina"> TOTAL - {{data.total}} <span class="glyphicon  glyphicon-chevron-down"></span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <table class=" table table-condensed no-padding table-striped table-bordered table-hover" id="tabelaprincipal">
        <thead>
          <tr>
            <td class="text-center"></td>
            <td>
              <!-- PAINEL AREAS -->
              <div class="">
                <ul class="nav nav-tabs nav-hr">
                  <li class="dropdown ">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class="filtro-hr bold"> Negócios </span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="#">Todos</a>
                      </li>
                      <li>
                        <a href="#">01 - Administrativo</a>
                      </li>
                      <li>
                        <a href="#">02 - Diretoria</a>
                      </li>
                      <li>
                        <a href="#">03 - Rua Rio Grande</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </td>
            <td>
              <!-- PAINEL CONTAS -->
              <div class="">
                <ul class="nav nav-tabs nav-hr">
                  <li class="dropdown ">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class="filtro-hr bold"> Contas </span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="#">Todos</a>
                      </li>
                      <li>
                        <a href="#">10 - Hidráulica</a>
                      </li>

                      <li>
                        <a href="#">11 - Elétrica</a>
                      </li>

                      <li>
                        <a href="#">12 - Piso Revest. Louças</a>
                      </li>

                      <li>
                        <a href="#">13 - Porta Janela e Vidro</a>
                      </li>

                      <li>
                        <a href="#">14 - Pintura</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </td>
            <td>
              <!-- PAINEL PAGADOR -->
              <div class="">
                <ul class="nav nav-tabs nav-hr">
                  <li class="dropdown dropdown ">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class="filtro-hr bold"> Tipo </span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="#">Todos</a>
                      </li>
                      <li>
                        <a href="#">Á vista</a>
                      </li>
                      <li>
                        <a href="#">Parcelado</a>
                      </li>
                      <li>
                        <a href="#">Mensal</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </td>
            <td>
              <p class="bold">Pg</p>
            </td>
            <td>
              <a href="#" class="">
                <span class="filtro-hr bold"> Favorecido </span> <span class="caret"></span>
              </a>
            </td>
            <td>
              <!-- PAINEL PAGADOR -->
              <div class="">
                <ul class="nav nav-tabs nav-hr">
                  <li class="dropdown dropdown ">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class="filtro-hr bold"> REC/NF </span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="#">Todos</a>
                      </li>
                      <li>
                        <a href="#">Nota Fiscal</a>
                      </li>
                      <li>
                        <a href="#">Recibo</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </td>
            <td>
              <a href="#">
                <span class="filtro-hr bold"> Venc </span> <span class="caret"></span>
              </a>
            </td>
            <td>
              <p class="bold">Á Pagar</p>
            </td>
          </tr>
        </thead>

        <tbody>
          <span class="invisible"> # </span>
          <tr class="point" v-for="conta in data.contas" v-bind:key="conta.index">
            <td @click="editarConta(conta.id)">
              {{conta.id}}
            </td>
            <td @click="editarConta(conta.id)">
              {{conta.area}}
            </td>
            <td @click="editarConta(conta.id)">
              {{conta.ccustos}}
            </td>
            <td @click="editarConta(conta.id)">
              {{conta.tipo}}
            </td>
            <td class="td-without-padding text-center" v-if="conta.valor_pago  > ''">

              <span class=" btn-pagar " style="background-color: #2196f3;">

              </span>
            </td>
            <td class="td-without-padding text-center" v-else>
              <i class="far fa-clone" data-toggle="modal" data-target="#modalEmitirPagamento" @click="emitirPagamento(conta.id, conta.valor)"></i>
            </td>
            <td @click="editarConta(conta.id)">
              <span class="text-bold">{{conta.favorecido}}</span> | {{conta.item}}
            </td>
            <td @click="editarConta(conta.id)">
              {{conta.pagador}}
            </td>
            <td @click="editarConta(conta.id)">
              {{conta.dia}}
            </td>
            <td @click="editarConta(conta.id)">
              {{conta.valor}}
            </td>
          </tr>
          <tr>
            <td colspan="5"></td>
            <td class="azulclaro" colspan="2">
              <span class="bold  numaior direita">TOTAL DO MÊS</span>
            </td>
            <td class="azulclaro"></td>
            <td class="azulclaro" colspan="1">
              <span class="bold numaior  direita azul">
                {{data.total}}
              </span>
            </td>
          </tr>
          <tr class="trcolor">
            <td colspan="6"> Total de pendencias: </td>
            <td class="" colspan="1">
              <span class="direita">Total pago</span>
            </td>
            <td></td>
            <td class="">
              <span class="direita">
                {{data.somaValorPago}}
              </span>
            </td>
          </tr>
          <tr class="trcolor">
            <td colspan="6"></td>
            <td class="" colspan="1">
              <span class="direita">A pagar</span>
            </td>
            <td></td>
            <td class="">
              <span class="direita">
                {{data.valorTotalPagar}}
              </span>
            </td>
          </tr>
          <tr>
            <td colspan="5"></td>
            <td class="azulclaro" colspan="2">
              <span class="bold  numaior direita">TOTAL ESTIMADO</span>
            </td>
            <td class="azulclaro"></td>
            <td class="azulclaro" colspan="1">
              <span class="bold direita numaior  azul">
                {{data.total}}
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <emitir-pagamento :id="emitirPagamentoId" :dataAtual="dataAtual" :valor="emitirPagamentoValor" :showModalEmitir="showModalEmitir"
      @event-emitir-pagamento="getApiFinanceiro()" @event-fechar-modal-emitir="fecharModalEmitir()"></emitir-pagamento>
  </div>
</template>







<script>
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
        showModalEmitir: ""
      };
    },
    methods: {
      editarConta(id) {
        var $url = "../financeiro/" + id + "/" + this.dataAtual + "/editar";
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
        var $url = "../financeiro/criar/" + this.dataAtual;
        var width = 560;
        var height = 568;
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
      emitirPagamento(id, valor) {
        this.emitirPagamentoId = id;
        this.emitirPagamentoValor = valor;
        this.showModalEmitir = true;
      },
      getApiFinanceiro() {
        var objThis = this;
        var url =
          "http://localhost/lsstar/public/api/v1/financeiro?data=" +
          this.dataAtual +
          "&diaInicial=" +
          this.diaInicial +
          "&diaFinal=" +
          this.diaFinal +
          "&ordem=" +
          this.ordem +
          "&area=" +
          this.area;
        this.axios.get(url).then(response => {
          objThis.data = response.data;
          objThis.data.meses = JSON.parse(objThis.data.datas.meses);
          objThis.data.total = objThis.data.total.toLocaleString();
          objThis.data.somaValorPago = objThis.data.somaValorPago.toLocaleString();
          objThis.data.valorTotalPagar = objThis.data.valorTotalPagar.toLocaleString();
        });
      },
      getDataAtual() {
        var dataAtual = new Date();
        this.ano = dataAtual.getFullYear();
        this.mesAtual = dataAtual.getUTCMonth() + 1;
        this.dataAtual = this.ano + "-" + this.mesAtual;
      }
    },
    mounted() {
      this.getDataAtual();
      this.getApiFinanceiro();
    },
    watch: {
      dataAtual: function (val) {
        this.getApiFinanceiro();
      },
      diaInicial: function (val) {
        this.dataAtual = this.ano + "-" + this.mesAtual;
        this.getApiFinanceiro();
      },
      diaFinal: function (val) {
        this.dataAtual = this.ano + "-" + this.mesAtual;
        this.getApiFinanceiro();
      },
      mesAtual: function (val) {
        this.dataAtual = this.ano + "-" + this.mesAtual;
        this.getApiFinanceiro();
      },
      ano: function (val) {
        this.dataAtual = this.ano + "-" + this.mesAtual;
        this.getApiFinanceiro();
      }
    }
  };
</script>