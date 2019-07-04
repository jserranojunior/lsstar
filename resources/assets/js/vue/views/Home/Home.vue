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
                                    <div class="card-body">
                                        <h1 class="text-center text-primary">Seja bem vindo!</h1>
                                        <h4 class="text-center">Fique a vontade para testar as novas atualizações!</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <a href="http://localhost/lsstar/public/financeiro">
                                    <div class="card">
                                        <img src="img/usuarios/financeiro-foto.jpg" class="card-img-top">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">FINANCEIRO</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3">
                                <router-link to="/manutencoes">
                                    <a href="#">
                                        <div class="card">
                                            <img src="img/home/manutencao.jpg" class="card-img-top">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">MANUTENÇÕES</h6>
                                            </div>
                                        </div>
                                    </a>
                                </router-link>
                            </div>
                            <div class="col-3">
                                <a href="#">
                                    <div class="card">
                                        <img src="img/home/clientes.jpg" class="card-img-top">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">CLIENTES</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="#">
                                    <div class="card">
                                        <img src="img/home/agendamento.jpg" class="card-img-top">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">AGENDA</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="#">
                                    <div class="card">
                                        <img src="img/home/fornecedor.jpg" class="card-img-top">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">FORNECEDORES</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
    
                            <div class="col-3">
                                <a href="#">
                                    <div class="card">
                                        <img src="img/home/casas.jpg" class="card-img-top">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">CASAS</h6>
                                        </div>
                                    </div>
                                </a>
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
import Menu from '../Layouts/Menu'
import Header from '../Layouts/Header'
import Footer from '../Layouts/Footer'


export default {
    name: "Home",
    components: {
        Menu,
        Header,
        Footer,
    }
}
</script>
