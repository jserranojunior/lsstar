<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 v-if="this.$route.params.id">EDITANDO CLIENTE</h3>
                        <h3 v-else>NOVO CLIENTE</h3>
                    </div>
                </div>
            </div>
        </div>
    
        <section id="contato">
            <div class="row justify-content-center">
                <div class="col-10">
                         <div class="form-group">
                        <input type="text" placeholder="Nome Completo" class="form-control input-menor-for-btn" v-model="inputs.nome">
                    
                      <div class="btn btn-primary float-right btn-for-input" @click="exibirContato = !exibirContato">
                        <i class="fas fa-chevron-down" v-if="exibirContato == false"></i>
                        <i class="fas fa-chevron-up" v-if="exibirContato"></i> CONTATOS
                    </div>
                    
                    </div>
                </div>
                
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="form-group">
                        <input type="text" placeholder="E-mail" class="form-control" v-model="inputs.email">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Telefone" class="form-control" v-model="inputs.telefone">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="number" placeholder="Idade" class="form-control" v-model="inputs.idade">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="CPF" class="form-control" v-model="inputs.cpf">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="RG" class="form-control" v-model="inputs.rg">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Profissão" class="form-control" v-model="inputs.profissao">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Empresa" class="form-control" v-model="inputs.empresa">
                    </div>
                </div>
            </div>
        </section>
    
        <section id="segundocontato" v-if="exibirContato">
            <div class="row">
                <div class="col">
                    <h4 class="text-center text-primary subtitle">Segundo Contato</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="form-group">
                        <input type="text" placeholder="Nome Completo" class="form-control" v-model="inputs.segundonome">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="E-mail" class="form-control" v-model="inputs.segundoemail">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Telefone" class="form-control" v-model="inputs.segundotelefone">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Profissão" class="form-control" v-model="inputs.segundoprofissao">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Empresa" class="form-control" v-model="inputs.segundoempresa">
                    </div>
                </div>
            </div>
        </section>
    
        <section id="segundocontato" v-if="exibirContato">
            <div class="row">
                <div class="col">
                    <h4 class="text-center text-primary subtitle">Terceiro Contato</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="form-group">
                        <input type="text" placeholder="Nome Completo" class="form-control" v-model="inputs.terceironome">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="E-mail" class="form-control" v-model="inputs.terceiroemail">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Telefone" class="form-control" v-model="inputs.terceirotelefone">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Profissão" class="form-control" v-model="inputs.terceiroprofissao">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Empresa" class="form-control" v-model="inputs.terceiroempresa">
                    </div>
                </div>
            </div>
        </section>
    
        <section id="endereco">
            <div class="row">
                <div class="col">
                    <h4 class="text-center text-primary subtitle">Informações de endereço</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="CEP" class="form-control" v-model="inputs.cep">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Bairro" class="form-control" v-model="inputs.bairro">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Logradouro" class="form-control" v-model="inputs.logradouro">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Moradia" class="form-control" v-model="inputs.tipomoradia">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Número" class="form-control" v-model="inputs.numero">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Cidade" class="form-control" v-model="inputs.cidade">
                    </div>
                </div>
            </div>
        </section>
    
        <section id="valores">
            <div class="row">
                <div class="col">
                    <h4 class="text-center text-primary subtitle">Informações sobre valores</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Valor da casa de interesse" class="form-control" v-model="inputs.casainteresse">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Renda Familiar" class="form-control" v-model="inputs.renda">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Sinal" class="form-control" v-model="inputs.sinal">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Poupança" class="form-control" v-model="inputs.poupanca">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="FGTS" class="form-control" v-model="inputs.fgts">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Entrada" class="form-control" v-model="inputs.valorentrada">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Financiado" class="form-control" v-model="inputs.financiado">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Prestações" class="form-control" v-model="inputs.prestacao">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Valor Prestação" class="form-control" v-model="inputs.valorprestacao">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <input type="text" placeholder="Informacao" class="form-control" v-model="inputs.informacao">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="form-group">
                        <input type="text" placeholder="Observação" class="form-control" v-model="inputs.observacao">
                    </div>
                </div>
            </div>
        </section>
    
        <section id="historicovisitas" v-if="this.$route.params.id">
    
            <div class="row row-space">
                <div class="col">
                    <h4 class="text-center text-primary subtitle">Histórico de visitas</h4>
                </div>
            </div>
    
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <h5>Data de visita</h5>
                        </div>
                        <div class="col-4">
                            <h5>Imóvel</h5>
                        </div>
                        <div class="col-4">
                            <h5>Resultado</h5>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
    
            <div v-for="(visita, key, index) in visitas" :key="visita.id" class="row justify-content-center">
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            {{visita.data}}
                        </div>
                        <div class="col-4">
                            {{visita.imovel}}
                        </div>
                        <div class="col-4">
                            {{visita.resultado}}
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </section>
    
        <div class="row justify-content-center" v-if="this.inputs.nome">
            <div class="col-10" v-if="this.$route.params.id">
                <div class="btn btn-primary" @click="atualizarCliente()">ATUALIZAR</div>
            </div>
            <div class="col-10" v-else>
                <div class="btn btn-primary" @click="cadastrarCliente()">CADASTRAR</div>
            </div>
        </div>
    
    </div>
</template>

<script>
import axios from 'axios'
import { mapActions, mapState } from 'vuex'
export default {
    name: "NewOrEditCliente",
    data() {
        return {
            inputs: {},
            exibirContato: false,
            visitas: {},
        }
    },
    methods: {
        ...mapActions([
            'addCliente',
            'updateCliente',
        ]),
        cadastrarCliente() {
            this.addCliente(this.inputs)
            this.inputs = ""
        },
        atualizarCliente() {           

            let url = '../public/api/v1/cliente/' + this.$route.params.id                   
                axios
                    .put(url, this.inputs)
                      .then(response => {
                        console.log("atualizado")
                        this.$router.push({name: 'clientes', params: { tipocliente: 'todos' } });
                      }                
                    )
                    .catch(function (error) {
                    console.log(error);
                    console.log("Não foi atualizado")
                    }); 
        },
        getEditCliente(parametro) {
            let url = '../public/api/v1/cliente/' + parametro
            axios
                .get(url)
                .then(response => {
                    this.inputs = response.data.dados[0]
                    this.visitas = response.data.agendamentos
                })
                .catch(function(error) {
                    console.log(error);
                    console.log("naõ cadastrado")
                });
        }
    },
    watch: {
        $route() {
            if (this.$route.params.id) {
                this.getEditCliente(this.$route.params.id)
            } else {
                this.inputs = {}
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.getEditCliente(this.$route.params.id)
        }
    }
}
</script>

<style>
 .subtitle{
     margin-top: 10px;
    margin-bottom: 10px;
 }
 .input-menor-for-btn{
     width: 78%;
     float: left;
         margin-bottom: 12px;
 }
 .btn-for-input{
     width: 20%;
     float: left;     
 }

 @media (max-width: 576px) { 
      .btn-for-input{
     width: 44%; 
 }
 .input-menor-for-btn{
     width: 44%;
 }
  }
</style>
