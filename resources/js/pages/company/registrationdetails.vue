<template>
  

    <v-row>
			<v-col
        cols="12"
        md="7"
        >
        <v-card
          raised
          class="mx-auto"
          width="95%"
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
                  <p class="display-1 p-4 text--lighten-1">Registration Details</p>        
                </v-col>
              </v-row> 
          </v-card>
        
            <v-container class="py-0">
              <v-row class="text--muted m-0 p-0">                


                <v-col
                  cols="12"
                  md="12"
                >
                  <p class="subtitle-1 pt-3">Registered Address: {{company.registered_address}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="12"
                >
                  <p class="subtitle-1 pt-3">Registration Number: {{company.registration_no}} </p>
                </v-col>
                
                <v-col
                  cols="12"
                  md="12"
                >
                  <p class="subtitle-1 pt-3">Certificate of Incorporation: {{company.certificate_of_incorporation}} </p>
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
              </v-card>   
			</v-col>

      <v-col
        class="my-auto"
        cols="12"
        md="5"
        >

        <v-card
    class="mx-auto"
    max-width="300"
    tile
  >
    <v-list rounded>
      <!-- <v-subheader>REPORTS</v-subheader> -->
      <v-list-item-group v-model="item" color="primary">
        <v-list-item
          v-for="(item, i) in items"
          :key="i"
          :replace="true" 
          :to="item.path"
        >
          <v-list-item-icon>
            <v-icon v-text="item.icon"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title v-text="item.text"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-card>

        </v-col>

</v-row>

</template>

<script>
export default {
  data() {
    return {
      company: [],
      item: 1,
      items: [
        { text: 'Primary Details', icon: 'mdi-clock', path: `/company/${this.$route.params.id}/primarydetails` },
        { text: 'Registration Details', icon: 'mdi-account', path: `/company/${this.$route.params.id}/registrationdetails` },
        { text: 'Other details', icon: 'mdi-flag', path: `/company/${this.$route.params.id}/otherdetails` },
        { text: 'Social Media Links', icon: 'mdi-flag', path: `/company/${this.$route.params.id}/socialmedialinks` },
      ],
    }
  },

  mounted() {
      this.getCompany()
    },

    methods: {
      getCompany() {
        this.$http({
          url: `company/${this.$route.params.id}`,
          method: 'GET'
        })
          .then((res) => {
            this.company = res.data;
          }, () => {
            console.log("error")
          })
      },

      edit() {
      this.errors = {};
      axios.get(`/company/edit/${this.$route.params.id}`, this.company).then(response => {
        this.$router.push(`/company/edit/${this.$route.params.id}`);
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      
    },
      
    }

}
</script>