<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                    <p @click="ordenar()">ordenar</p>
                    <ul>
                        <li v-for="(user, index) in users" :key="index">
                             {{user.nome}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import _ from 'lodash';

    export default {
        data(){
            return{
                users:[
                {nome:'Jorge'},
                {nome:'mario'},
                {nome:'Antonio'},
                {nome:'nova'},
                ]
            }
        },
        methods:{
            ordenar(){
                this.users = _.sortBy(this.users,[user => user.nome.toLowerCase()],['desc']);
            }
        },       
        mounted(){
            // this.users =  _.filter(this.users, { 'nome': 'mario' });
            // this.users - _.sortBy(this.users, ['nome']);
            // this.users =  _.orderBy(this.users, ['nome', 'nome'], ['asc','asc']);
            // this.users = _.sortBy(this.users,[user => user.nome.toLowerCase()],['desc']);
        }
     
        
    }
</script>
