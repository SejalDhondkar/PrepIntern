<template>
  <v-container
        class="fill-height my-auto"
        fluid
      >
    <v-card
      class="mx-auto elevation-6"
      width="85%"
      >

        <v-toolbar
          color="primary"
          dark
          flat
        >
            <v-spacer />
              <v-toolbar-title>Registration</v-toolbar-title>
            <v-spacer />
        </v-toolbar>



      <v-form>
        <v-container class="p-4">
        <div class="alert alert-danger" v-if="has_error && !success">
          <p v-if="error == 'registration_validation_error'">Validation error(s), please see the message(s) below.</p>
          <p v-else>Error, unable to register at this moment. If the problem persists, please contact our administrator.</p>
        </div>

        <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" placeholder="" v-model="name">
            </div>

          <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
            <label for="email">E-mail</label>
            <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email">
            <span class="help-block" v-if="has_error && errors.email">{{ errors.email }}</span>
          </div>
          <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" class="form-control" placeholder="918765432101" v-model="phone_number">
            <span class="help-block" v-if="has_error && errors.contact_no">{{ errors.contact_no }}</span>
          </div>

          <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" v-model="password">
            <span class="help-block" v-if="has_error && errors.password">{{ errors.password }}</span>
          </div>

          <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation">
          </div>

          <button type="submit" class="btn btn-success">Register</button>
        </form>
        </v-container>
      </v-form>

    </v-card>
  </v-container>
</template>
<script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        has_error: false,
        phone_number:'',
        error: '',
        errors: {},
        success: false,
        role_id: 5,
      }
    },

    created(){
      this.$store.commit('SET_LAYOUT', 'loginsignup-layout');
    },

    methods: {
      register() {
        var app = this
        this.$auth.register({
          data: {
            name: app.name,
            email: app.email,
            phone_number: app.phone_number,
            password: app.password,
            password_confirmation: app.password_confirmation,
            role_id: app.role_id,
          },
          success: function () {
            let authkey= '308476ARq4VkPBV55df64864';
            let template_id= '5e98ab48d6fc055d4e6baac2';
            let extra_param= '{"Company_Name":"PrepIntern"}';
            const options = { headers: {'content-type': 'application/x-www-form-urlencoded'}};
            var self = this;
            this.$http.get(`https://infinite-depths-06908.herokuapp.com/https://api.msg91.com/api/v5/otp?authkey=${authkey}&template_id=${template_id}&extra_param=${extra_param}&mobile=${app.phone_number}&invisible=0&otp=&userip=&email=&otp_length=&otp_expiry=`)
              .then(response => {
                console.log(response);
              })
              .catch(error =>{
                console.log('error');
              })

            app.success = true
            this.$router.push('/student/verifymobile',{ params: {successRegistrationRedirect: true}})
          },
          error: function (res) {
            console.log(res.response.data.errors)
            app.has_error = true
            app.error = res.response.data.error
            app.errors = res.response.data.errors || {}
          }
        })
      }
    }
  }
</script>
