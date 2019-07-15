import axios from "axios"

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
            let url = '../public/api/v1/casa?status=' + parametro
            axios
                .get(url)
                .then(response => {
                    context.commit('GET_EMPREENDIMENTOS', response.data.data)                    
                })
                .catch(function(error) {
                    console.log(error);
                    console.log("naõ cadastrado")
                });
        },    
        
        addEmpreendimento(context, data) {
            let url = '../public/api/v1/casa';        
            axios
                .post(url, data)
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