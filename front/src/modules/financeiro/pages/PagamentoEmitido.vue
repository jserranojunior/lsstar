<template>
<div>
    <div class="container-fluid">
        <div class="row-top">
            <div class="col-12">
                <h3 class="text-center">PAGAMENTO EMITIDO</h3>
            </div>
        </div>
        <div class="row">            
            <div class="col-12">
                <table class=" table table-condensed no-padding table-striped table-bordered table-hover">
                    <tr>
                        <td>
                            Numero Pagamento
                        </td>
                        <td>
                            Data Pagamento
                        </td>
                        <td>
                            Link Comprovante
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{data.numero_cheque}}
                        </td>
                        <td>
                            {{data.data_conta}}
                        </td>
                        <td>
                            <a :href="data.link_comprovante" class="text-bold" target="_BLANK">ACESSAR COMPROVANTE</a>
                        </td>
                    </tr>
                </table>
            </div>        
        </div>
        <div class="row">
            <div class="col-12">
            <table class=" table table-condensed no-padding table-striped table-bordered table-hover">
                <tr>
                    <th>
                        Fornecedor
                    </th>
                    <th>
                        Vencimento
                    </th>
                    <th>
                        Valor
                    </th>
                </tr>
                <tr>
                    <td>
                        {{data.favorecido}}
                    </td>
                    <td>
                        {{data.mes_referencia}}
                    </td>
                    <td>
                        {{data.valor_pago}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <h5>VALOR TOTAL</h5>
                    </td>
                    <td>
                        <h5>{{data.valor_pago}}</h5>
                    </td>
                </tr>
            </table>
        </div>
        </div>
        <div class="row">
            <div class="col-12" v-if="data.numero_cheque">
                <div class="btn btn-danger" @click="excluirPagamento(data.numero_cheque)">Excluir Pagamento</div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import {api} from '@/http/services.js';
export default {
    name: "PagamentoEmitido",
    data() {
        return {
            data: {},
            excluido:{},
            excluir:{},
        }
    },
   
    methods: {
        excluirPagamento(parametro){
            this.excluir.cheque = parametro;
            
              let url = '/emitirpagamento/delete';
            api.post(url, this.excluir)
                  .then(response => {
                      this.excluido = response.data.data
                        // console.log("Excluido")
                        console.log(this.excluido)                        
                   
                  })
                .catch(function (error) {
                    console.log(error.message);
                    console.log("naõ cadastrado")
                });
        },
        getPagamentoEmitido(parametro) {
            // console.log(parametro + "top")
            let url = '/emitirpagamento/' + parametro
            api.get(url)
                .then(response => {
                    this.data = response.data.data[0]
                    console.log(response.data)
                })
                .catch(function (error) {
                    console.log(error.response);
                    console.log("naõ cadastrado")
                });
        },
    },
    watch: {
        $route() {
            if (this.$route.params.id) {
                this.getPagamentoEmitido(this.$route.params.id)
            } else {
                this.data = {}
            }
        },
        excluido(){
            if(this.excluido){
                console.log("RETURN");
                window.opener.location.replace(window.opener.location);
                window.close()

                
            }
        },
    },
    mounted() {
        if (this.$route.params.id) {
            this.getPagamentoEmitido(this.$route.params.id)
        }
    }
}
</script>

<style>
.side-navbar,
.navbar,
.main-footer {
    display: none;
}
.row-top{
    margin-top: 25px;
}
</style>
