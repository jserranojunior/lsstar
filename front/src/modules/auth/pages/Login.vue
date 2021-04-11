<template>
  <div>
    <div class="row justify-content-center">
      <div class="login-box">
        <div class="login-logo">
          <a href="#"><b>Login</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <p>{{ Auth }}</p>
          <div class="card-body login-card-body">
            <div class="input-group mb-3">
              <input
                type="email"
                class="form-control"
                placeholder="Email"
                v-model="fields.email"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input
                type="password"
                class="form-control"
                placeholder="Password"
                v-model="fields.password"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember" />
                  Esqueci a senha
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button class="btn btn-primary btn-block btn-sm" @click="logar()">
                  LOGAR
                </button>
              </div>
              <!-- /.col -->
            </div>

            <div class="social-auth-links text-center mb-3">
              <p>- OR -</p>
              <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
              </a>
              <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
              </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
              <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
              <a href="register.html" class="text-center">Register a new membership</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
export default {
  name: "Login",
  data() {
    return {
      fields: {},
    };
  },
  beforeMount() {
    this.fields.email = "jorgeserranojunior@gmail.com";
    this.fields.password = "carro";
  },

  computed: {
    ...mapState("Auth", {
      Auth: (state) => state,
    }),
  },
  methods: {
    ...mapActions("Auth", ["authenticate"]),
    logar() {
      this.authenticate(this.fields);
    },
  },

  watch: {
    Auth: {
      handler: function () {
        if (this.Auth.token > "") {
          this.$router.go("/login");
        }
      },
      deep: true,
    },
  },
};
</script>
