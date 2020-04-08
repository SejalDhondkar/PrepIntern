<template>
  <v-card
    raised
    class="mx-auto"
    width="95%"
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
                  <v-text-field
                    v-model="profile.country"
                    label="Country"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="profile.state"
                    label="State"
                    class="purple-input"
                  />
                </v-col><v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="profile.city"
                    label="City"
                    class="purple-input"
                  />
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
                  cols="12"
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
          country: '',
          state: '',
          city: '',
          secondary_email: '',
          secondary_contact_no: '',
        }
      }
  },

  created() {
        let uri = `http://127.0.0.1:8000/api/profile/edit`;
        this.axios.get(uri).then((response) => {
            this.profile = response.data;
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
  },
  

  
  }
</script>
