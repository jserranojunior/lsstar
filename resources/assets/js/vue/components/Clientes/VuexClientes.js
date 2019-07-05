import axios from "axios"

export default {
    state:{
        data:{}, 
        addcliente: "",       
    },
    mutations:{
        GET_CLIENTES(state, data){
            state.data = data
        },
        ADD_CLIENTE(state, data){
            state.addcliente = data.data.data
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

        addCliente(context, data) {
            let url = '/sistema/public/api/v1/cliente';        
            axios
                .post(url, data)
                  .then(response => {
                    console.log("cadastrado")
                    this.inputs = ""
                  }                
                )
                .catch(function (error) {
                console.log(error);
                console.log("naõ cadastrado")
                });
            }, 
        
    }
}