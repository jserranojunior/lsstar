<template>
    <div>
        <nav class="side-navbar">
          <div class="side-navbar-wrapper">
            <!-- Sidebar Header    -->
            <div class="sidenav-header d-flex align-items-center justify-content-center">
              <!-- User Info-->
              <div class="sidenav-header-inner text-center">
               
                
                    <h1 class="text-primary text-center">LS STAR</h1>
              
                
                <img :src="'img/usuarios/'+userLaravel.photo" alt="person" class="img-fluid rounded-circle">
                <h2 class="h5">{{userLaravel.name}}</h2><span>Administrador</span>
              </div>
              <!-- Small Brand information, appears on minimized sidebar-->
              <div class="sidenav-header-logo">
                <a href="index.html" class="brand-small text-center"> 
                  <strong>L</strong><strong class="text-primary">S</strong></a></div>
            </div>
            <!-- Sidebar Navigation Menus-->
            <div class="main-menu">
              <h5 class="sidenav-heading">Menu</h5>
              <ul id="side-main-menu" class="side-menu list-unstyled">                  
                <li>
                   <router-link to="/">
                      <i class="fas fa-home"></i>
                      Home                  
                    </router-link>
                </li>
                <li>
                   <a href="/financeiro/contasapagar">
                      <i class="fas fa-money-check-alt"></i>
                      Financeiro                
                    </a>
                </li>
                <li>
                   <a href="../public/financeiro">
                      <i class="fas fa-money-check-alt"></i>
                      Financeiro  - Antigo              
                    </a>
                </li>
                <li>
                  <a href="#lasPalmasDropdown" class="dropdown-toggle-menu" aria-expanded="false" data-toggle="collapse"> 
                    <i class="fas fa-tree"></i>
                    Las Palmas <i class="fa-dropdown fas fa-caret-down"></i>                    
                  </a>
                  <ul id="lasPalmasDropdown" class="collapse list-unstyled ">
                    <li>
                      <router-link to="/laspalmas/novocliente">
                        <i class="fas fa-plus-circle"></i>
                          Novo Cliente             
                      </router-link>
                    </li>
                    <li>
                      <router-link to="/laspalmas/visitas">
                        <i class="fas fa-eye"></i>
                          Visitas             
                       </router-link>
                    </li>
                  </ul>
                </li>  


                <li>
                   <router-link to="/manutencoes">
                      <i class="fas fa-tools"></i>
                      Manutenções                  
                    </router-link>
                </li>

                <li>
                  <a href="#clientesDropdown" class="dropdown-toggle-menu" aria-expanded="false" data-toggle="collapse"> 
                    <i class="fas fa-users"></i>
                    Clientes <i class="fa-dropdown fas fa-caret-down"></i>
                    
                  </a>
                  <ul id="clientesDropdown" class="collapse list-unstyled ">
                    <li>
                   <router-link to="/novo/cliente">
                      <i class="fas fa-plus-circle"></i>
                      Novo               
                    </router-link>
                  </li>
                     <li>
                   <router-link to="/clientes/todos">
                      <i class="fas fa-users"></i>
                      Todos                 
                    </router-link>
                </li>
                   <li>
                   <router-link to="/clientes/proprietarios">
                      <i class="fas fa-users"></i>
                      Proprietários                 
                    </router-link>
                </li>
                   <li>
                   <router-link to="/clientes/clientes">
                      <i class="fas fa-users"></i>
                      Clientes                  
                    </router-link>
                </li>
                  </ul>
                </li>

                <li>
                  <a href="#EmpreendimentosDropdown" class="dropdown-toggle-menu" aria-expanded="false" data-toggle="collapse"> 
                    <i class="fas fa-building"></i>
                    Empreendimentos <i class="fa-dropdown fas fa-caret-down"></i>                    
                  </a>
                  <ul id="EmpreendimentosDropdown" class="collapse list-unstyled ">
                    <li>
                      <router-link to="/novo/empreendimento">                
                      <i class="fas fa-plus-circle"></i>
                      Novo               
                      </router-link>
                  </li>
                   <li>
                       <router-link to="/empreendimentos/Todos">     
                        <i class="far fa-building"></i>
                          Todos        
                       </router-link>
                    </li>
                    <li>
                       <router-link to="/empreendimentos/Á%20venda">     
                        <i class="fas fa-cart-arrow-down"></i>
                          A venda         
                       </router-link>
                    </li>
                    <li>
                       <router-link to="/empreendimentos/Vendida">
                        <i class="fas fa-glass-cheers"></i>
                          Vendida            
                       </router-link>
                    </li>
                    <li>
                      <router-link to="/empreendimentos/Construção">
                        <i class="fas fa-paint-roller"></i>
                          Construção           
                      </router-link>
                    </li>
                  </ul>
                </li>
              <li>
                   <a href="agenda">
                      <i class="far fa-list-alt"></i>
                      Agenda               
                    </a>
                </li>
                <li>
                   <a href="fornecedor">
                      <i class="far fa-handshake"></i>
                      Fornecedores                
                    </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: "Menu",
    data(){
      return{
        userLaravel: {},
      }
    },    
    created(){
      this.userLaravel.id = document.querySelector("meta[name='user-id']").getAttribute('content');
      this.userLaravel.photo = document.querySelector("meta[name='user-photo']").getAttribute('content');
      this.userLaravel.name = document.querySelector("meta[name='user-name']").getAttribute('content');
      console.log(this.userLaravel)
    }
}
</script>

<style>
.dropdown-toggle-menu::after {
    display: none! important
}

.dropdown-toggle-menu::before {
    display: none! important
}

.fa-dropdown{
  float:right;
  margin-top: 4px;

}

.side-navbar .sidenav-header img {
    width: 80px;
    height: 80px;
}
</style>
