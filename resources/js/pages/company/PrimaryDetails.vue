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
          name:'',
          contact_email: '',
          contact_no: '',
        },
        snackbar: false,
        text: 'These details are required to be filled.',
        timeout: 10000,
      }
  },

  created(){
    this.$store.commit('SET_LAYOUT', 'company-layout');
    this.snackbar = true;
  },

  methods: {
    submit() {
      this.errors = {};
      axios.post('/company/primarydetails', this.company).then(response => {
        console.log('Message sent!');
        this.$router.push('/company/address');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });

    },
  },



  }
</script>
