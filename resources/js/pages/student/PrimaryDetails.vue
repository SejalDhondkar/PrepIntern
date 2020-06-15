<template>
  <v-card
    outlined
    class="mx-auto"
    width="450"
  >
    
    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Primary Details</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="py-0">
              <v-row>

                  <v-col
                  cols="4"
                  class="text-left"
                >
                  <v-subheader>Date Of Birth</v-subheader>
                </v-col>

                <v-col
                  cols="8">
                    <v-menu
                      ref="menu"
                      v-model="menu"
                      :close-on-content-click="false"
                      :return-value.sync="student.date_of_birth"
                      transition="scale-transition"
                      offset-y
                      min-width="290px"
                    >
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="student.date_of_birth"
                          label="Date of birth"
                          readonly
                          v-on="on"
                        ></v-text-field>
                      </template>
                      <v-date-picker v-model="student.date_of_birth" color="green lighten-1" no-title scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
                        <v-btn text color="primary" @click="$refs.menu.save(student.date_of_birth)">OK</v-btn>
                      </v-date-picker>
                    </v-menu>
                </v-col>


                    <v-col cols="4"
                    class="text-center">
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

                    <v-col cols="4"
                            class="text-center">
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

                    <v-col cols="4"
                        class="text-center">
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
        student: {
          country_id:'',
          state_id: '',
          city_id: '',
          date_of_birth: '',
        },
        flag: '',
        menu: false,
      }
  },

  created(){
    this.$store.commit('SET_LAYOUT', 'student-layout');
  },

  
  methods: {

    submit() {
      this.errors = {};
      axios.post('/student/primarydetails', this.student).then(response => {
        this.$router.push('/student/internshippreferences');
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
      this.student.country_id = data.id;
      this.state = false;
    },
  

    autoCompleteState(){
        this.state_data_results = [];
        console.log(this.statesearchquery);
        if(this.statesearchquery.length > 1){
         axios.get('/company/address/statesearch',{params: {statesearchquery: this.statesearchquery, country_id: this.student.country_id}}).then(response => {
          this.state_data_results = response.data;
         });
        }
    },

    
    selectState(data){
      this.statesearchquery = data.name;
      this.state_data_results.length = false;
      this.student.state_id = data.id;
      this.city = false;
    },

    autoCompleteCity(){
        this.city_data_results = [];
        // console.log(this.citysearchquery);
        if(this.citysearchquery.length > 2){
         axios.get('/company/address/citysearch',{params: {citysearchquery: this.citysearchquery, state_id: this.student.state_id}}).then(response => {
          this.city_data_results = response.data;
         });
        }
    },

    
    selectCity(data){
      this.citysearchquery = data.name;
      this.city_data_results.length = false;
      this.student.city_id = data.id;
    }
  

  },
  

  
  }
</script>

