import axios from "axios"

export default {
    state:{
        data:{},        
    },
    mutations:{
        GET_CLIENTES(state, data){
            state.data = data
        },
      
    },
    actions:{
        getClientes(context, parametro) {
            let url = '../public/api/v1/cliente?tipocliente=' + parametro
            axios
                .get(url)
                .then(response => {
                    context.commit('GET_CLIENTES', response.data.data)                    
                })
                .catch(function(error) {
                    console.log(error);
                    console.log("naõ cadastrado")
                });
        }, 
        
    }
}