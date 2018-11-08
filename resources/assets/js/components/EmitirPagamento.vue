<template>
  <div>
    <div v-if="showModalEmitir">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="exampleModalLabel">Emitir Pagamento - {{id}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" @click="closeModal()">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="box">
                    <div class="box-body">
                      <div class="row">
                        <div class="form-group">
                          <p v-for="error in errors" class="text-center danger" :key="error.id">{{ error }}</p>
                          <div class="col-xs-4">
                            <label for="tipopagamento" class="control-label">Tipo Pagamento</label>
                          </div>
                          <div class="col-xs-8">
                            <select class="form-control" v-model="tipo_pagamento">
                              <option disabled value="">Escolha um item</option>
                              <option value="Cartão">Cartão</option>
                              <option value="Cheque">Cheque</option>
                              <option value="Transferência">Transferência</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-xs-4">
                            <label for="data" class="control-label">Data</label>
                          </div>
                          <div class="col-xs-8">
                            <input type="date" v-model="dataAtualHoje" class="form-control" name="data" id="data">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" @click="closeModal()">Close</button>
                  <button type="button" class="btn btn-primary" @click="checkForm()">Salvar</button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </transition>
    </div>
  </div>
</template>

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

<script>
import { required, minLength, between } from "vuelidate/lib/validators";

export default {
  name: "EmitirPagamento",
  data() {
    return {
      dataAtualHoje: "",
      index: "15",
      tipo_pagamento: "",
      errors: []
    };
  },
  props: {
    id: "",
    dataAtual: "",
    valor: "",
    showModalEmitir: "",
  },
  methods: { 
    closeModal(){
      this.$emit("event-fechar-modal-emitir");
    },   
    checkForm: function(e) {
      this.errors = [];
      if (!this.tipo_pagamento) {
        this.errors.push("Selecione um pagamento.");
        console.log("Selecione um pagamento.");
      } else {
        this.fazerPagamento();
        this.$emit("event-fechar-modal-emitir");
      }
    },
    getDate() {
      this.dataAtualHoje = this.$props.dataAtual + "-01";
    },
    fazerPagamento() {
      var objThis = this;
      var url = "http://localhost/lsstar/public/api/v1/emitirpagamento";
      this.axios
        .post(url, {
          id: this.id,
          valor: this.valor,
          data: this.dataAtualHoje,
          tipo_pagamento: this.tipo_pagamento
        })
        .then(response => {
          // console.log(response.data);
          this.$emit("event-emitir-pagamento");
          console.log("Pagamento Emitido");
        })
        .catch(e => {
          this.errors.push(e);
        });
    }
  },
  validations: {
    tipo_pagamento: {
      required
    }
  },
  watch: {
    dataAtual() {
      this.getDate();
    },    
    
  }
};
</script>