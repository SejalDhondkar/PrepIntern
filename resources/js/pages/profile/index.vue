<template>
  <v-card
    raised
    class="mx-auto"
    width="95%"
  >
    
    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title>Profile</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
      

      <v-card-text>
      
        
            <v-container class="py-0">
              <v-row>
                
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
                  <p class="subtitle-1 pt-3">Country: {{profile.country}}</p>
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <p class="subtitle-1 pt-3">State: {{profile.state}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <p class="subtitle-1 pt-3">City: {{profile.city}}</p>
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
                  cols="12"
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
        
      

      
    </v-card-text>
    
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      profile: [],
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
      
    }

}
</script>