<template>
    <div class="card mx-auto">
      <div class="card-header">Login</div>

      <div class="card-body">
        <div class="alert alert-danger" v-if="has_error">
          <p>Error, unable to connect with these identifiers.</p>
        </div>
        <form autocomplete="off" @submit.prevent="login" method="post">
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" v-model="password" required>
          </div>
          <button type="submit" class="btn btn-success">Login</button>
        </form>
      </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        email: null,
        password: null,
        has_error: false,
        user: '',
      }
    },

    created(){
      this.$store.commit('SET_LAYOUT', 'loginsignup-layout');
      if(this.$auth.check())
      {
        this.$router.push('/');
      }
    },

    mounted() {
      //
    },

    methods: {
      login() {
        // get the redirect object
        var redirect = this.$auth.redirect()
        var app = this
        this.$auth.login({
          params: {
            email: app.email,
            password: app.password
          },
          success: function() {
            // handle redirection

            if(this.$auth.user().role_id === 1)
            {
              this.$router.push({path: '/admin'});
            }
            if(this.$auth.user().role_id === 4 && this.$auth.user().mobile_verified === 1)
            {
              this.$router.push({path:'/company/dashboard'});
            }
            if(this.$auth.user().role_id === 4 && this.$auth.user().mobile_verified === 0)
            {
              this.$router.push({path: '/company/verifyMobile'});
            }
            if(this.$auth.user().role_id === 5 && this.$auth.user().mobile_verified === 1)
            {
              this.$router.push({path:'/student/dashboard'});
            }
            if(this.$auth.user().role_id === 5 && this.$auth.user().mobile_verified === 0)
            {
              this.$router.push({path: '/student/verifyMobile'});
            }
            // const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'admin.dashboard' : 'dashboard'

            // this.$router.push({name: redirectTo})
          },
          error: function() {
            app.has_error = true
          },
          rememberMe: true,
          fetchUser: true
        })
      }
    }
  }
</script>

<style scoped>
.card-header {
  background-color: #428bca;
  color: white;
}
.card {
  width: 500px;
}
</style>
