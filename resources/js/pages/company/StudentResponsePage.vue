<template>
<v-container>
  <v-container>
  <v-card
    raised
    class="mx-auto"
    width="95%"
    max-width="800px"
  >
    <v-card-text>

        <v-container class="p-4">
					<p class="display-1">{{student.student_assessment.student_name}}</p>
          <p class="body-2">{{student.student_basic_info.email}}</p>
          <p class="body-2">+{{student.student_basic_info.contact_no}}</p>
          <p class="body-2">{{student.student_basic_info.city_name}}</p>

          <br><br>
          <v-divider></v-divider>

          <v-row>
            <v-col cols="12" sm="4">
              <p class="title">Education</p>
            </v-col>
            <v-col cols="12" sm="8">
            <div class="my-4" v-if="student.student_phd">
              <p class="body-2">PhD, {{student.student_phd.stream_name}} ({{student.student_phd.start_year}}-{{student.student_phd.end_year}})</p>
              <p class="body-2">{{student.student_phd.college_name}}</p>
              <p class="body-2">Score: {{student.student_phd.gpa_score}}</p>
            </div>

            <div class="my-4" v-if="student.student_post_grad">
              <p class="body-2">{{student.student_post_grad.degree_name}}, {{student.student_post_grad.stream_name}} ({{student.student_post_grad.start_year}}-{{student.student_post_grad.end_year}})</p>
              <p class="body-2">{{student.student_post_grad.college_name}}</p>
              <p class="body-2">Score: {{student.student_post_grad.gpa_score}}</p>
            </div>

            <div class="my-4" v-if="student.student_grad">
              <p class="body-2">{{student.student_grad.degree_name}}, {{student.student_grad.stream_name}} ({{student.student_grad.start_year}}-{{student.student_grad.end_year}})</p>
              <p class="body-2">{{student.student_grad.college_name}}</p>
              <p class="body-2">Score: {{student.student_grad.gpa_score}}</p>
            </div>

            <div class="my-4" v-if="student.student_diploma">
              <p class="body-2">{{student.student_diploma.degree_name}}, {{student.student_diploma.stream_name}} ({{student.student_diploma.start_year}}-{{student.student_diploma.end_year}})</p>
              <p class="body-2">{{student.student_diploma.college_name}}</p>
              <p class="body-2">Score: {{student.student_diploma.gpa_score}}</p>
            </div>

            <div class="my-4" v-if="student.student_xii">
              <p class="body-2">XII (Senior Secondary), {{student.student_xii.stream}}</p>
              <p class="body-2">Year of Completion: {{student.student_xii.year_of_completion}}</p>
              <p class="body-2">{{student.student_xii.board}} Board ({{student.student_xii.school_name}})</p>
              <p class="body-2">Score: {{student.student_xii.gpa_score}}</p>
            </div>

            <div class="my-4" v-if="student.student_x">
              <p class="body-2">X (Secondary)</p>
              <p class="body-2">Year of Completion: {{student.student_x.year_of_completion}}</p>
              <p class="body-2">{{student.student_x.board}} Board ({{student.student_x.school_name}})</p>
              <p class="body-2">Score: {{student.student_x.gpa_score}}</p>
            </div>
            </v-col>

            <v-col cols="12" v-if="student.student_job.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="12" sm="4" v-if="student.student_job.length!=0">
              <p class="title">Jobs</p>
            </v-col>

            <v-col cols="12" sm="8" v-if="student.student_job.length!=0">
                <div class="my-4" v-for="(job,i) in student.student_job" :key="i">
                  <p class="body-2">{{job.position}}</p>
                  <p class="body-2">{{job.organization}} ({{job.location}})</p>
                  <p class="body-2">{{job.start_date}} - {{job.end_date}}</p>
                  <p class="body-2">{{job.description}}</p>
              </div>
            </v-col>

            <v-col cols="12" v-if="student.student_internship.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="12" sm="4" v-if="student.student_internship.length!=0">
              <p class="title">Internships</p>
            </v-col>

            <v-col cols="12" sm="8" v-if="student.student_internship.length!=0">
                <div class="my-4" v-for="(int,i) in student.student_internship" :key="i">
                  <p class="body-2">{{int.position}}</p>
                  <p class="body-2">{{int.organization}} ({{int.location}})</p>
                  <p class="body-2">{{int.start_date}} - {{int.end_date}}</p>
                  <p class="body-2">{{int.description}}</p>
              </div>
            </v-col>

            <v-col cols="12" v-if="student.student_pos_of_resp.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="12" sm="4" v-if="student.student_pos_of_resp.length!=0">
              <p class="title">Position Of Responsibility</p>
            </v-col>

            <v-col cols="12" sm="8" v-if="student.student_pos_of_resp.length!=0">
                <div class="my-4" v-for="(pos,i) in student.student_pos_of_resp" :key="i">
                  <p class="body-2">{{pos.description}}</p>
              </div>
            </v-col>

            <v-col cols="12" v-if="student.student_training.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="12" sm="4" v-if="student.student_training.length!=0">
              <p class="title">Trainings</p>
            </v-col>

            <v-col cols="12" sm="8" v-if="student.student_training.length!=0">
                <div class="my-4" v-for="(tr,i) in student.student_training" :key="i">
                  <p class="body-2">{{tr.training_program}}</p>
                  <p class="body-2">{{tr.organization}} ({{tr.location}})</p>
                  <p class="body-2">{{tr.start_date}} - {{tr.end_date}}</p>
                  <p class="body-2">{{tr.description}}</p>
              </div>
            </v-col>

            <v-col cols="12" v-if="student.student_project.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="12" sm="4" v-if="student.student_project.length!=0">
              <p class="title">Projects</p>
            </v-col>

            <v-col cols="12" sm="8" v-if="student.student_project.length!=0">
                <div class="my-4" v-for="(project,i) in student.student_project" :key="i">
                  <p class="body-2">{{project.project_name}}</p>
                  <p class="body-2">{{project.start_month}} - {{project.end_month}}</p>
                  <p class="body-2">{{project.project_link}}</p>
                  <p class="body-2">{{project.description}}</p>
              </div>
            </v-col>

            <v-col cols="12" v-if="student.student_skills.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="12" sm="4" v-if="student.student_skills.length!=0">
              <p class="title">Skills</p>
            </v-col>

            <v-col cols="12" sm="8" v-if="student.student_skills.length!=0">
                <div class="my-4" v-for="(skill,i) in student.student_skills" :key="i">
                  <p class="body-2">{{skill.skill_name}}</p>
                  <p class="body-2">{{skill.level}}</p>
              </div>
            </v-col>

            <v-col cols="12" v-if="student.student_links"><v-divider></v-divider></v-col>

            <v-col cols="12" sm="4" v-if="student.student_links">
              <p class="title">Work Samples</p>
            </v-col>

            <v-col cols="12" sm="8" v-if="student.student_links">
              <div class="my-4" v-if="student.student_links.blog_url">
                <p class="body-2">Blog Link</p>
                <p class="body-2">{{student.student_links.blog_url}}</p>
              </div>
              <div class="my-4" v-if="student.student_links.github_url">
                <p class="body-2">GitHub Profile</p>
                <p class="body-2">{{student.student_links.github_url}}</p>
              </div>
              <div class="my-4" v-if="student.student_links.linkedin_url">
                <p class="body-2">LinkedIn Profile</p>
                <p class="body-2">{{student.student_links.linkedin_url}}</p>
              </div>
              <div class="my-4" v-if="student.student_links.playstore_developer_url">
                  <p class="body-2">PlayStore Developer Public Profile</p>
                  <p class="body-2">{{student.student_links.playstore_developer_url}}</p>
              </div>
              <div class="my-4" v-if="student.student_links.other_url">
                  <p class="body-2">Other Profile</p>
                  <p class="body-2">{{student.student_links.other_url}}</p>
              </div>

            </v-col>

            <v-col cols="12" v-if="student.student_additional.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="12" sm="4" v-if="student.student_additional.length!=0">
              <p class="title">Additional Details</p>
            </v-col>

            <v-col cols="12" sm="8" v-if="student.student_additional.length!=0">
                <div class="my-4" v-for="(add,i) in student.student_additional" :key="i">
                  <p class="body-2">{{add.description}}</p>
              </div>
            </v-col>


          </v-row>


        </v-container>

        </v-card-text>
  </v-card>

  <v-card
    raised
    class="mx-auto my-4"
    width="95%"
    max-width="800px"
  >
    <v-card-text>

        <v-container class="p-4">
          <p class="headline text-center">Assessment Questions</p>
          <v-divider></v-divider>
          <br><br><br>
          <p class="subtitle-1">Why should you be hired for this role?</p>
          <p class="body-2">{{student.student_assessment.default_question1_ans}}</p>
          <br><br>
          <p class="subtitle-1">Are you available for {{student.post_data.internship_duration}}, for a {{student.post_data.type_of_internship}} internship? If not, what is the time period you are available for and the earliest date you can start this internship on?</p>
          <p class="body-2">{{student.student_assessment.default_question2_ans}}</p>
          <br><br>
          <div v-if="student.post_data.question_1">
            <p class="subtitle-1">{{student.post_data.question_1}}</p>
            <p class="body-2">{{student.student_assessment.company_question1_ans}}</p>
          </div>
          <br>
          <div v-if="student.post_data.question_2">
            <p class="subtitle-1">{{student.post_data.question_2}}</p>
            <p class="body-2">{{student.student_assessment.company_question2_ans}}</p>
          </div>
        </v-container>
    </v-card-text>
  </v-card>

  </v-container>

  <v-bottom-navigation
      fixed
      horizontal
      grow
      :v-model="student.status"
    >
    <v-btn text color="grey" left @click="back()">
        <span>Go Back</span>
      </v-btn>
      <v-btn text color="success" value="Selected" @click="select()">
        <span>Select</span>
        <v-icon>mdi-checkbox-marked-circle-outline</v-icon>
      </v-btn>

      <v-btn text color="primary" value="Shortlisted" @click="shortlist()">
        <span>ShortList</span>
        <v-icon>mdi-clipboard-outline</v-icon>
      </v-btn>

      <v-btn text color="red" value="Rejected" @click="reject()">
        <span>Reject</span>
        <v-icon>mdi-close-circle-outline</v-icon>
      </v-btn>


    </v-bottom-navigation>


