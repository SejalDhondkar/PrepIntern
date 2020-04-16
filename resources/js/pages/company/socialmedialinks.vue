<template> 
    <v-row>
			<v-col
        cols="12"
        md="7"
        >
        <v-card
          raised
          class="mx-auto"
          width="95%"
        > 
          <v-card
            class="mx-auto grey lighten-3 p-0"
            width="98%"
            >
              <v-row justify="center">
                <v-col
                  align="center"
                  cols="12"
                  md="2"
                  >
                    <v-avatar color="white" size="80" left>
                      <v-icon x-large>mdi-account-circle</v-icon>
                    </v-avatar>
                </v-col>

                <v-col
                  cols="12"
                  md="10"
                  >
                  <p class="display-1 p-4 text--lighten-1">Social Media Links</p>        
                </v-col>
              </v-row> 
          </v-card>
        
            <v-container class="py-0">
              <v-row class="text--muted m-0 p-0">

                
                
                <v-col
                  v-for="(link, i) in links"
                  :key="i"
                  cols="12"
                  md="12"
                >
                <p class="subtitle-1 pt-3" v-if="link.social_media_link_id==1">Facebook  : {{link.url}} </p>
                <p class="subtitle-1 pt-3" v-if="link.social_media_link_id==2">Twitter  : {{link.url}} </p>
                <p class="subtitle-1 pt-3" v-if="link.social_media_link_id==3">LinkedIn  : {{link.url}} </p>
                <p class="subtitle-1 pt-3" v-if="link.social_media_link_id==4">Youtube  : {{link.url}} </p>
                <p class="subtitle-1 pt-3" v-if="link.social_media_link_id==5">Website  : {{link.url}} </p>
                </v-col>
               
                
                <v-col
                  cols="12"
                  class="text-right"
                >
                  <v-row justify="center">
                    <v-dialog v-model="dialog" persistent max-width="600px">
                      <template v-slot:activator="{ on }">
                        <v-btn color="primary" dark v-on="on" @click="edit">Edit</v-btn>
                      </template>
                      <v-card>
                        <v-card-title>
                          <span class="headline">Social Media Links</span>
                        </v-card-title>
                        <v-card-text>
                          <v-container>
                            <v-row>
                              <v-col
                                v-for="(link, i) in links"
                                :key="i"
                                cols="12"
                                md="12"
                              >
                                <v-text-field
                                  v-if="link.social_media_link_id==1"
                                  v-model="link.url"
                                  class="purple-input"
                                  label="Facebook"                                  
                                />
                                <v-text-field
                                  v-if="link.social_media_link_id==2"
                                  v-model="link.url"
                                  class="purple-input"
                                  label="Twitter"                                  
                                />
                                <v-text-field
                                  v-if="link.social_media_link_id==3"
                                  v-model="link.url"
                                  class="purple-input"
                                  label="LinkedIn"                                  
                                />
                                <v-text-field
                                  v-if="link.social_media_link_id==4"
                                  v-model="link.url"
                                  class="purple-input"
                                  label="Youtube"                                  
                                />
                                <v-text-field
                                  v-if="link.social_media_link_id==5"
                                  v-model="link.url"
                                  class="purple-input"
                                  label="Website"                                  
                                />
                              </v-col>
                            </v-row>
                          </v-container>
                        </v-card-text>
                        <v-card-actions>
                          <v-spacer></v-spacer>
                          <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
                          <v-btn color="blue darken-1" text @click="submit">Save</v-btn>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                  </v-row>
                </v-col>

                
              </v-row>
            </v-container> 
              </v-card>   
			</v-col>

      <v-col
        class="my-auto"
        cols="12"
        md="5"
        >

        <v-card
    class="mx-auto"
    max-width="300"
    tile
  >
    <v-list rounded>
      <v-list-item-group v-model="item" color="primary">
        <v-list-item
          v-for="(item, i) in items"
          :key="i"
					:replace="true" 
          :to="item.path"
        >
          <v-list-item-icon>
            <v-icon v-text="item.icon"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title v-text="item.text"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-card>

        </v-col>

</v-row>

</template>

<script>
export default {
  data() {
    return {
      links: [],
      link: 1,
      item: 1,
      items: [
        { text: 'Primary Details', icon: 'mdi-clock', path: `/company/${this.$route.params.id}/primarydetails` },
        { text: 'Registration Details', icon: 'mdi-account', path: `/company/${this.$route.params.id}/registrationdetails` },
        { text: 'Other details', icon: 'mdi-flag', path: `/company/${this.$route.params.id}/otherdetails` },
        { text: 'Social Media Links', icon: 'mdi-flag', path: `/company/${this.$route.params.id}/socialmedialinks` },
      ],
      dialog: false,
    }
  },

  mounted() {
      this.getCompany()
    },

    methods: {
      getCompany() {
        this.$http({
          url: `company/${this.$route.params.id}/socialmedialinks`,
          method: 'GET'
        })
          .then((res) => {
            console.log(res.data);
            this.links = res.data;
          }, () => {
            console.log("error")
          })
      },

      edit() {
      this.errors = {};
      axios.get(`/company/edit/${this.$route.params.id}/socialmedialinks`, this.links).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      
    },

    submit() {
      this.errors = {};
      this.dialog = false;
      axios.put(`/company/update/${this.$route.params.id}/socialmedialinks`, this.links).then(response => {
        console.log('Profile Updated!');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      
    },
      
    }

}
</script>