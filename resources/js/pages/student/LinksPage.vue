<template>
  <v-card
    outlined
    class="mx-auto"
    width="85%"
  >

    <v-toolbar
      color="orange darken-1"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Work Samples</v-toolbar-title>

    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="p-4">

							<v-row>

              <v-col cols="4">
                        <v-subheader>Blog Link:</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.blog_url"
                          label=""
                          class="purple-input mr-4"
                        />
                    </v-col>

                    <v-col cols="4">
                        <v-subheader>GitHub Profile:</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.github_url"
                          label=""
                          class="purple-input mr-4"
                        />
                    </v-col>

                    <v-col cols="4">
                        <v-subheader>LinkedIn Profile:</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.linkedin_url"
                          label=""
                          class="purple-input mr-4"
                        />
                    </v-col>

                    <v-col cols="4">
                        <v-subheader>Play Store Developer A/c (Public Link):</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.playstore_developer_url"
                          label=""
                          class="purple-input mr-4"
                        />
                    </v-col>

                    <v-col cols="4">
                        <v-subheader>Other Profile:</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.other_url"
                          label=""
                          class="purple-input mr-4"
                        />
                    </v-col>

              <v-col
                  cols="6"
                  class="text-left"
                >
                  <v-btn
                    color="primary"
                    class="mr-0"
                    @click="previous"
                  >
                    Previous
                  </v-btn>
                </v-col>

							<v-col
                  cols="6"
                  class="text-right"
                >
                  <v-btn
                    color="success"
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
        student: {
            blog_url: '',
            github_url: '',
            linkedin_url: '',
            playstore_developer_url: '',
            other_url: '',
        },
      }
  },
  created(){
    this.$store.commit('SET_LAYOUT', 'student-layout');
    this.axios.get('/student/links/edit').then((response) => {
            this.student = response.data;
        });
  },


  methods: {

    submit() {
      this.errors = {};
      axios.post('/student/links', this.student).then(response => {
        this.$router.go(-1);
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
     },

     previous(){
            this.$router.go(-1);
				},

  }


  }
</script>
