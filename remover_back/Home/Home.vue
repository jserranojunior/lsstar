<template>
    <div>        
        <header class="text-center text-primary font-weight-bold display"> 
            <h3>SEJA BEM VINDO!</h3>
                <h4 class="text-center  text-dark">Fique a vontade para testar as novas atualizações!</h4>                       
        </header>
            
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <a href="financeiro">
                        <div class="card">
                            <img src="img/usuarios/financeiro-foto.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">FINANCEIRO</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
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
                <div class="col-sm-6 col-md-3">
                    <router-link to="/clientes/clientes">
                        <div class="card">
                            <img src="img/home/clientes.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">CLIENTES</h6>
                            </div>
                        </div>
                    </router-link>
                </div>
                 <div class="col-sm-6 col-md-3">
                    <router-link to="/clientes/proprietarios">
                        <div class="card">
                            <img src="img/home/proprietarios.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">PROPRIETÁRIOS</h6>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="agenda">
                        <div class="card">
                            <img src="img/home/agendamento.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">AGENDA</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="fornecedor">
                        <div class="card">
                            <img src="img/home/fornecedor.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">FORNECEDORES</h6>
                            </div>
                        </div>
                    </a>
                </div>
    
                <div class="col-sm-6 col-md-3">
                     <router-link to="/empreendimentos/Todos">     
                        <div class="card">
                            <img src="img/home/casas.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">EMPREENDIMENTOS</h6>
                            </div>
                        </div>
                     </router-link>
                </div>
                <div class="col-sm-6 col-md-3">
                    <router-link to="/laspalmas/visitas">
                        <div class="card">
                            <img src="img/home/visitalaspalmas.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h6 class="card-title">VISITAS LAS PALMAS</h6>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>        
    </div>
</template>


<script>
export default {
    name: "Home",
    beforeMount(){
        localStorage.setItem('laravel', 1) 
    }
}
</script>
