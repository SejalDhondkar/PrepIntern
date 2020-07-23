<template>
<div>

  <v-card
    raised
    class="mx-auto"
    width="700"
  >
    <v-card-text>

        <v-container class="p-4">
          <v-card flat>
		    	<p class="display-1">{{student.student_basic_info.name}}<v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/profile/edit"><v-icon>mdi-pencil-outline</v-icon></v-btn></p>
          <p class="body-2">{{student.student_basic_info.email}}</p>
          <p class="body-2">{{student.student_basic_info.contact_no}}</p>
          <p class="body-2">{{student.student_basic_info.city_name}}</p>
          </v-card>

          <br><br>
          <v-divider></v-divider>

          <v-row>
            <v-col cols="4">
              <p class="title">Education</p>
            </v-col>
            <v-col cols="8">
            <v-card flat class="my-4" v-if="student.student_phd">
              <p class="body-2">PhD, {{student.student_phd.stream_name}} ({{student.student_phd.start_year}}-{{student.student_phd.end_year}})<v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/phddetails"><v-icon>mdi-pencil-outline</v-icon></v-btn></p>
              <p class="body-2">{{student.student_phd.college_name}}</p>
              <p class="body-2">Score: {{student.student_phd.gpa_score}}</p>

            </v-card>


            <v-card flat class="my-4" v-if="student.student_post_grad">
              <p class="body-2">{{student.student_post_grad.degree_name}}, {{student.student_post_grad.stream_name}} ({{student.student_post_grad.start_year}}-{{student.student_post_grad.end_year}})<v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/postgraduationdetails"><v-icon>mdi-pencil-outline</v-icon></v-btn></p>
              <p class="body-2">{{student.student_post_grad.college_name}}</p>
              <p class="body-2">Score: {{student.student_post_grad.gpa_score}}</p>
            </v-card>

            <v-card flat class="my-4" v-if="student.student_grad">
              <p class="body-2">{{student.student_grad.degree_name}}, {{student.student_grad.stream_name}} ({{student.student_grad.start_year}}-{{student.student_grad.end_year}}<v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/graduationdetails"><v-icon>mdi-pencil-outline</v-icon></v-btn></p>
              <p class="body-2">{{student.student_grad.college_name}}</p>
              <p class="body-2">Score: {{student.student_grad.gpa_score}}</p>
            </v-card>

            <v-card flat class="my-4" v-if="student.student_diploma">
              <p class="body-2">{{student.student_diploma.degree_name}}, {{student.student_diploma.stream_name}} ({{student.student_diploma.start_year}}-{{student.student_diploma.end_year}})<span><v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/diplomadetails"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
              <p class="body-2">{{student.student_diploma.college_name}}</p>
              <p class="body-2">Score: {{student.student_diploma.gpa_score}}</p>
            </v-card>

            <v-card flat class="my-4" v-if="student.student_xii">
              <p class="body-2">XII (Senior Secondary), {{student.student_xii.stream}}<span><v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/twelthdetails"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
              <p class="body-2">Year of Completion: {{student.student_xii.year_of_completion}}</p>
              <p class="body-2">{{student.student_xii.board}} Board ({{student.student_xii.school_name}})</p>
              <p class="body-2">Score: {{student.student_xii.gpa_score}}</p>
            </v-card>

            <v-card flat class="my-4" v-if="student.student_x">
              <p class="body-2">X (Secondary)<span><v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/tenthdetails"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
              <p class="body-2">Year of Completion: {{student.student_x.year_of_completion}}</p>
              <p class="body-2">{{student.student_x.board}} Board ({{student.student_x.school_name}})</p>
              <p class="body-2">Score: {{student.student_x.gpa_score}}</p>
            </v-card>
            </v-col>

            <v-col cols="12" v-if="student.student_job.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="4" v-if="student.student_job.length!=0">
              <p class="title">Jobs</p>
            </v-col>

            <v-col cols="8" v-if="student.student_job.length!=0">
                <v-card flat class="my-4" v-for="(job,i) in student.student_job" :key="i">
                  <p class="body-2">{{job.position}}<span><v-btn icon dark class="float-right ma-2" color="primary" @click="jobs(job.id)"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                  <p class="body-2">{{job.organization}} ({{job.location}})</p>
                  <p class="body-2">{{job.start_date}} - {{job.end_date}}</p>
                  <p class="body-2">{{job.description}}</p>
              </v-card>
            </v-col>

            <v-col cols="12" v-if="student.student_internship.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="4" v-if="student.student_internship.length!=0">
              <p class="title">Internships</p>
            </v-col>

            <v-col cols="8" v-if="student.student_internship.length!=0">
                <v-card flat class="my-4" v-for="(int,i) in student.student_internship" :key="i">
                  <p class="body-2">{{int.position}}<span><v-btn icon dark class="float-right ma-2" color="primary" @click="internship(int.id)"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                  <p class="body-2">{{int.organization}} ({{int.location}})</p>
                  <p class="body-2">{{int.start_date}} - {{int.end_date}}</p>
                  <p class="body-2">{{int.description}}</p>
              </v-card>
            </v-col>

            <v-col cols="12" v-if="student.student_pos_of_resp.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="4" v-if="student.student_pos_of_resp.length!=0">
              <p class="title">Position Of Responsibility</p>
            </v-col>

            <v-col cols="8" v-if="student.student_pos_of_resp.length!=0">
                <v-card flat class="my-4" v-for="(pos,i) in student.student_pos_of_resp" :key="i">
                  <p class="body-2">{{pos.description}}<span><v-btn icon dark class="float-right ma-2" color="primary" @click="pos_of_resp(pos.id)"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p><br>
              </v-card>
            </v-col>

            <v-col cols="12" v-if="student.student_training.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="4" v-if="student.student_training.length!=0">
              <p class="title">Trainings</p>
            </v-col>

            <v-col cols="8" v-if="student.student_training.length!=0">
                <v-card flat class="my-4" v-for="(tr,i) in student.student_training" :key="i">
                  <p class="body-2">{{tr.training_program}}<span><v-btn icon dark class="float-right ma-2" color="primary" @click="training(tr.id)"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                  <p class="body-2">{{tr.organization}} ({{tr.location}})</p>
                  <p class="body-2">{{tr.start_date}} - {{tr.end_date}}</p>
                  <p class="body-2">{{tr.description}}</p>
              </v-card>
            </v-col>

            <v-col cols="12" v-if="student.student_project.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="4" v-if="student.student_project.length!=0">
              <p class="title">Projects</p>
            </v-col>

            <v-col cols="8" v-if="student.student_project.length!=0">
                <v-card flat class="my-4" v-for="(project,i) in student.student_project" :key="i">
                  <p class="body-2">{{project.project_name}}<span><v-btn icon dark class="float-right ma-2" color="primary" @click="projects(project.id)"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                  <p class="body-2">{{project.start_month}} - {{project.end_month}}</p>
                  <p class="body-2">{{project.project_link}}</p>
                  <p class="body-2">{{project.description}}</p>
              </v-card>
            </v-col>

            <v-col cols="12" v-if="student.student_skills.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="4" v-if="student.student_skills.length!=0">
              <p class="title">Skills</p>
            </v-col>

            <v-col cols="8" v-if="student.student_skills.length!=0">
                <v-card flat class="my-4" v-for="(skill,i) in student.student_skills" :key="i">
                  <p class="body-2">{{skill.skill_name}}<span><v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/skilldetails"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                  <p class="body-2">{{skill.level}}</p>
              </v-card>
            </v-col>

            <v-col cols="12" v-if="student.student_links"><v-divider></v-divider></v-col>

            <v-col cols="4" v-if="student.student_links">
              <p class="title">Work Samples</p>
            </v-col>

            <v-col cols="8" v-if="student.student_links">
              <v-card flat class="my-4" v-if="student.student_links.blog_url">
                <p class="body-2">Blog Link<span><v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/links"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                <p class="body-2">{{student.student_links.blog_url}}</p>
              </v-card>
              <v-card flat class="my-4" v-if="student.student_links.github_url">
                <p class="body-2">GitHub Profile<span><v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/links"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                <p class="body-2">{{student.student_links.github_url}}</p>
              </v-card>
              <v-card flat class="my-4" v-if="student.student_links.linkedin_url">
                <p class="body-2">LinkedIn Profile<span><v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/links"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                <p class="body-2">{{student.student_links.linkedin_url}}</p>
              </v-card>
              <v-card flat class="my-4" v-if="student.student_links.playstore_developer_url">
                  <p class="body-2">PlayStore Developer Public Profile<span><v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/links"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                  <p class="body-2">{{student.student_links.playstore_developer_url}}</p>
              </v-card>
              <v-card flat class="my-4" v-if="student.student_links.other_url">
                  <p class="body-2">Other Profile<span><v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/links"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                  <p class="body-2">{{student.student_links.other_url}}</p>
              </v-card>

            </v-col>

            <v-col cols="12" v-if="student.student_additional.length!=0"><v-divider></v-divider></v-col>

            <v-col cols="4" v-if="student.student_additional.length!=0">
              <p class="title">Additional Details</p>
            </v-col>

            <v-col cols="8" v-if="student.student_additional.length!=0">
                <v-card flat class="my-4" v-for="(add,i) in student.student_additional" :key="i">
                  <p class="body-2">{{add.description}}<span><v-btn icon dark class="float-right ma-2 text-decoration-none" color="primary" to="/student/additionaldetails"><v-icon>mdi-pencil-outline</v-icon></v-btn></span></p>
                </v-card>
            </v-col>
          </v-row>
        </v-container>

        </v-card-text>
  </v-card>

</div>

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
          },
          i: '',

      }
    },

    created() {
      this.$store.commit('SET_LAYOUT', 'student-layout');
        axios.get(`/student/resume/view`).then(response => {
            this.student = response.data;
        });
    },

    methods: {
      internship(id){
        this.$route.params.id = id;
        this.$router.push(`/student/internshipdetails/${this.$route.params.id}/edit`);
      },

      jobs(id){
        this.$route.params.id = id;
        this.$router.push(`/student/jobdetails/${this.$route.params.id}/edit`);
      },
      pos_of_resp(id){
        this.$route.params.id = id;
        this.$router.push(`/student/positionofresponsibility/${this.$route.params.id}/edit`);
      },
      training(id){
        this.$route.params.id = id;
        this.$router.push(`/student/trainingdetails/${this.$route.params.id}/edit`);
      },
      projects(id){
        this.$route.params.id = id;
        this.$router.push(`/student/projectdetails/${this.$route.params.id}/edit`);
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
