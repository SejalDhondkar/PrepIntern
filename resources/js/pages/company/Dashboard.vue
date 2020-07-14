<template>
  <v-card
    raised
    class="mx-auto"
    width="60%"
    min-height="400"
  >
    
    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title>Dashboard</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          
        <v-container class="p-4">
            <v-card-subtitle>Welcome to PrepIntern.</v-card-subtitle>
            <v-card-subtitle>{{this.message}}</v-card-subtitle>
        </v-container>
        
        
  </v-card>

      
</template>

<script>
export default {
    data(){
      return {
        flag: '',
        flag_for_access: '',
        message: '',
      }
    },

    beforeCreate() {
    axios.get('/company/dashboard/check',{params: {flag: this.flag}}).then(response => {
            this.flag = response.data;
            if (this.flag) {
              console.log("Continue")
            } else {
              this.$router.push('/company/socialmedialinks');
              console.log("redirected")
            }
         });
    axios.get('/company/verify/access').then(response => {
            this.flag_for_access = response.data;
            if (this.flag_for_access) {
              this.message = 'Your account has been confirmed. You can post and view internships.';
            } else {
              this.message = 'To post and view internships, Please wait till we confirm your account.';
            }
      });
  },

  
    created(){
    this.$store.commit('SET_LAYOUT', 'company-layout');    
  },
}
</script>