

 
// import store from '../store'
// import {api} from '@/http/services.js'
// import localCookie from 'js-cookie'

// 

//
export default async (to, from, next) => {
  document.title = `Ls Star - ${to.name}`
  var laravel = 0
  if(process.env.VUE_APP_LARAVEL_SITE_URL == 'http://localhost/lsstar/back/public'){
    laravel = 1
    localStorage.setItem('laravel_name', 'Jorge')
    localStorage.setItem('laravel_photo', 'jorge.jpg')
  }else{
    laravel = localStorage.getItem('laravel')
    localStorage.getItem('laravel_name', 'Jorge')
    localStorage.getItem('laravel_photo', 'jorge.jpg')
  }

 if(laravel == 1){
    next()
  }else{
    console.log(laravel)
    window.location.href = process.env.VUE_APP_LARAVEL_SITE_URL + "/login";
  }


  


  // let url = '/logado'
  //           api.get(url)
  // .then(response => {
  //   console.log(response)
  //   if(response){
  //     console.log(response)
  //     next()   
  //   }
                  
  // })
  // .catch(function(error) {
  //   console.log(error.response)
    // window.location.href = process.env.VUE_APP_LARAVEL_SITE_URL + "/login";
  // });



  

  

  // var token = store.getters['Auth/hasToken']
  
  // if(!token || token == "undefined" || token == "null"){
  //   token = false
  
  // }

  // if (to.name !== 'login' && !token) { 
  //   try {
  //     await store.dispatch('Auth/ActionCheckToken')
  
  //     next({ path: to.path })
  //   } catch (err) {
 
  //     next({ name: 'login' })
  //   }
  //   // rota login
  // } 
  // else if (to.name === 'login' && token) {

  //   next({ name: 'home' })
  // } 
    
  // else if (to.name !== 'login' && token){      
  //   await store.dispatch('Auth/ActionCheckToken')    
  //   next()
  // }
  // else if (to.name === 'login' && !token){      
  //   next()
  // }
  
}