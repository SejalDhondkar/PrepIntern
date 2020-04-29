<template>
  <v-card
    raised
    class="mx-auto"
    width="60%"
  >
    
    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title>Company Additional Details</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="py-0">
              <v-row>
                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.registration_no"
                    class="purple-input"
                    label="Registration Number"
                  />
                </v-col>

                

                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.certificate_of_incorporation"
                    label="Email Address"
                    class="Certificate Of Incorporation"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.website"
                    label="Website"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.year_of_establishment"
                    label="Year Of Establishment"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.type_of_company"
                    label="Type Of Company"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.description"
                    label="Description"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.range_of_employees"
                    label="Range of Employees"
                    class="purple-input"
                  />
                </v-col>


                              
                <v-col
                  cols="12"
                  class="text-right"
                >
                  <v-btn
                    color="success"
                    class="mr-0"
                    @click="submit"
                  >
                    Save
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        
  </v-card>

      
</template>

<script>
  export default {
    data() {
      return {
        company: {
          id: '',
          registration_no:'',
          certificate_of_incorporation: '',
          website: '',
          year_of_establishment: '',
          type_of_company: '',
          description: '',
          range_of_employees: '',
        },
        flag: ''
      }
  },

  beforeCreate() {
    axios.get('/company/additionaldetails/check',{params: {flag: this.flag}}).then(response => {
            console.log(response);
            this.flag = response.data;
            console.log(this.flag);
            if (this.flag) {
              console.log("Continue")
            } else {
              this.$router.push('/company/address');
              console.log("redirected")
            }
         });
  },

  
  
  methods: {
    submit() {
      this.errors = {};
      axios.post('/company/additionaldetails', this.company).then(response => {
        console.log('Message sent!');
        this.$router.push('/company/socialmedialinks');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      
    },
  },
  

  
  }
</script>
