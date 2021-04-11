<template>
  <SLayout>
    <template v-slot:header> <Header></Header> </template>
    <template v-slot:sidebar> <SideBar></SideBar> </template>
    <template v-slot:mainpage>
      <router-view></router-view>
    </template>
  </SLayout>
</template>

<script>
import SideBar from "@/views/layouts/SideBar.vue";
import Header from "@/views/layouts/Header.vue";
export default {
  name: "App",
  components: {
    SideBar,
    Header,
  },
  data() {
    return {
      contato: {},
    };
  },
};
</script>
