<template>
<div>
    <Main>
        <template v-slot:mainpage>
Bem vindo {{Auth.user.username}}

 </template>
    </Main>
</div>
</template>

<script>
// @ is an alias to /src

import Main from '@/views/layouts/Main'
import {mapState } from 'vuex'
export default {
  name: 'home',
  data() {
        return {
        }
    },
    computed:{
        ...mapState({
            Auth: state => state.Auth
        })
    },
  components: {      
        Main,
    }
}
</script>
