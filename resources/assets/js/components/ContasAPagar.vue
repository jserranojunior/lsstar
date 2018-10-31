<template>
    <div>

<div class="col-md-3 col-md-offset-4">
    <div class="box">
      <div class="box-header">
        <div class="text-center">
          <h6>DATA</h6>
        </div>
        <div class="row">
          <div class="col-sm col-xs-6">
            <div class="btn-group">
              <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">
                <a href="#" v-if="data.datas">
                    {{data.datas.mesAtualEscrito}}
                  <span class="caret"></span>
                </a></button><a href="#">
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1"> 

              <li v-if="data.meses" v-for="mes in data.meses" v-bind:key="mes.numero">                  
                <a v-on:click="mesAtual = mes.numero" class="dropdown-item">{{mes.nome}}</a>
              </li>  
              
              </ul>
            </div>
          </div>
          <div class="col-sm col-xs-6 float-right">
            <div class="btn-group  float-right">
              <button type="button" class="float-right btn-sm btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-if="data.datas">
                {{data.datas.anoAtual}}
              </button>
              <div class="dropdown-menu">
               
              </div>
            </div>
          </div>
        </div>
        <div class="row row-space">
          <div class="col-md text-center">
            <a class="btn btn-default btn-xs " href="">Anterior</a>
            <a class="btn btn-default btn-xs float-center" href="/financeiro">Atual</a>
            <a class="btn btn-default btn-xs " href="">Pŕoximo</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-12">
    <table class=" table table-condensed no-padding table-striped table-bordered table-hover" id="tabelaprincipal">
      <tbody>
        <span class="invisible"> # </span>
        <form >

          <tr class="point">
            <td>
              #
            </td>
            <td>
              area
            </td>
            <td>
              ccustos
            </td>
            <td>
              conta->tipo
            </td>           
              <td class="td-without-padding text-center">
                  <span class=" btn-pagar " style="background-color: #2196f3;">  
                  </span>
                </td>
              <td>
             favorecido
            </td>
            <td>
              conta->pagador
            </td>
            <td>
              conta->dia
            </td>
            <td>
            conta->valor
            </td>
            
          </tr>
          @endforeach
        </form>
        
        

        <tr>
            <td colspan="5"></td>
            <td  class="azulclaro" colspan="2">
              <span class="bold  numaior direita">TOTAL DO MÊS</span>
            </td>
            <td  class="azulclaro"></td>
            <td  class="azulclaro" colspan="1">
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
              
                </span>
              </td>
            </tr>

        <tr>
            <td colspan="5"></td>
            <td  class="azulclaro" colspan="2">
              <span class="bold  numaior direita">TOTAL ESTIMADO</span>
            </td>
            <td  class="azulclaro"></td>
            <td  class="azulclaro" colspan="1">
              <span class="bold direita numaior  azul">
              {{data.total}}
              </span>
            </td>
        </tr>       
      
      </tbody>
    </table>
  </div>



    </div>
</template>

<script>
export default {
  name: "ContasAPagar",

  data() {
    return {
      data: "nome",
      mesAtual: "11",
      dataAtual: "2018-12",
      diaInicial: 1,
      diaFinal: 31,
      ordem: "dia",
      area: "",
      ano: ""
    };
  },
  methods: {
    getApiFinanceiro() {
      this.dataAtual = "2018-" + this.mesAtual;

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
      });
    }
  },
  mounted() {
    this.getApiFinanceiro();
  },
  watch: {
    dataAtual: function(val) {
      this.getApiFinanceiro();
    },
    mesAtual: function(val) {
      this.getApiFinanceiro();
    }
  }
};
</script>

