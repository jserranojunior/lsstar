import {api} from "@/http/services.js"

export default {
    state:{
        data:{}, 
        // addcliente: "",   
        // laspalmas: {},    
    },
    mutations:{
        GET_EMPREENDIMENTOS(state, data){
            state.data = data
        },    
    },
    actions:{
        getEmpreendimentos(context, parametro) {
            let url = '/casa?status=' + parametro
            api.get(url)
                .then(response => {
                    context.commit('GET_EMPREENDIMENTOS', response.data.data)                    
                })
                .catch(function(error) {
                    console.log(error);
                    console.log("naõ cadastrado")
                });
        },    
        
        addEmpreendimento(context, data) {
            let url = '/casa';        
            api.post(url, data)
                  .then(response => {
                    console.log(response.data.message)
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