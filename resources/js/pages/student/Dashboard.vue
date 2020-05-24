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
            <v-card-subtitle>Welcome To PrepIntern.</v-card-subtitle>
            <v-btn class="ma-2" outlined color="indigo" @click="details()">Add Details</v-btn>
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
    axios.get('/student/dashboard/check',{params: {flag: this.flag}}).then(response => {
            this.flag = response.data;
            if (this.flag) {
              console.log("Continue")
            } else {
              this.$router.push('/student/internshippreferences');
              console.log("redirected")
            }
         });
  },

  methods: {
    details(){
            this.$router.push('/student/educationdetails');
        },
  }
}
</script>