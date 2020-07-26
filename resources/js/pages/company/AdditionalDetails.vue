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
                    label="Certificate of Incorporation"
                    class="purple-input"
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
                  <v-menu offset-y>
                    <template v-slot:activator="{ on }">
                      <v-text-field
                        v-model="company.range_of_employees"
                        label="Range of Employees"
                        class="purple-input mr-4"
                        v-on="on"
                      />
                    </template>
                          <v-list style="max-height: 250px"
                                class="overflow-y-auto">
                            <v-list-item-group v-model="data" color="primary">
                              <v-list-item
                                v-for="(range,i) in this.range_list"
                                :key="i"
                                @click="company.range_of_employees=range"
                              >
                                <v-list-item-content>
                                  <v-list-item-title v-text="range"></v-list-item-title>
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

                <v-snackbar
            v-model="snackbar"
            :timeout="timeout"
          >
            {{ text }}

            <template v-slot:action="{ attrs }">
              <v-btn
                color="blue"
                text
                v-bind="attrs"
                @click="snackbar = false"
              >
                Close
              </v-btn>
            </template>
          </v-snackbar>

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
        flag: '',
        data: '',
        range_list: ['Self-Employed','1-10','11-50','51-100','101-200','201-500','501-1000','1001-5000','5001-10,000','10,001+'],
        snackbar: false,
        text: 'These details are required to be filled.',
        timeout: 10000,
      }
  },

  beforeCreate() {
    axios.get('/company/additionaldetails/check',{params: {flag: this.flag}}).then(response => {
            this.flag = response.data;
            if (this.flag) {
              console.log("Continue")
            } else {
              this.$router.push('/company/address');
              console.log("redirected")
            }
         });
  },

  created(){
    this.$store.commit('SET_LAYOUT', 'company-layout');
    this.snackbar = true;
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
