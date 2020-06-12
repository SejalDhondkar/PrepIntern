<template>
  <v-card
    outlined
    class="mx-auto"
    width="600"
  >
    
    <v-toolbar
      color="yellow darken-1"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Assessment Questions</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="p-4">

							<p class="body-2">Why should you be hired for this role?</p>
							<v-textarea
								name="input-7-1"
								label=""
								v-model="answer.default_question1_ans"
								outlined
							></v-textarea>
							<p class="body-2">Are you available for {{post.internship_duration}}, for a {{post.type_of_internship}} internship? If not, what is the time period you are available for and the earliest date you can start this internship on?</p>
							<v-textarea
								name="input-7-1"
								label=""
								v-model="answer.default_question2_ans"
								outlined
							></v-textarea>

							<div v-if="post.question_1">
								<p class="body-2">{{post.question_1}}</p>
									<v-textarea
										name="input-7-1"
										label=""
										v-model="answer.company_question1_ans"
										outlined
									></v-textarea>
							</div>

							<div v-if="post.question_2">
								<p class="body-2">{{post.question_2}}</p>
									<v-textarea
										name="input-7-1"
										label=""
										v-model="answer.company_question2_ans"
										outlined
									></v-textarea>
							</div>

							<v-row>                  
							<v-col
                  cols="12"
                  class="text-center"
                >
                  <v-btn
                    color="success"
                    @click="submit"
                  >
                    Submit
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
				post: [],
				answer: {
					default_question1_ans: '',
					default_question2_ans: '',
					company_question1_ans: '',
					company_question2_ans: '',
					student_id: '',
					company_id: '',
					post_id: '',

				}
      }
  },

created() {
      this.$store.commit('SET_LAYOUT', 'student-layout');
      axios.get(`/student/internship/${this.$route.params.id}/assessment/questions`).then(response => {
          this.post = response.data;
          console.log(this.post);
      });
    },
  
  methods: {

    submit() {
			this.answer.company_id = this.post.company_id;
			this.answer.post_id = this.post.id;
			this.answer.student_id = this.$auth.user().id
      this.errors = {};
      axios.post('/student/internship/assessment', this.answer).then(response => {
        console.log(this.answer);
        this.$router.push('/student/internships/main');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
    },
}

  }
</script>