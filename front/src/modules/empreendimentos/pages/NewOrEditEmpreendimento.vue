<template>
<div>
    <Main>
        <template v-slot:mainpage>
            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3 v-if="$route.params.id">EDITANDO EMPREENDIMENTO</h3>
                                <h3 v-else>NOVO EMPREENDIMENTO</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Empreendimento" class="form-control" v-model="inputs.nome">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Número" class="form-control" v-model="inputs.numero">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Matricula" class="form-control" v-model="inputs.numero_matricula">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Número Matricula" class="form-control" v-model="inputs.data_matricula">
                        </div>
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
                            <input type="text" placeholder="Logradouro" class="form-control" v-model="inputs.logradouro">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Bairro" class="form-control" v-model="inputs.bairro">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">

                            <select class="form-control" v-model="inputs.status">
                                <option>Construção</option>
                                <option>Á venda</option>
                                <option>Vendida</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="form-group">
                            <select class="form-control" v-model="inputs.cliente_id">
                                <option value=""></option>
                                <option v-for="cliente in clientes" :value="cliente.id" :key="cliente.id">
                                    {{cliente.nome}}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Proprietário -->

                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Instalação de Luz" class="form-control" v-model="inputs.numero_instalacao_luz">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Fornecedor de luz" class="form-control" v-model="inputs.fornecedor_luz">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="RGI" class="form-control" v-model="inputs.rgi">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Número IPTU" class="form-control" v-model="inputs.numero_iptu">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Número Habitese" class="form-control" v-model="inputs.numero_habitese">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Data Habitese" class="form-control" v-model="inputs.data_habitese">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Alvará" class="form-control" v-model="inputs.alvara">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" placeholder="Data Alvará" class="form-control" v-model="inputs.data_alvara">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center" v-if="inputs.nome && inputs.numero && inputs.logradouro">
                    <div class="col-10" v-if="$route.params.id">
                        <div class="btn btn-primary" @click="atualizarEmpreendimento()">ATUALIZAR</div>
                    </div>
                    <div class="col-10" v-else>
                        <div class="btn btn-primary" @click="cadastrarEmpreendimento()">CADASTRAR</div>
                    </div>
                </div>
            </div>
        </template>
    </Main>
</div>
</template>

<script>
import {
    api
} from '@/http/services.js'
import {
    mapActions
} from 'vuex'
import Main from '@/views/layouts/Main'
export default {
    name: "NewOrEditEmpreendimento",
    data() {
        return {
            inputs: {},
            clientes: {},
        }
    },
    components: {
        Main,
    },
    methods: {
        ...mapActions([
            'addEmpreendimento',
        ]),
        cadastrarEmpreendimento() {
            this.addEmpreendimento(this.inputs)
            // console.log(this.inputs)
            // console.log('cadastrado')
            this.inputs = ""
        },
        atualizarEmpreendimento() {

            let url = '/casa/' + this.$route.params.id
            api.put(url, this.inputs)
                .then(response => {
                    console.log("atualizado")
                    console.log(response.data)
                    this.$router.push({
                        name: 'empreendimentos',
                        params: {
                            tipoempreendimento: 'Todos'
                        }
                    });
                })
                .catch(function (error) {
                    console.log(error);
                    console.log("Não foi atualizado")
                });
        },
        getEditEmpreendimento(parametro) {
            // console.log(parametro)
            let url = '/casa/' + parametro
            api.get(url)
                .then(response => {
                    this.inputs = response.data.data.casa[0]
                })
                .catch(function (error) {
                    console.log(error);
                    console.log("naõ cadastrado")
                });
        },
        getClientes() {
            let url = '/cliente?tipocliente=todos'
            api.get(url)
                .then(response => {
                    this.clientes = response.data.data
                })
                .catch(function (error) {
                    console.log(error);
                    console.log("naõ cadastrado")
                });
        }
    },
    watch: {
        $route() {
            if (this.$route.params.id) {
                this.getEditEmpreendimento(this.$route.params.id)
            } else {
                this.inputs = {}
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.getEditEmpreendimento(this.$route.params.id)
        }

        this.getClientes()
    }
}
</script>
