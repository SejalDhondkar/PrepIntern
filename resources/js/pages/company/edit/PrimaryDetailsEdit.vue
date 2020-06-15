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
      <v-toolbar-title>Company Primary Details</v-toolbar-title>
      
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
                    v-model="company.name"
                    class="purple-input"
                    label="Name"
                  />
                </v-col>

                

                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.contact_email"
                    label="Email Address"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.contact_no"
                    label="Contact Number"
                    class="purple-input"
                  />
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
          name:'',
          contact_email: '',
          contact_no: '',
				}
      }
  },

	created() {
        this.$store.commit('SET_LAYOUT', 'company-layout');
        this.axios.get('/company/primarydetails/edit').then((response) => {
            this.company = response.data;
        });
      },
  
  
  methods: {
    submit() {
      this.errors = {};
      axios.put('/company/primarydetails/update', this.company).then(response => {
        console.log('Message sent!');
        this.$router.push('/company/editpage');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      
    },

    back(){
      this.$router.push('/company/editpage');
    }
  },
  

  
  }
</script>
