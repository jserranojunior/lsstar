<template> 
    <div>
          <header class="header">   
            <nav class="navbar">
              <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                  <div class="navbar-header">
                      <a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a>
                        <a href="index.html" class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block">
                                <span> </span>
                                <strong class="text-primary"></strong>
                            </div>
                        </a>
                </div>
                  <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Notifications dropdown-->
                    <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">0</span></a>
                      <!-- <ul aria-labelledby="notifications" class="dropdown-menu">
                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                            <div class="notification d-flex justify-content-between">
                              <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                              <div class="notification-time"><small>4 minutes ago</small></div>
                            </div></a></li>
                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                            <div class="notification d-flex justify-content-between">
                              <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                              <div class="notification-time"><small>4 minutes ago</small></div>
                            </div></a></li>
                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                            <div class="notification d-flex justify-content-between">
                              <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                              <div class="notification-time"><small>4 minutes ago</small></div>
                            </div></a></li>
                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                            <div class="notification d-flex justify-content-between">
                              <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                              <div class="notification-time"><small>10 minutes ago</small></div>
                            </div></a></li>
                        <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                      </ul> -->
                    </li>
                    <!-- Messages dropdown-->
                    <li class="nav-item dropdown"> 
                      <a id="messages" href="http://webmail.lsstar.com.br" target="_blank" class="nav-link">
                      <i class="fa fa-envelope"></i> 
                      </a>
                    </li>

                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link" @click="imprimir()">
                         <i class="text-white fas fa-print"></i>
                      </a>
                    </li>
                    
                    <!-- Log out-->
                    <li class="nav-item"><a href="../public/sair" class="nav-link logout"> <span class="d-none d-sm-inline-block">Sair</span><i class="fa fa-sign-out"></i></a></li>
                  </ul>
                </div>
              </div>
            </nav>
          </header>        
    </div>
</template>
 
<script>


export default {
    name: "Header",
    
    methods:{
      imprimir(){
        window.print();
      }
    }

}
</script>
