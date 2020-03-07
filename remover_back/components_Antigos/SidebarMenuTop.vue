<script>
export default {
    name:"sidebarMenuTop",
    data: function(){
        return{
            showSidebarMenu: true,
        };    
  }
}
</script>

<template>
    <header class="main-header">
                <a href="" class="logo">
                    <span class="logo-mini"><b>L</b></span>
                    <span class="logo-lg"><b>LS STAR</b></span>
                </a>
                <nav class="navbar navbar-static-top">

                    <!-- OCULTAR E MOSTRAR O MENU -->
                    <div class="text-left col-md-6">
                        <a class="btn btn-menu-hidden" v-on:click="showSidebarMenu = !showSidebarMenu">
                            <i class="fas fa-bars" id="btn-menu-hidden" ></i>
                        </a>
                    </div>                     

                    <div class="navbar-custom-menu">
                        <div class="text-right">
                            
                            <div class="btn btn-primary" id="imprimir">
                                <span class="glyphicon glyphicon-print"></span>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
</template>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active em versões anteriores a 2.1.8 */ {
  opacity: 0;
}
</style>



