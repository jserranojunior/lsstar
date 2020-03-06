export default {
           
        AUTHENTICATE(state, data){
            state.token = data 
        },
        USER(state, data){
            state.user = data 
        }

}