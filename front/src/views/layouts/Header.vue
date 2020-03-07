<template>
    <div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>

                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <router-link to="/" class="nav-link">
                        <a href="#" class="nav-link">Home</a>
                    </router-link>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <router-link to="/financeiro" class="nav-link">
                        <a href="#" class="nav-link">Financeiro</a>
                    </router-link>
                </li>
               

            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>

                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- <a v-if="!Auth.token" class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <router-link to="/login">
                            <button class="btn btn-success  btn-sm">Login</button>
                        </router-link>
                    </a> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" :href="linkSair">
                   
                            <p class="text-danger">Sair</p>
                        

                    </a>
                </li>

            </ul>
        </nav>

    </div>
</template>

<script>
import {mapState, mapActions } from 'vuex'
    export default {
        name: "Header", 
        data() {
        return {
            linkSair: process.env.VUE_APP_LARAVEL_SITE_URL + '/sair',
        }
    },
    methods:{
         ...mapActions('Auth', ['Logout']),
        
        sair(){
            this.Logout()
            this.$router.go('/login')
        }
    },
    computed:{
        ...mapState({
            Auth: state => state.Auth
        })
    },
     
    }
</script>

<style lang="scss" scoped>

</style>