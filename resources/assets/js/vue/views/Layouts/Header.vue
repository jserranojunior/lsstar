<template> 
    <div>
        
            <nav class="navbar navbar-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">LS STAR</a>
  <a id="menuToggle" class="menutoggle float-left"><i class="fa fa-bars"></i></a>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
     <div class="dropdown for-notification">
         <div class="btn btn-notification"><i class="fa fa-bell"></i><span class="count"> 0</span></div>
                            <div class="btn btn-notification">
                                <i class="fa fa-envelope"></i><span class="count"> 4</span>
                            </div>
                            
                            
                        </div>
    
    </form>
  </div>
</nav>
       
        
    </div>
</template>
 
<script>
export default {
    name: "Header"
}
</script>

<style>
.navbar-top{
    display: flex;
        padding: .5rem 1rem;
}
.btn-notification{
        background: transparent;
   
    color: #99abb4;
  
}
</style>