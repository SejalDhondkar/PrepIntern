<template>
  <v-card
    raised
    class="mx-auto"
    width="700"
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
                    v-model="company.name"
                    class="purple-input"
                    label="Name"
                  />
                </v-col>



                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="company.email"
                    label="Email Address"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="company.contact_no"
                    label="Contact Number"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="company.country"
                    label="Country"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="company.state"
                    label="State"
                    class="purple-input"
                  />
                </v-col><v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="company.city"
                    label="City"
                    class="purple-input"
                  />
                </v-col>

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
                  md="6"
                >
                  <v-text-field
                    v-model="company.registration_no"
                    label="Registration Number"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="company.certificate_of_incorporation"
                    label="Certificate of Incorporation"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="company.website"
                    label="Website"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="company.pincode"
                    label="Pincode"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="company.year_of_establishment"
                    label="Year of Establishment"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="company.type_of_company"
                    label="Type of Company"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    v-model="company.description"
                    label="Description"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
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
                    Update Profile
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
          email: '',
          contact_no: '',
          country: '',
          state: '',
          city: '',
          registered_address: '',
          registration_no: '',
          certificate_of_incorporation: '',
          website: '',
          pincode: '',
          year_of_establishment: '',
          type_of_company: '',
          description: '',
          range_of_employees: '',
        }
      }
  },

  created() {
        let url = process.env.MIX_APP_URL + `/api/company/edit/${this.$route.params.id}`;
        this.axios.get(url).then((response) => {
            this.company = response.data;
        });
      },


  methods: {
    submit() {
      this.errors = {};
      axios.put(`/company/update/${this.$route.params.id}`, this.company).then(response => {
        console.log('Profile Updated!');
        this.$router.push(`/company/${this.$route.params.id}`);
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });

    },
  },



  }
</script>
