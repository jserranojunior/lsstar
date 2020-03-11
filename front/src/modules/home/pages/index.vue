<template>
<div>
    <Main>
        <template v-slot:mainpage>
            <header class="text-center text-primary font-weight-bold display">
                <h3>SEJA BEM VINDO!</h3>
                <h4 class="text-center  text-dark">Fique a vontade para testar as novas atualizações!</h4>
            </header>

            

            <div class="row justify-content-center">
                
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
                    <router-link to="/financeiro/contasapagar" class="nav-link">
                        <div class="card grow pointer">
                            <img src="@/assets/img/home/financeiro.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">FINANCEIRO</h6>
                            </div>
                        </div>
                    </router-link>
                </div>

                <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
                    <router-link to="/empreendimentos/Todos" class="nav-link">
                        <div class="card grow pointer">
                            <img src="@/assets/img/home/empreendimentos.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">EMPREENDIMENTOS</h6>
                            </div>
                        </div>
                    </router-link>
                </div>

                <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
                    <router-link to="/manutencoes" class="nav-link">
                        <div class="card grow pointer">
                            <img src="@/assets/img/home/manutencao.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">MANUTENÇÕES</h6>
                            </div>
                        </div>
                    </router-link>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
                    <router-link to="/clientes/proprietarios" class="nav-link">
                        <div class="card grow pointer">
                            <img src="@/assets/img/home/proprietarios.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">PROPRIETÁRIOS</h6>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
                    <router-link to="/clientes/clientes" class="nav-link">
                        <div class="card grow pointer">
                            <img src="@/assets/img/home/clientes.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">CLIENTES</h6>
                            </div>
                        </div>
                    </router-link>
                </div>

                <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3 col-xl-3">
                    <router-link to="/laspalmas/visitas" class="nav-link">
                        <div class="card grow pointer">
                            <img src="@/assets/img/home/visitalaspalmas.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">LAS PALMAS</h6>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </template>

    </Main>
</div>
</template>

<script>
import Main from '@/views/layouts/Main'
export default {
    name: "Home",
    components: {
        Main,
    },
}
</script>

<style>
.grow:hover
{
     -webkit-box-shadow: 4px 4px 13px -1px rgba(0,0,0,0.69);
-moz-box-shadow: 4px 4px 13px -1px rgba(0,0,0,0.69);
box-shadow: 4px 4px 13px -1px rgba(0,0,0,0.69);
        -webkit-transform: translateX(-4px);
        transform: translateX(-4px);
}
</style>
