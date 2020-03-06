import axios from "axios"

  export const authenticate = ({dispatch}, data) => {
    return new Promise(async (resolve, reject) => {    
            axios.post('http://127.0.0.1:3333/authenticate', data)
            .then(function (response) {
                dispatch('ActionSetToken', response.data.token)             
                                              
                resolve() 
            })
            .catch(function (error) {
                console.log(error)
                console.log(error.response); 
                reject(error)           
            })  
    })
  }
  export const getUser = ({ commit, state }) => {
    return new Promise(async (resolve, reject) => {           
        const options = {
                    baseURL: 'http://localhost:3333',
                    timeout: 1000,
                    headers: {
                      'Authorization': 'Bearer ' + state.token
                    }
                  }             
            axios.get('/user', options)
            .then(function (response) {                
                commit('USER', response.data)      
                resolve() 
            })
            .catch(function (error) {
                console.log(error)
                console.log(error.response); 
                reject(error)           
            })  
    })
  }

  export const ActionCheckToken = ({ dispatch, state }) => {  
    if (state.token) {     
      return Promise.resolve(state.token)
    }
    var token = localStorage.getItem('token')
    if(!token || token == "undefined" || token == "null" || token == ""){
      token = false
    }
    if (!token) { 
      return Promise.reject(new Error('Token Inválido'))
    }
    if(token || token !== "undefined" || token !== "" || token !== "null"){       
      return dispatch('ActionSetToken', token)    
        
    }   
  }
 

  export const ActionSetToken = ({ commit, dispatch}, payload) => {
    localStorage.setItem('token', payload)   
    commit('AUTHENTICATE', payload) 
    dispatch('getUser', '')  
  }

  // export const ActionSetUser = ({ commit}, payload) => {
  //   commit('USER', payload)
  // }

  export const Logout = ({ commit}) => {
    localStorage.setItem('token', '')
    commit('AUTHENTICATE', '') 
    commit('USER', '')
  }
  