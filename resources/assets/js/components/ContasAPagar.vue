<template>
    <div>
        {{data.total}}
    </div>
</template>

<script>
export default {
    name:"ContasAPagar",    
    props:{
         objThis: {},
    },
    data(){
        return{
            data:'nome',
        }
    },
     

     mounted(){       
      var objThis = this;
        this.axios.get('http://localhost/lsstar/public/api/v1/financeiro?data=2018-10&diaInicial=1&diaFinal=31&ordem=&area=').then(
            response => {
            objThis.data = response.data; 
        console.log(objThis.data)
      })
    ;
        
    }
}
</script>

