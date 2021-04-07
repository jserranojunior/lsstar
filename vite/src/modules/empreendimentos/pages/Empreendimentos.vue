<template>
<div>
    <Main>
        <template v-slot:mainpage>
        <header class="text-center text-primary font-weight-bold display">
            <h3 v-if="$route.params.tipoempreendimento == 'Á venda'">EMPREENDIMENTOS Á VENDA</h3>
            <h3 v-if="$route.params.tipoempreendimento == 'Vendida'">EMPREENDIMENTOS VENDIDOS</h3>
            <h3 v-if="$route.params.tipoempreendimento == 'Construção'">EMPREENDIMENTOS EM CONSTRUÇÃO</h3>
        </header>
    
    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped  table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Número</th>
                                    <th>Endereço</th>
                                    <th>RGI</th>
                                    <th>Status</th>    
                                </tr>    
                            </thead>    
                            <tbody>
                                <tr class="pointer" v-for="(empreendimento, key, index ) in Empreendimentos" :key="empreendimento.id" @click="edit(empreendimento.id)">
                                    <td>{{index + 1}}</td>
                                    <td>{{empreendimento.nome}}</td>
                                    <td>{{empreendimento.numero}}</td>
                                    <td>{{empreendimento.logradouro}}</td>
                                    <td>{{empreendimento.rgi}}</td>
                                    <td>{{empreendimento.status}}</td>    
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
 import Main from '@/views/layouts/Main.vue'
// import {api} from '@/http/services.js'
import { mapActions, mapState } from 'vuex'

export default {
    name: "Empreendimentos",
    data() {
        return {
            tipoempreendimento: "",
            linktipoempreendimento: "",
        }
    },
    components: {      
        Main,
    },
    methods: {
        ...mapActions([
            'getEmpreendimentos',
        ]),
         edit(id){
            this.$router.push({ name: 'novoempreendimentoid', params: { id: id }});
        }
    },
    computed: {
        ...mapState({
            Empreendimentos: state => state.Empreendimentos.data,
        })
    },
    watch: {
        $route() {
            this.getEmpreendimentos(this.$route.params.tipoempreendimento)
        }
    },
    mounted() {
        console.log(this.$route.params.tipocliente)
        this.getEmpreendimentos(this.$route.params.tipoempreendimento)
    }
}
</script>