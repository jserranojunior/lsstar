<template>
    <div>
        Contas a pagar
        <div class="btn btn-primary pointer" @click="abrirPopup">(+)  Incluir</div>
    </div>
</template>

<script>
    export default {
        name: "contasAPagar",
        methods:{
            abrirPopup(){
                var $url = 'http://localhost/lsstar/back/public/financeiro/criar/2020-03';
     
       var width = 560;
       var height = 568;    
     var left = 400;
         var top = 100;   
                       window.open($url,'janela', 'width='+width+', height='+height+', top='+top +', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
            }
        }
    }
</script>
