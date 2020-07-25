<template>
  <v-card
    raised
    class="mx-auto"
    width="85%"
  >

    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title>Edit Profile</v-toolbar-title>

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
                    v-model="profile.name"
                    class="purple-input"
                    label="Name"
                  />
                </v-col>



                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="profile.email"
                    label="Email Address"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="profile.contact_no"
                    label="Contact Number"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="searchquery"
                          label="Country"
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

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="statesearchquery"
                          label="State"
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
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="citysearchquery"
                          label="City"
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
                  md="6"
                >
                  <v-text-field
                    v-model="profile.secondary_email"
                    label="Secondary Email Address"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="profile.secondary_contact_no"
                    label="Secondary Contact Number"
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
                    @click="cancel"
                  >
                    Cancel
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
                    Update
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
        profile: {
          name:'',
          email: '',
          contact: '',
          country_id: '',
          state_id: '',
          city_id: '',
          secondary_email: '',
          secondary_contact_no: '',
        },
        searchquery: '',
        statesearchquery: '',
        citysearchquery: '',
        data: 1,
        data_results: [],
        state_data_results: [],
        city_data_results: [],
      }
  },

  created() {
    if(this.$auth.user().role_id === 1){
      this.$store.commit('SET_LAYOUT', 'admin-layout');
    }
    if(this.$auth.user().role_id === 4){
      this.$store.commit('SET_LAYOUT', 'company-layout');
    }
    if(this.$auth.user().role_id === 5){
      this.$store.commit('SET_LAYOUT', 'student-layout');
    }
    let url = process.env.MIX_APP_URL + '/api/profile/edit';
    this.axios.get(url).then((response) => {
        this.profile = response.data;
        this.searchquery = response.data.country_name;
        this.statesearchquery = response.data.state_name;
        this.citysearchquery = response.data.city_name;
    });
  },


  methods: {
    submit() {
      this.errors = {};
      axios.put(`/profile/update`, this.profile).then(response => {
        console.log('Profile Updated!');
        this.$router.push('/profile');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });

    },

    cancel(){
      this.$router.push('/profile');
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
      this.profile.country_id = data.id;
    },


    autoCompleteState(){
        this.state_data_results = [];
        // console.log(this.statesearchquery);
        if(this.statesearchquery.length > 1){
         axios.get('/company/address/statesearch',{params: {statesearchquery: this.statesearchquery, country_id: this.company.country_id}}).then(response => {
          this.state_data_results = response.data;
         });
        }
    },


    selectState(data){
      this.statesearchquery = data.name;
      this.state_data_results.length = false;
      this.profile.state_id = data.id;
    },

    autoCompleteCity(){
        this.city_data_results = [];
        // console.log(this.citysearchquery);
        if(this.citysearchquery.length > 2){
         axios.get('/company/address/citysearch',{params: {citysearchquery: this.citysearchquery, state_id: this.company.state_id}}).then(response => {
          this.city_data_results = response.data;
         });
        }
    },


    selectCity(data){
      this.citysearchquery = data.name;
      this.city_data_results.length = false;
      this.profile.city_id = data.id;
    }

  },



  }
</script>
