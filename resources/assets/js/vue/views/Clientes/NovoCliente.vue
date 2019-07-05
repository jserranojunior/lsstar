<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>NOVO CLIENTE</h3>
                    </div>
                </div>
            </div>
        </div>
    
        <section id="contato">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="form-group">
                        <input type="text" placeholder="Nome Completo" class="form-control" v-model="inputs.nome">
                    </div>
                </div>
                <div class="col-2">
                    <div class="btn btn-primary float-right" @click="exibirContato = !exibirContato">
                        <i class="fas fa-chevron-down" v-if="exibirContato == false"></i>
                        <i class="fas fa-chevron-up" v-if="exibirContato"></i>
                         CONTATOS</div>
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
                    <h5 class="text-center">Segundo Contato</h5>
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
                    <h5 class="text-center">Terceiro Contato</h5>
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
                    <h5 class="text-center">Informações de endereço</h5>
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
                    <h5 class="text-center">Informações sobre valores</h5>
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
                        <input type="text" placeholder="informacao" class="form-control" v-model="inputs.informacao">
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

        <div class="row justify-content-center">
            <div class="col-10">
                <div class="btn btn-primary" @click="cadastrarCliente()">CADASTRAR</div>
            </div>
        </div>

    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
export default {
    name: "NovoCliente",
    data() {
        return {
            inputs: {},
            exibirContato: false,
        }
    },
    methods:{
        ...mapActions([
            'addCliente',
        ]),
        cadastrarCliente(){
            this.addCliente(this.inputs)
            this.inputs = ""
        }
    }
}
</script>