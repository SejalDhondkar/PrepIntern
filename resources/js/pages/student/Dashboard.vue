<template>
  <v-card outlined
          class="mx-auto"
          width="85%"
          min-height="500"
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
          <v-col cols="12">
          <v-card
            color="purple lighten-1"
            dark
          >
            <v-card-title class="headline">Tell us about you</v-card-title>

            <v-card-subtitle>Start building your resume and get best internships.</v-card-subtitle>

            <v-card-actions>
              <v-btn text class="text-decoration-none" to="/student/educationdetails">Add Details</v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12">
          <v-card
            color="pink accent-2"
            dark
          >
            <v-card-title class="headline">Edit your Resume anytime</v-card-title>

            <v-card-subtitle>Have some updates? Edit your details here</v-card-subtitle>

            <v-card-actions>
              <v-btn text class="text-decoration-none" to="/student/resume/edit">Edit Resume</v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
            
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
    axios.get('/student/addskills/check',{params: {flag: this.flag}}).then(response => {
            this.flag = response.data;
            if (this.flag) {
              console.log("Continue")
            } else {
              this.$router.push('/student/addskills');
              console.log("redirected")
            }
         });
  },

    created(){
    this.$store.commit('SET_LAYOUT', 'student-layout');
  },
}
</script>
