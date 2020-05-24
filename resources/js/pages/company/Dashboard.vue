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
            <v-card-subtitle>Welcome. Please wait till we confirm your account.</v-card-subtitle>
            <v-btn class="ma-2" outlined color="indigo" @click="post()">Post Internship</v-btn>
            <v-btn class="ma-2" outlined color="indigo" @click="view()">View Internship Posts</v-btn>
        </v-container>
        
        
  </v-card>

      
</template>

<script>
export default {
    data(){
      return {
        flag: '',
      }
    },

    beforeCreate() {
    axios.get('/company/dashboard/check',{params: {flag: this.flag}}).then(response => {
            console.log(response);
            this.flag = response.data;
            console.log(this.flag);
            if (this.flag) {
              console.log("Continue")
            } else {
              this.$router.push('/company/socialmedialinks');
              console.log("redirected")
            }
         });
  },

  methods: {
    post(){
            this.$router.push('/company/postinternship');
        },

    view(){
        this.$router.push('/company/view/internships');
    },
  }
}
</script>