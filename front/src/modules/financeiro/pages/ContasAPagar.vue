<template>
<div>
    <Main>
        <template v-slot:mainpage v-if="data.datas">

        <div class="atualizar" onunload="window.opener.location.reload();"></div>
            <div class="row no-print">
                <div class="col-4">
                    <div class="card card-info">
                        <div class="card-header with-border">
                            <p class="center bold">Relatórios</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Relatório Anual
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="../financeiro/anual/2017">2017</a>
                                            <a class="dropdown-item" href="../financeiro/anual/2018">2018</a>
                                            <a class="dropdown-item" href="../financeiro/anual/2019">2019</a>
                                            <a class="dropdown-item" href="../financeiro/anual/2020">2020</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <a class="btn btn-warning btn-xs" href="../financeiro/mensal" role="button">Relatório Mensal</a>

                                </div>
                                <div class="col">
                                    <a class="btn btn-info btn-xs" href="../financeiro/relatorioconsolidado" role="button">
                                        Relatório
                                        Consolidado
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="btn btn-danger btn-xs" href="../financeiro/relatorioarea" role="button">Relatório de Negócios</a>

                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col">
                                    <div class="btn btn-success btn-sm">Exportar Excel</div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header with-border text-center">
                            <span class="center bold ">Data</span>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <div class="btn-group btn-100w">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <a class="pointer">
                                                {{data.datas.mesAtualEscrito}}
                                                <span class="caret"></span>
                                            </a>
                                        </button>
                                        <ul v-if="data.meses" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li class="pointer" v-for="mes in data.meses" v-bind:key="mes.numero">
                                                <a v-on:click="mesAtual = mes.numero" class="dropdown-item">{{mes.nome}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-4 float-right text-right">
                                    <div class="btn-group btn-100w">
                                        <button class="btn btn-default dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <a v-if="data.datas">
                                                {{data.datas.anoAtual}}
                                                <span class="caret"></span>
                                            </a>
                                        </button>
                                       
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li class="pointer">
                                                <a v-on:click="ano = 2017" class="dropdown-item">2017</a>
                                                <a v-on:click="ano = 2018" class="dropdown-item">2018</a>
                                                <a v-on:click="ano = 2019" class="dropdown-item">2019</a>
                                                <a v-on:click="ano = 2020" class="dropdown-item">2020</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space justify-content-center">
                                <div class="col-8">
                                    <div class="row justify-content-center">
                                        <div class="col">
                                            <a class="btn btn-default btn-xs btn-100w pointer" v-on:click="dataAtual = data.datas.dataAnterior"> <i class="fas fa-chevron-left"></i> Anterior</a>
                                        </div>
                                        <div class="col">
                                            <a class="btn btn-default btn-xs btn-100w  pointer" v-on:click="getDataAtual()">Atual</a>
                                        </div>
                                        <div class="col">
                                            <a class="btn btn-default btn-xs btn-100w  pointer" v-on:click="dataAtual = data.datas.dataPosterior">Pŕoximo <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space justify-content-center">

                                <div class="col-4">
                                    <input type="number" class="form-control" value="1" max="31" min="1" v-model="diaInicial">
                                </div>
                                <div class="col-4 float-right text-right">
                                    <input type="number" value="31" class="form-control" max="31" min="1" v-model="diaFinal">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-header with-border">
                            <p class="center bold">Legenda</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <i class="fas fa-square-full text-primary"></i> Pago
                                    <br>
                                </div>
                                <div class="col-6">
                                    <span class="far fa-square"></span> À pagar
                                    <br>
                                </div>
                            </div>

                            <div class="row row-space">
                                <div class="col">
                                    <div class="esquerda btn btn-primary btn-sm" @click="criarConta()">(+) Incluir</div>
                                    <div class="col-6 float-right">
                                        <div class="btn btn-warning btn-sm  pointer" id="descerpagina">
                                            TOTAL - {{data.total}}
                                            <span class="fas fa-chevron-down"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-condensed no-padding table-striped table-bordered table-hover" id="tabelaprincipal">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>
                                <!-- PAINEL AREAS -->
                                <ul class="nav nav-tabs nav-hr">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" >
                                            <span class="filtro-hr bold">Negócios</span>
                                            <span class="caret"></span>

                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"  @click="area = ''">Todos</a>
                                            </li>
                                            <li v-for="unidade in data.unidades" v-bind:key="unidade.id">
                                                <a class="dropdown-item"  @click="area = unidade.nome">{{unidade.nome}}</a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </th>
                            <th>
                                <!-- PAINEL CONTAS -->
                                <div class>
                                    <ul class="nav nav-tabs nav-hr">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" >
                                                <span class="filtro-hr bold">Contas</span>

                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"  @click="contasfiltro = ''">Todos</a>
                                                </li>
                                                <li v-for="tableconta in data.tablecontas" v-bind:key="tableconta.id">
                                                    <a class="dropdown-item"  @click="contasfiltro = tableconta.nome">{{tableconta.nome}}</a>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </th>
                            <th>
                                <!-- PAINEL PAGADOR -->
                                <div class>
                                    <ul class="nav nav-tabs nav-hr">
                                        <li class="dropdown dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" >
                                                <span class="filtro-hr bold">Tipo</span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"  @click="tipo = ''">Todos</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"  @click="tipo = 'Extra'">Á vista</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"  @click="tipo = 'Parcelado'">Parcelado</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"  @click="tipo = 'Fixo'">Mensal</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </th>
                            <th>
                                <a class="dropdown-toggle" >
                                    <span class="filtro-hr bold">PG</span>

                                </a>

                            </th>
                            <th>
                                <a class="dropdown-toggle" >
                                    <span class="filtro-hr bold" @click="ordernarFavorecido()">Favorecido</span>
                                    <span class="caret"></span>
                                </a>
                            </th>
                            <th>
                                <!-- PAINEL PAGADOR -->
                                <div class>
                                    <ul class="nav nav-tabs nav-hr">
                                        <li class="dropdown dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" >
                                                <span class="filtro-hr bold">REC/NF</span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"  @click="pagador = ''">Todos</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"  @click="pagador = 'Nota Fiscal'">Nota Fiscal</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"  @click="pagador = 'Recibo'">Recibo</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </th>
                            <th>
                                <a class="dropdown-toggle" >
                                    <span @click="ordenarVencimento()" class="filtro-hr bold">Venc</span>
                                    <span class="caret"></span>
                                </a>
                            </th>
                            <th>
                                <a class="dropdown-toggle" >
                                    <span class="filtro-hr bold">Á Pagar</span>

                                </a>

                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- <span class="invisible">#</span> -->
                        <tr class="pointer" v-for="conta in data.contas" v-bind:key="conta.index">
                            <td @click="editarConta(conta.id)">{{conta.id}}</td>
                            <td @click="editarConta(conta.id)">{{conta.area}}</td>
                            <td @click="editarConta(conta.id)">{{conta.ccustos}}</td>
                            <td @click="editarConta(conta.id)">
                                <span v-if="conta.tipo == 'Fixo'">Mensal</span>
                                <span v-else-if="conta.tipo == 'Extra'">Á vista</span>
                                <span v-else>{{conta.tipo}}</span>
                            </td>
                            <td class="td-without-padding text-center" v-if="conta.valor_pago  > ''">
                                <i class="fas fa-square-full text-primary"></i>
                            </td>
                            <td class="td-without-padding text-center" v-else>
                                <i class="far fa-square" data-toggle="modal" data-target="#modalEmitirPagamento" @click="emitirPagamento(conta.id, conta.valor)"></i>
                            </td>
                            <td @click="editarConta(conta.id)">
                                <span class="text-bold">{{conta.favorecido | touppercase }}</span>
                                | {{conta.item | toLimit }}
                            </td>
                            <td @click="editarConta(conta.id)">{{conta.pagador}}</td>
                            <td @click="editarConta(conta.id)">{{conta.dia}}</td>
                            <td @click="editarConta(conta.id)">{{conta.valor | money}}</td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td class="azulclaro" colspan="2">
                                <span class="bold numaior direita">TOTAL DO MÊS</span>
                            </td>
                            <td class="azulclaro"></td>
                            <td class="azulclaro" colspan="1">
                                <span class="bold numaior direita azul">{{data.total}}</span>
                            </td>
                        </tr>
                        <tr class="trcolor">
                            <td colspan="6">Total de pendencias:</td>
                            <td class colspan="1">
                                <span class="direita">Total pago</span>
                            </td>
                            <td></td>
                            <td class>
                                <span class="direita">{{data.somaValorPago}}</span>
                            </td>
                        </tr>
                        <tr class="trcolor">
                            <td colspan="6"></td>
                            <td class colspan="1">
                                <span class="direita">A pagar</span>
                            </td>
                            <td></td>
                            <td class>
                                <span class="direita">{{data.valorTotalPagar}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td class="azulclaro" colspan="2">
                                <span class="bold numaior direita">TOTAL ESTIMADO</span>
                            </td>
                            <td class="azulclaro"></td>
                            <td class="azulclaro" colspan="1">
                                <span class="bold direita numaior azul">{{data.total}}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <emitir-pagamento
      :id="emitirPagamentoId"
      :dataAtual="dataAtual"
      :valor="emitirPagamentoValor"
      :showModalEmitir="showModalEmitir"
      @event-emitir-pagamento="getApiFinanceiro()"
      @event-fechar-modal-emitir="fecharModalEmitir()"
    ></emitir-pagamento> -->
        </template>

    </Main>
</div>
</template>

<script>

import Main from '@/views/layouts/Main'
import axios from 'axios'
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
            showModalEmitir: "",
            sortProperty: "favorecido",
            sortDirection: 1,
            tipo: "",
            contasfiltro: "",
            pagador: "",
        };
    },
    components: {
        Main,

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
        }
    },
    methods: {
        editarConta(id) {
            var $url = process.env.VUE_APP_LARAVEL_SITE_URL + "/financeiro/" + id + "/" + this.dataAtual + "/editar";
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
            var $url = process.env.VUE_APP_LARAVEL_SITE_URL + "/financeiro/criar/" + this.dataAtual;
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
        emitirPagamento(id, valor) {
            this.emitirPagamentoId = id;
            this.emitirPagamentoValor = valor;
            this.showModalEmitir = true;
        },
        getApiFinanceiro() {
            var objThis = this;
            var url =
                "http://localhost/lsstar/back/public/api/v1/financeiro?data=" +
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
            console.log(url);
            axios.get(url).then(response => {

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
            this.mesAtual =  ("0" + (dataAtual.getMonth() + 1)).slice(-2);
            this.dataAtual = this.ano + "-" + this.mesAtual;
            console.log(this.dataAtual)
        },
        ordernarFavorecido() {
            this.data.contas = _.sortBy(
                this.data.contas,
                [conta => conta.favorecido.toLowerCase()],
                ["desc"]
            );
        },
        ordenarVencimento() {
            this.data.contas = _.sortBy(
                this.data.contas,
                [conta => conta.dia],
                ["asc"]
            );
            console.log("ordenando");
        }
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
        }
    }
};
</script>

<style>
.btn{
  cursor:pointer;
}
a{
  color: #3c8dbc;
  cursor: pointer;
}
.filtro-hr {
    color: black;
    font-size: 13px;
}

.filtra-hr:hover {
    color: #0056b3;
}

.table-striped tbody tr:nth-of-type(2n+1) {
    background-color: rgba(0, 0, 0, 0.11);
}

.btn-100w {
    width: 100%;
}

.row-space {
    margin-top: 5px;
}
</style>
