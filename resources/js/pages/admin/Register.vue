<template>
<v-container>
  <v-card
    class="mx-auto p-4"
    width="95%"
    max-width="700px"
    raised
  >
    <v-form
    ref="form"
    v-model="valid"
    lazy-validation
  >
    <v-text-field
      v-model="register.name"
      :counter="20"
      :rules="nameRules"
      label="Name"
      required
    ></v-text-field>

    <v-text-field
      v-model="register.email"
      :rules="emailRules"
      :counter="200"
      label="Email"
      required
    ></v-text-field>

    <v-text-field
            v-model="register.password"
            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
            :rules="passwordRules"
            :type="show1 ? 'text' :'password'"
            label="Password"
            hint="At least 8 characters"
            counter
            @click:append="show1 = !show1"
    ></v-text-field>

    <v-text-field
            v-model="register.confirmpassword"
            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
            :rules="confirmPasswordRules.concat(passwordConfirmationRule)"
            :type="show2 ? 'text' : 'password'"
            label="Confirm Password"
            hint="At least 8 characters"
            counter
            @click:append="show2 = !show2"
    ></v-text-field>

    <v-text-field
      v-model="register.phone_number"
      :rules="numberRules"
      :counter="10"
      label="Phone Number"
      required
    ></v-text-field>

    
    <v-btn
      :disabled="!valid"
      color="success"
      class="mr-4"
      @click="submit"
    >
      Submit
    </v-btn>

    
  </v-form>
  </v-card>
</v-container>
</template>

<script>
  export default {
    data: () => ({
      valid:true,
      
      nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 20) || 'Name must be less than 20 characters',
      ],
      
      emailRules: [
        v => !!v || 'Email is required',
        v => (v && v.length <= 200) || 'Email must be less than 200  characters',
      ],

      passwordRules: [
        v => !!v || 'password is required',
        v => (v && v.length >=8) || 'password must be more than 8 characters',
      ],

      confirmPasswordRules: [
        v => !!v || 'Confirm Password is required',
      ],

      numberRules: [
        v => !!v || 'Phone Number is required',
        v => (v && v.length <= 10) || 'Phone Number must be  10 characters',
      ],
      register: {
          name: '',
          email: '',
          password: '',
          confirmpassword: '',
          phone_number: '',
          role_id: 1,
      },

      show1: false,
      show2: false,

            
    }),
    computed: {
    passwordConfirmationRule() {
        return () => (this.register.password === this.register.confirmpassword) || 'Password must match'
    },
},

    created(){
    this.$store.commit('SET_LAYOUT', 'admin-layout');    
  },

    methods: {
    submit()   {
        // var app = this.register;
        this.$auth.register({
          data: {
            name: this.register.name,
            email: this.register.email,
            phone_number: this.register.phone_number,
            password: this.register.password,
            password_confirmation: this.register.confirmpassword,
            role_id: this.register.role_id,
          },
          success: function () {
            console.log("Created.");
            this.$router.push('/admin');
          },
          error: function (res) {
            console.log("Error.");
            console.log(res.response.data.errors);
            app.has_error = true;
            app.error = res.response.data.error;
            app.errors = res.response.data.errors || {};
          }
        })
    }
    }
  }
</script>