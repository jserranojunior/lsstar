<template>
    <div v-if="clientes">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
           <h4 class="text-center">
                Relatório de visita
           </h4>

        <div class="box">
            <div class="box-body">
                <table class=" table table-striped table-bordered table-hover">
            <tr>
                <th>
                    Nome
                </th>
                <th>
                    Data
                </th>
            </tr>
            <tr v-for="cliente in clientes">
                <td>{{cliente.nome}}</td>
                <td>{{cliente.data_visita}}</td>
            </tr>
        </table>
            </div>
        </div>
        </div>
        </div>
    </div>
</template>


<script>
    import axios from 'axios'
  
    export default {
        name: "RelatorioVisitas",
        data(){
            return{
                clientes:{}
            }
        },
        methods:{
            getRelatorios(){
             let url = '../v1/getclientelaspalmas';        
        axios
            .get(url)
              .then(response => {
             
                this.clientes = response.data
                console.log(this.clientes)
              }                
            )
            .catch(function (error) {
            console.log(error);
            console.log("naõ cadastrado")
            });
            }
        },
        mounted(){
            this.getRelatorios()
        }
       

    }
</script>
