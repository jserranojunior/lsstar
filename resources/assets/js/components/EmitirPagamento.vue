<template>
    <div>
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalEmitirPagamento" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title text-center" id="exampleModalLabel">Emitir Pagamento - {{id}}</h5>
        
      </div>
      <div class="modal-body">

<div class="box">
  <div class="box-body">
        <div class="row">
            <div class="form-group">
                <div class="col-xs-4">
                    <label for="tipopagamento" class="control-label">Tipo Pagamento</label>
                </div>
                <div class="col-xs-8">
                    <div class="error" v-if="!tipo_pagamento.required">Field is required</div>
                    <select class="form-control" v-model="tipo_pagamento">              
                    <option value="Cartão" >Cartão</option>
                    <option value="Cheque">Cheque</option>
                    <option :selected="true" value="Transferência">Transferência</option>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="fazerPagamento()">Salvar</button>
      </div>
    </div>
  </div>
</div>
</div>
    </div>
</template>


<script>

import { required, minLength, between } from 'vuelidate/lib/validators'


export default {
  name: "EmitirPagamento",
  data() {
    return {
      dataAtualHoje: "",
      index:"15",
      tipo_pagamento:"",
    };
  },
  props: {
    id: "",
    dataAtual:"",
    valor:"",
  },
  methods: {
    getDate(){
    this.dataAtualHoje = this.$props.dataAtual + '-01';
    },
    
    fazerPagamento() {

     if(this.tipo_pagamento.required){
        var objThis = this;
        var url =
          "http://localhost/lsstar/public/api/v1/emitirpagamento";     
    
    this.axios.post(url, {
      id: this.id,
      valor: this.valor,
      data: this.dataAtualHoje,
      tipo_pagamento: this.tipo_pagamento,

    })
    .then(response => {
      // console.log(response.data);
      this.$emit('event-emitir-pagamento');
      console.log('feito');
    })
    .catch(e => {
      this.errors.push(e)
    })
  }else{
    console.log('Não foi validado');
  }
  }
  },
  validations: {
    tipo_pagamento: {
      required,
    }
  },
 watch:{
    dataAtual(){
      this.getDate();
    },
    // tipo_pagamento(){
    //   this.tipo_pagamento.required = true;
    // }
    
  }
};
</script>
