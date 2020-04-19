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
                <!-- <v-row align="center"> -->

                  <!-- DropDowns for country state and city fields -->

                    <!-- <v-col cols="6">
                        <v-subheader>Country</v-subheader>
                    </v-col>

                    <v-col cols="6">
                        <v-select
                        v-model="country_id"
                        :hint="`${country.state}, ${select.abbr}`"
                        :items="items"
                        item-text="state"
                        item-value="abbr"
                        label="Select"
                        persistent-hint
                        return-object
                        single-line
                        ></v-select>
                    </v-col>

                    <v-col cols="6">
                        <v-subheader>State</v-subheader>
                    </v-col>

                    <v-col cols="6">
                        <v-select
                        v-model="select"
                        :hint="`${select.state}, ${select.abbr}`"
                        :items="items"
                        item-text="state"
                        item-value="abbr"
                        label="Select"
                        persistent-hint
                        return-object
                        single-line
                        ></v-select>
                    </v-col>

                    <v-col cols="6">
                        <v-subheader>City</v-subheader>
                    </v-col>

                    <v-col cols="6">
                        <v-select
                        v-model="select"
                        :hint="`${select.state}, ${select.abbr}`"
                        :items="items"
                        item-text="state"
                        item-value="abbr"
                        label="Select"
                        persistent-hint
                        return-object
                        single-line
                        ></v-select>
                    </v-col>

                    </v-row> -->


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
  },
  

  
  }
</script>
