<template>
  <v-card
    raised
    class="mx-auto"
    width="60%"
  >  

  <v-card
      class="mx-auto grey lighten-3 p-0"
      width="98%"
      >
        <v-row justify="center">
          <v-col
            align="center"
            cols="12"
            md="2"
            >
              <v-avatar color="white" size="80" left>
                <v-icon x-large>mdi-account-circle</v-icon>
              </v-avatar>
          </v-col>

          <v-col
            cols="12"
            md="10"
            >
            <p class="display-1 p-4 text--lighten-1">{{profile.name}}</p>        
          </v-col>
        </v-row> 
    </v-card>    
        
            <v-container class="py-0">
              <v-row class="text--muted m-0 p-0">
                
                <v-col
                  cols="12"
                  md="12"
                >
                <p class="subtitle-1 pt-3">Name: {{profile.name}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Email: {{profile.email}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Contact No: {{profile.contact_no}}</p>
                </v-col>                

                <v-col
                  cols="12"
                  md="4"
                >
                  <p class="subtitle-1 pt-3">Country: {{profile.country_name}}</p>
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <p class="subtitle-1 pt-3">State: {{profile.state_name}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <p class="subtitle-1 pt-3">City: {{profile.city_name}}</p>
                </v-col>

                
                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Secondary Email: {{profile.secondary_email}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3"> Secondary Contact No: {{profile.secondary_contact_no}} </p>
                </v-col> 
                
                <v-col
                  cols="6"
                  class="text-left"
                >
                  <v-btn
                    color="primary"
                    class="mr-0"
                    @click="back"
                  >
                    Back
                  </v-btn>
                </v-col>

                <v-col
                  cols="6"
                  class="text-right"
                >
                  <v-btn
                    color="success"
                    class="mr-0"
                    @click="edit"
                  >
                    Edit Profile
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>    
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      profile: [],
    }
  },

  created(){
    if(this.$auth.user().role_id === 4){
      this.$store.commit('SET_LAYOUT', 'company-layout');
    }
    if(this.$auth.user().role_id === 5){
      this.$store.commit('SET_LAYOUT', 'student-layout');
    }
  },

  mounted() {
      this.getProfile()
    },

    methods: {
      getProfile() {
        this.$http({
          url: `profile`,
          method: 'GET'
        })
          .then((res) => {
            this.profile = res.data;
          }, () => {
            console.log("error")
          })
      },

      edit() {
      this.errors = {};
      axios.get(`/profile/edit`, this.profile).then(response => {
        this.$router.push('/profile/edit');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      },

      back(){
        if(this.$auth.user().role_id === 4){
          this.$router.push('/company/dashboard');
        }
        if(this.$auth.user().role_id === 5){
          this.$router.push('/student/dashboard');
        }
      }
      
    
      
    }

}
</script>