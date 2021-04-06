<template>
<div>
    <div v-if="showModalEmitir">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h5 class="modal-title text-center" id="exampleModalLabel">Emitir Pagamento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="closeModal()">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col">
                                                <label for="tipopagamento" class="control-label">Tipo Pagamento</label>
                                                <select class="form-control" v-model="inputs.tipo_pagamento">
                                                    <option selected value="Transferência">Transferência</option>
                                                    <option value="Cartão">Cartão</option>
                                                    <option value="Cheque">Cheque</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="data" class="control-label">Data</label>
                                                <input type="date" v-model="inputs.data" class="form-control" name="data" id="data">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="numerocheque" class="control-label">N°</label>
                                                <input type="text" v-model="inputs.numero_cheque" class="form-control" name="numerocheque" id="numerocheque">
                                            </div>
                                        </div>
                                        <div class="row row-space">
                                            <div class="col">
                                                Favorecido:
                                            </div>
                                            <div class="col text-primary">
                                                {{favorecido}}
                                            </div>

                                        </div>
                                        <div class="row row-space">
                                            <div class="col">
                                                Valor:
                                            </div>
                                            <div class="col text-primary">
                                                {{inputs.valor}}
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                      
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="closeModal()">Fechar</button>
                        <button type="button" class="btn btn-primary" @click="checkForm()">Emitir</button>
                    </div>
                </div>
            </div>
              </div>
</div>
        </transition>
    </div>
</div>
</template>

<script>
import axios from 'axios'
export default {
    name: "EmitirPagamento",
    data() {
        return {
            inputs: {},
            index: "15",

        };
    },
    beforeMount() {

    },
    props: {
        id: {
            require: false
        },
        dataAtual: {
            require: false
        },
        valor: {
            // default: 0,      
        },
        showModalEmitir: {
            require: true
        },
        favorecido: {
            require: false
        },
    },
    methods: {
        pegarDataAtual() {
            var data = new Date();
            var dia = data.getDate(); // 1-31

            var mes = data.getMonth(); // 0-11 (zero=janeiro)

            var ano4 = data.getFullYear();
            var hora = data.getHours();
            var min = data.getMinutes();
            var seg = data.getSeconds();

            var str_data = "" + dia + (mes + 1) + ano4 + hora + min + seg;

            this.inputs.numero_cheque = str_data
        },
        closeModal() {
            this.$emit("event-fechar-modal-emitir");
        },
        checkForm: function () {
            this.fazerPagamento();
            this.$emit("event-fechar-modal-emitir");
        },
        fazerPagamento() {
            var objThis = this;
            var url = process.env.VUE_APP_LARAVEL_API_URL + "/emitirpagamento";
            axios
                .post(url, this.inputs)
                .then(response => {
                    console.log(response.data);
                    objThis.$emit("event-emitir-pagamento");
                   
                })
                .catch(e => {
                    objThis.errors.push(e);
                });
        }
    },
    watch: {
        // valor(){
        //     if (!this.valor) return "0,00";
        //         let val = (this.valor / 1).toFixed(2).replace(".", ",");
        //         this.valor =  val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        // }
        showModalEmitir() {
            this.pegarDataAtual()
            this.inputs.id = this.id
            this.inputs.data = this.dataAtual + "-01";
            this.inputs.valor = this.$props.valor
            this.inputs.tipo_pagamento = 'Transferência'

        }
    },

};
</script>

<style>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}
</style>
