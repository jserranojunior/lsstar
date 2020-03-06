<template>
<div>
    <Main>
        <template v-slot:mainpage>
            <header class="text-center text-primary font-weight-bold display">
                {{tipocliente}}
                <h3 v-if="$route.params.tipocliente == 'proprietarios'">PROPRIETÁRIOS</h3>
                <h3 v-if="$route.params.tipocliente == 'clientes'">CLIENTES</h3>
                <h3 v-if="$route.params.tipocliente == 'todos'">TODOS OS CLIENTES</h3>
            </header>

            <div v-if="clientes" class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped  table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nome
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            CPF
                                        </th>
                                        <th>
                                            RG
                                        </th>
                                        <th>
                                            Telefone
                                        </th>

                                        <th v-if="$route.params.tipocliente == 'proprietarios'">
                                            Empreendimento
                                        </th>
                                        <th v-if="$route.params.tipocliente == 'proprietarios'">
                                            Numero
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="pointer" v-for="(cliente, key, index ) in clientes" :key="cliente.id" @click="edit(cliente.id)">
                                        <td>{{index + 1}}</td>

                                        <td>{{cliente.nome}}</td>
                                        <td>{{cliente.email}}</td>
                                        <td class="nowrap">{{cliente.cpf}}</td>
                                        <td class="nowrap">{{cliente.rg}}</td>
                                        <td class="nowrap">{{cliente.telefone}}</td>
                                        <td v-if="$route.params.tipocliente == 'proprietarios'">{{cliente.nome_empreendimento}}</td>
                                        <td v-if="$route.params.tipocliente == 'proprietarios'">{{cliente.numero_empreendimento}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>            
        </template>
    </Main>
</div>
</template>

<script>
// import axios from 'axios'
 import Main from '@/views/layouts/Main'
import {
    mapActions,
    mapState
} from 'vuex'

export default {
    name: "Clientes",
    data() {
        return {
            tipocliente: "",
            linktipoclientes: "",
         
        }
    },
     components: {      
        Main,
    },
    methods: {
        ...mapActions([
            'getClientes',
        ]),
        edit(id) {
            this.$router.push({
                name: 'novoclienteid',
                params: {
                    id: id
                }
            });
        }
    },
    computed: {
        ...mapState({
            clientes: state => state.Clientes.data,
        })
    },
    watch: {
        $route() {
            this.getClientes(this.$route.params.tipocliente)
        }
    },
    mounted() {
        this.getClientes(this.$route.params.tipocliente)
    }
}
</script>

<style>
.table td,
.table th {
    padding: 6px 5px;
    font-size: 13px;
    vertical-align: middle;
    border-top: 1px solid #dee2e6;
}

.nowrap {
    white-space: nowrap;
}

.pointer {
    cursor: pointer;
}
</style>
