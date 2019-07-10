import axios from "axios"

export default {
    state:{
        data:{}, 
        addcliente: "",   
        laspalmas: {},    
    },
    mutations:{
        GET_CLIENTES(state, data){
            state.data = data
        },
        GET_CLIENTES_LAS_PALMAS(state, data){
            state.laspalmas = data
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
            let url = '../public/api/v1/cliente';        
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
        
            getClientesLasPalmas(context) {
                let url = '../public/api/v1/getclientelaspalmas'
                axios
                    .get(url)
                    .then(response => {
                        context.commit('GET_CLIENTES_LAS_PALMAS', response.data.data)   
                            
                    })
                    .catch(function(error) {
                        console.log(error);
                        console.log("naõ cadastrado")
                    });
            }, 
           
    }
}