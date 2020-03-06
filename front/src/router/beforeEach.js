

 
import store from '../store'

export default async (to, from, next) => {
  document.title = `Intellect - ${to.name}`

  var token = store.getters['Auth/hasToken']
  
  if(!token || token == "undefined" || token == "null"){
    token = false
  
  }

  // rota home
  if (to.name !== 'login' && !token) { 
    try {
      await store.dispatch('Auth/ActionCheckToken')
  
      next({ path: to.path })
    } catch (err) {
 
      next({ name: 'login' })
    }
    // rota login
  } 
  else if (to.name === 'login' && token) {

    next({ name: 'home' })
  } 
    
  else if (to.name !== 'login' && token){      
    await store.dispatch('Auth/ActionCheckToken')    
    next()
  }
  else if (to.name === 'login' && !token){      
    next()
  }
  
}