</v-container>

</template>

<script>
export default {
    data(){
      return {
          student: {
            student_assessment: [],
            student_basic_info: [],
            student_grad: [],
            student_post_grad: [],
            student_xii: [],
            student_x: [],
            student_job: [],
            student_internship: [],
            student_pos_of_resp: [],
            student_training: [],
            student_project: [],
            student_skills: [],
            student_links: [],
            student_additional: [],
            post_data: [],
            status: '',
          },
          i: '',
          final_status: '',
          status_array: {
            company_id: '',
            post_id: '',
            student_id: '',
            status: '',
          },

      }
    },

    created() {
        this.$store.commit('SET_LAYOUT', 'company-layout');
        axios.get(`/company/view/${this.$route.params.id}/response`).then(response => {
            this.student = response.data;
            // console.log(response.data);
        });
    },

    methods: {
      select(){
        this.status_array.company_id = this.student.student_assessment.company_id;
        this.status_array.post_id = this.student.student_assessment.post_id;
        this.status_array.student_id = this.student.student_assessment.student_id;
        this.status_array.status = 'Selected';

        this.errors = {};
        axios.post('/applicant/status/change', this.status_array).then(response => {
          // console.log(this.status_array);
        }).catch(error => {
          if (error.response.status === 422) {
          console.log("error");
          }
        });


      },
      shortlist(){
        this.status_array.company_id = this.student.student_assessment.company_id;
        this.status_array.post_id = this.student.student_assessment.post_id;
        this.status_array.student_id = this.student.student_assessment.student_id;
        this.status_array.status = 'Shortlisted';

        this.errors = {};
        axios.post('/applicant/status/change', this.status_array).then(response => {
          // console.log(this.status_array);
        }).catch(error => {
          if (error.response.status === 422) {
          console.log("error");
          }
        });
      },
      reject(){
        this.status_array.company_id = this.student.student_assessment.company_id;
        this.status_array.post_id = this.student.student_assessment.post_id;
        this.status_array.student_id = this.student.student_assessment.student_id;
        this.status_array.status = 'Rejected';

        this.errors = {};
        axios.post('/applicant/status/change', this.status_array).then(response => {
          // console.log(this.status_array);
        }).catch(error => {
          if (error.response.status === 422) {
          console.log("error");
          }
        });

      },
      back(){
        this.$router.go(-1);
      }

    }
}
</script>

<style scoped>
p {
  margin: 0%;
  padding: 0%;
}

.title, .subtitle-1 {
  color: blue;
}
</style>
