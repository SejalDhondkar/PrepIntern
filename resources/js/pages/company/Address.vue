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

                    <v-col cols="4">
                        <v-subheader>Country</v-subheader>
                    </v-col>

                    <v-col cols="8">
                      <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="searchquery"
                          label="Type to search country"
                          class="purple-input mr-4"
                          v-on:keyup="autoComplete"
                          v-on="on"
                        />
                        </template>
                            <v-list v-if="data_results.length">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in data_results"
                                  :key="i"
                                  @click="selectCountry(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.name"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
                      </v-menu>

                    </v-col>

                    <v-col cols="4">
                        <v-subheader>State</v-subheader>
                    </v-col>

                    <v-col cols="8">
                      <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          :disabled="state"
                          v-model="statesearchquery"
                          label="Type to search state"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteState"                          
                          v-on="on"
                        />
                      </template>
                        
                            <v-list v-if="state_data_results.length">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in state_data_results"
                                  :key="i"
                                  @click="selectState(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.name"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
                      </v-menu>

                    </v-col>

                    <v-col cols="4">
                        <v-subheader>City</v-subheader>
                    </v-col>

                    <v-col cols="8">
                      <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          :disabled="city"
                          v-model="citysearchquery"
                          label="Type to search city"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteCity"
                          v-on="on"
                        />
                      </template>
                            <v-list v-if="city_data_results.length">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in city_data_results"
                                  :key="i"
                                  @click="selectCity(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.name"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
                      </v-menu>

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
        state: true,
        city: true,
        searchquery: '',
        statesearchquery: '',
        citysearchquery: '',
        data: 1,
        data_results: [],
        state_data_results: [],
        city_data_results: [],
        company: {
          id: '',
          company_id: '',
          country_id:'',
          state_id: '',
          city_id: '',
          registered_address: '',
          pincode: '',
        },
        flag: ''
      }
  },

  beforeCreate() {
    axios.get('/company/address/check',{params: {flag: this.flag}}).then(response => {
            this.flag = response.data;
            if (this.flag) {
              console.log("Continue")
            } else {
              this.$router.push('/company/primarydetails');
              console.log("redirected")
            }
         });
  },

  created(){
    this.$store.commit('SET_LAYOUT', 'company-layout');
  },
  
  methods: {

    submit() {
      this.errors = {};
      axios.post('/company/address', this.company).then(response => {
        this.$router.push('/company/additionaldetails');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      
    },

    
  
    autoComplete(){
        this.data_results = [];
        // console.log(this.searchquery);
        if(this.searchquery.length > 2){
         axios.get('/company/address/countrysearch',{params: {searchquery: this.searchquery}}).then(response => {
          this.data_results = response.data;
         });
        }
    },

    selectCountry(data){
      this.searchquery = data.name;
      this.data_results.length = false;
      this.company.country_id = data.id;
      this.state = false;
    },
  

    autoCompleteState(){
        this.state_data_results = [];
        if(this.statesearchquery.length > 1){
         axios.get('/company/address/statesearch',{params: {statesearchquery: this.statesearchquery, country_id: this.company.country_id}}).then(response => {
          this.state_data_results = response.data;
         });
        }
    },

    
    selectState(data){
      this.statesearchquery = data.name;
      this.state_data_results.length = false;
      this.company.state_id = data.id;
      this.city = false;
    },

    autoCompleteCity(){
        this.city_data_results = [];
        if(this.citysearchquery.length > 2){
         axios.get('/company/address/citysearch',{params: {citysearchquery: this.citysearchquery, state_id: this.company.state_id}}).then(response => {
          this.city_data_results = response.data;
         });
        }
    },

    
    selectCity(data){
      this.citysearchquery = data.name;
      this.city_data_results.length = false;
      this.company.city_id = data.id;
    }
  

  },
  

  
  }
</script>

