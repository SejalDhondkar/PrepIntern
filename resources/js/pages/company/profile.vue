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
      <v-toolbar-title>Company Profile</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
      

      <v-card-text>
      
        
            <v-container class="py-0">
              <v-row>
                
                <v-col
                  cols="12"
                  md="12"
                >
                <p class="subtitle-1 pt-3">Name: {{company.name}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Email: {{company.email}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Contact No: {{company.contact_no}}</p>
                </v-col>                

                <v-col
                  cols="12"
                  md="4"
                >
                  <p class="subtitle-1 pt-3">Country: {{company.country}}</p>
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <p class="subtitle-1 pt-3">State: {{company.state}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <p class="subtitle-1 pt-3">City: {{company.city}}</p>
                </v-col>


                <v-col
                  cols="12"
                  md="12"
                >
                  <p class="subtitle-1 pt-3">Registered Address: {{company.registered_address}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Registration Number: {{company.registration_no}} </p>
                </v-col>
                
                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Certificate of Incorporation: {{company.certificate_of_incorporation}} </p>
                </v-col>
                
                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Website: {{company.website}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3"> PinCode: {{company.pincode}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Year of Establishment: {{company.year_of_establishment}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Type of Company: {{company.type_of_company}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Description: {{company.description}} </p>
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <p class="subtitle-1 pt-3">Range of Employees: {{company.range_of_employees}} </p>
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
      company: [],
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