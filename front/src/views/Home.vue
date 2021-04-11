<template>
  <div>Bem vindo {{ Auth.user.username }}</div>
</template>

<script>
// @ is an alias to /src

import { mapState } from "vuex";
export default {
  name: "home",
  data() {
    return {};
  },
  computed: {
    ...mapState({
      Auth: (state) => state.Auth,
    }),
  },
};
</script>
