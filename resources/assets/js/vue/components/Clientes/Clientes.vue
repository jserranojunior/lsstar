<template>
    <div>
        <Menu></Menu>
        <div class="page">
            <Header></Header>
            <section class="dashboard-counts section-padding">
                <div class="container-fluid">
                    <div class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body text-center">
                                        {{this.tipocliente}}
                                        <h3 v-if="$route.params.tipocliente == 'proprietarios'">PROPRIETÁRIOS</h3>
                                        <h3 v-if="$route.params.tipocliente == 'clientes'">CLIENTES</h3>
                                        <h3 v-if="$route.params.tipocliente == 'todos'">TODOS OS CLIENTES</h3>
    
                                    </div>
                                </div>
                            </div>
                        </div>
             
                        <div class="row">
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
    
                                                    <th>
                                                        Empreendimento
                                                    </th>
                                                    <th>
                                                        Numero
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="pointer" v-for="(cliente, key, index ) in clientes" :key="cliente.id">                                                    
                                                    <td>{{index + 1}}</td>
                                                    
                                                    <td>{{cliente.nome}}</td>
                                                    <td>{{cliente.email}}</td>
                                                    <td class="nowrap">{{cliente.cpf}}</td>
                                                    <td class="nowrap">{{cliente.rg}}</td>
                                                    <td class="nowrap">{{cliente.telefone}}</td>
                                                    <td>{{cliente.nome_empreendimento}}</td>
                                                    <td>{{cliente.numero_empreendimento}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <Footer></Footer>
        </div>
    </div>
</template>

<script>
import Header from '../../views/Layouts/Header'
import Menu from '../../views/Layouts/Menu'
import Footer from '../../views/Layouts/Footer'

import axios from 'axios'
import {mapActions, mapState} from 'vuex'

export default {
    name: "Clientes",
    data() {
        return {
            tipocliente: "",
            linktipoclientes: "",
        }
    },
    components: {
        Menu,
        Header,
        Footer,
    },
    methods: {        
        ...mapActions([
            'getClientes',          
        ])
    },
    computed:{
        ...mapState({
            clientes: state => state.Clientes.data,     
    })
    },
    watch: {
        $route() {
            this.clientes = ""
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