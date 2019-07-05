<template>
    <div>
        <Menu></Menu>
        <div class="page">
            <Header></Header>       
            <section class="dashboard-counts section-padding">
                <div class="container-fluid">
         <router-view></router-view>
                </div>
            </section>
             <Footer></Footer>
        </div>
      
    </div>
</template>
 
<script>
import Menu from '../Layouts/Menu'
import Header from '../Layouts/Header'
import Footer from '../Layouts/Footer'
console.log('app funcionnando')
    export default {
        name: "App",
        components: {
        Menu,
        Header,
        Footer,
    }
    }
</script>