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
      <v-toolbar-title>Company Social Media Links</v-toolbar-title>

    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="py-0">
						<v-row>
              <v-row  class="px-4" v-for="(link, i) in company"
                :key="i">


								<v-col cols="5">
									<v-subheader>{{link.title}}</v-subheader>
								</v-col>

                <v-col
                  cols="7"
                >
                  <v-text-field
                    v-model="link.url"
                    class="purple-input"
                    label=""
                  />
                </v-col>
              </v-row>



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

			company: [
        {social_media_link_id: 1, title: 'Facebook', url: ''},
        {social_media_link_id: 2, title: 'Twitter', url: ''},
        {social_media_link_id: 3, title: 'LinkedIn', url: ''},
        {social_media_link_id: 4, title: 'Youtube', url: ''},
        {social_media_link_id: 5, title: 'Website', url: ''},
      ],
      link: 1,
      flag: ''
    }
  },

  beforeCreate() {
    axios.get('/company/socialmedialinks/check',{params: {flag: this.flag}}).then(response => {
            this.flag = response.data;
            if (this.flag) {
              console.log("Continue")
            } else {
              this.$router.push('/company/additionaldetails');
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
      axios.post('/company/socialmedialinks',{company_links: this.company}).then(response => {
      this.$router.push('/company/dashboard');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });

    },

    }

}
</script>
