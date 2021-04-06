import {api} from '@/http/services.js'

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
            let url = '/cliente?tipocliente=' + parametro
            api.get(url)
                .then(response => {
                    context.commit('GET_CLIENTES', response.data.data)                    
                })
                .catch(function(error) {
                    console.log(error.response); 
                    console.log("naõ cadastrado")
                });
        }, 

        addCliente(context, data) {
            let url = '/cliente';        
            api.post(url, data)
                  .then(response => {
                    console.log(response)
                    this.inputs = ""
                  }                
                )
                .catch(function (error) {
                console.log(error);
                console.log("naõ cadastrado")
                });
            }, 
        
        getClientesLasPalmas(context) {
            let url = '/getclientelaspalmas'
            api.get(url)
                .then(response => {
                    context.commit('GET_CLIENTES_LAS_PALMAS', response.data.data)   
                        
                })
                .catch(function(error) {
                    console.log(error);
                    console.log("naõ cadastrado")
                });
        }, 

        updateCliente(context, data) {          
            
            let url = '/cliente/' + data.id             
           
                api.patch(url, data.inputs)
                      .then(response => {
                        console.log(response)
                      }                
                    )
                    .catch(function (error) {
                    console.log(error.response);
                    console.log("Não foi atualizado")
                    }); 
        }
           
    }
}