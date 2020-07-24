<template>
  <v-card
    outlined
    class="mx-auto"
    width="85%"
  >

    <v-toolbar
      color="yellow darken-1"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Position of Responsibility</v-toolbar-title>

    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="p-4">

							<v-row>

                  <v-col cols="12">
                        <v-subheader>Example:<br>		Project leader in Swechha foundation’s Cleanliness Project in 2015 for Delhi region.</v-subheader>
                    </v-col>
										<v-col cols="12">
                      <v-textarea
												name="input-7-1"
												label="Description"
												v-model="student.description"
											></v-textarea>
                    </v-col>

							<v-col
                  cols="6"
                  class="text-left"
                >
                  <v-btn
                    color="primary"
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
						description: '',
        },
      }
  },

  created(){
		this.$store.commit('SET_LAYOUT', 'student-layout');
		this.axios.get(`/student/positionofresponsibility/${this.$route.params.id}/edit`).then((response) => {
			this.student = response.data;
        });
  },

  methods: {

    submit() {
      this.errors = {};
      axios.post(`/student/positionofresponsibility/${this.$route.params.id}/update`, this.student).then(response => {
        this.$router.go(-1);
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
		},

		back(){
      this.$router.go(-1);
    },
}

  }
</script>
