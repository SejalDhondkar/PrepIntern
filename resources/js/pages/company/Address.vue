<template>
  <v-card
    raised
    class="mx-auto"
    width="70%"
  >
    
    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title>Company Address Details</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="py-0">
              <v-row>
                <v-row align="center" class="py-2">

                    <v-col cols="6">
                        <v-subheader>Country</v-subheader>
                    </v-col>

                    <v-col cols="6">
                        <v-autocomplete
                        label="Country"
                        :filterable="false"
                        :options="options"
                        @search="onSearch"
                        v-model="company.country_id"
                        >
                          <template slot="no-options">
                            Type to search countries...
                          </template>
                          <template slot="option" slot-scope="option">
                            <div class="d-center">
                              {{option.full_name}}
                            </div>
                          </template>
                          <template slot="selected-option" slot-scope="option">
                            <div class="selected d-center">
                              {{option.full_name}}
                            </div>
                          </template>
                        </v-autocomplete>
                    </v-col>

                    </v-row>


                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.registered_address"
                    label="Registered Address"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="12"
                >
                  <v-text-field
                    v-model="company.pincode"
                    label="Pincode"
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
        options: [],
        company: {
          id: '',
          company_id: '',
          country_id:'',
          state_id: '',
          city_id: '',
          registered_address: '',
          pincode: '',
        }
      }
  },

  
  methods: {

    submit() {
      this.errors = {};
      axios.post('/company/address', this.company).then(response => {
        console.log('Message sent!');
        this.$router.push('/company/additionaldetails');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      
    },

    onSearch(search, loading) {
      loading(true);
      this.search(loading, search, this);
    },
    search: _.debounce((loading, search, vm) => {
      fetch(
        `https://api.github.com/search/repositories?q=${escape(search)}`
      ).then(res => {
        res.json().then(json => (vm.options = json.items));
        loading(false);
      });
    }, 350)
  

  },
  

  
  }
</script>

<style scoped>

</style>