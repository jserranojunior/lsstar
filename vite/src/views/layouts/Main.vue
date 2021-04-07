<template>
  <div>
    <Header></Header>

    <div class="flex bg-gray-100 w-full h-screen">
      <SideBar></SideBar>

      <div class="sm:w-8/12 md:w-10/12 lg:w-11/12 xl:w-11/12 p-4 mx-auto text-gray-500">
        <slot name="mainpage"></slot>
      </div>

      <!-- <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <div class="w-full">
          
        </div>
      </div> -->
    </div>

    <!-- <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid"></div>
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
      </div> -->

    <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
    <!-- </aside> -->
  </div>
  <!-- </body> -->
</template>

<script>
import SideBar from "@/views/layouts/SideBar.vue";
import Header from "./Header.vue";

export default {
  name: "Main",
  components: {
    SideBar,
    Header,
  },
  data() {
    return {};
  },
  methods: {},

  // computed: {
  //     ...mapState({
  //          auth: state => state.Auth,
  //         error: state => state.Auth.error,

  //     })
  // },
};
</script>
