<template>
<div>
    <div class="row">
        <div class="col">
            <div class="form-group row">
                <label for="favorecido" class='col-4  control-label'>Fornecedor</label>
                <div class="col-8">
                    <select name="favorecido" v-model="inputs.favorecido" class="form-control">
                    <option>Arrumar</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-4  control-label">Tipo Conta</label>
                <div class="col-8">
                <select name="tipo" id="tipo" v-model="inputs.tipo" class="form-control ">
                    <option value="Extra">À Vista</option>
                    <option value="Parcelado">Parcelado</option>
                    <option value="Fixo">Mensal</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-4  control-label">Data Pagamento</label>
                <div class="col-8">
                <input v-model="inputs.inicio_pagamento" class="form-control">
                </div>
            </div>
            <div class="form-group row"  v-if="inputs.tipo">
                <label for="" class="col-4  control-label">                    
                    <span id="valor-vista" v-if="inputs.tipo == 'Extra'">Valor</span>
                    <span id="valor-parcela" v-else-if="inputs.tipo == 'Parcelado'">Valor de cada parcela</span>
                </label>
                <div class="col-8">
                <input type="text" name="valor" v-model="inputs.valor" class="form-control">
            </div>
            </div>
  
            <div class="form-group row"  v-if="inputs.tipo == 'Parcelado'">
                <label for="" class="col-4  control-label">Quantida de parcelas</label>
                <div class="col-8">
                <input type="number" name="parcelas" v-model="parcelas" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-4  control-label">Negócios</label>
                <div class="col-8">
                <select name="area" v-model="inputs.area" class="form-control">
                    <option>ARRUMAR</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-4  control-label">Conta</label>
                <div class="col-8">
                <select name="ccustos" v-model="inputs.ccustos" class="form-control">
                    <option>ARRUMAR</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-4  control-label">Detalhes</label>
                <div class="col-8">
                <input type="text" name="item" v-model="inputs.item" class="form-control">
                </div>
            </div>
            <div class="form-group row">
               <label for="" class="col-4  control-label">REC/NF</label>
               <div class="col-8">
                <select name="pagador" v-model="inputs.pagador" class="form-control select_busca">
                    <option>Recibo</option>
                    <option>Nota Fiscal</option>
                </select>
               </div>
            </div>
           
           
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
             <div class="btn btn-primary" @click="cadastrar()">CADASTRAR</div>
        </div>
    </div>
 {{post}}
</div>
</template>

<script>
export default {
    name: "CriarEditar",
    data(){return{
        inputs: {},
        post: {},
    }},
    methods:{
        cadastrar(){
            this.post = this.inputs
        }
    }
    
}
</script>
