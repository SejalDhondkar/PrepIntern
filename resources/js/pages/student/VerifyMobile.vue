<template>
  <v-container
        class="fill-height my-auto"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card
              class="mx-auto elevation-6"
              min-width="400"

              >
              <v-toolbar
                color="blue darken-1"
                dark
                flat
              >
                <v-toolbar-title>Verify Mobile Number</v-toolbar-title>
                <v-spacer />
              </v-toolbar>
              <v-card-text>
              <v-row class="m-2 mb-4" justify="center">
                <v-icon medium color="blue darken-2">mdi-message-text</v-icon>
                <p>OTP has been sent to your registered mobile number</p>

              </v-row>
                <v-form>
                  <v-text-field
                    label="Enter OTP"
                    v-model="phone_number.otp"
                    prepend-icon="mdi-account-circle-outline"
                    type="number"
                  />
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer />
                <v-btn
                  color="success"
                  class="mr-4"
                  @click="verifyOtp"
                  :loading="loading"
                >Verify OTP</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
          <v-snackbar
              v-model="snackbar"
              :timeout="timeout"
            >
              {{ text }}
                <v-btn
                  color="primary"
                  text
                  @click="snackbar = false"
                >
                  Close
                </v-btn>
            </v-snackbar>
      </v-container>
</template>

<script>
export default {
  data() {
    return {
      phone_number: {
        otp: '',
      },
      user:{
        contact_no:'',
      },
      snackbar: true,
      text: 'Please verify your mobile number',
      timeout: 2000,
      loading: false,
    };
  },
  created() {
      this.$store.commit('SET_LAYOUT', 'loginsignup-layout');
      let url = process.env.MIX_APP_URL + '/api/user';
      this.axios.get(url).then((response) => {
          this.user = response.data;
          console.log(response.data);
      });
    },

    methods: {
      verifyOtp() {
        this.loading = true;
        let mobile = this.user.contact_no;
        let otp = this.phone_number.otp;
        let authkey= '308476ARq4VkPBV55df64864';
        const options = { headers: {'content-type': 'application/x-www-form-urlencoded'}};
        this.errors = {};
        axios.post(`https://infinite-depths-06908.herokuapp.com/https://api.msg91.com/api/v5/otp/verify?mobile=${mobile}&otp=${otp}&authkey=${authkey}`,options).then(response => {
          this.response = response;
          let url = process.env.MIX_APP_URL + '/api/mobileOtpVerified';
          if(response.data.type == 'success'){
            axios.get(url).then(response =>{
              this.$router.push('/student/primarydetails');
            })
          }
          else{
            console.log('error');
          }
          console.log(response);
        }).catch(error => {
          if (error.response.status === 422 && response.data.message == 'Mobile no. already verified') {
            this.$router.push('/student/primarydetails');
          }
          else
          {
            console.log('error')
          }
        });
      },
    },

    }
</script>
