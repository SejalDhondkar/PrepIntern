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
                  cols="6"
                  class="text-left"
                >
                  <v-btn
                    color="primary"
                    class="mr-0"
                    @click="back"
                  >
                    Back
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

	created() {
        this.$store.commit('SET_LAYOUT', 'company-layout');
        this.axios.get('/company/socialmedialinks/edit').then((response) => {
            this.company = response.data;
        });
      },

    methods: {

    submit() {
      this.errors = {};
      axios.put('/company/socialmedialinks/update',{company_links: this.company}).then(response => {
    	this.$router.push('/company/editpage');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });

		},

		back(){
			this.$router.push('/company/editpage');
		}

    }

}
</script>
