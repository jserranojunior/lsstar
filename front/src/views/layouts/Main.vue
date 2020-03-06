<template>
<div>

    <div class="wrapper">
        <Header></Header>
        <SideBar></SideBar>
        <!-- <SideBar></SideBar> -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">

                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-12">
                            <slot name="mainpage"></slot>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

    </div>
    <!-- </body> -->
</div>
</template>

<script>
import SideBar from './SideBar'
import Header from './Header'

export default {
    name: "Main",
    components: {
        SideBar,
        Header,
    },
    data() {
        return{}
    },
    methods: {

    },

    // computed: {
    //     ...mapState({
    //          auth: state => state.Auth,            
    //         error: state => state.Auth.error,

    //     })
    // },

}
</script>
