<template>
<v-container>
  <v-card
    raised
    class="mx-auto"
    width="95%"
    max-width="800px"
  >
    <v-card-text>

         <v-container>
					<p class="display-1">{{student.student_basic_info.name}}</p>
          <p class="body-2">{{student.student_basic_info.email}}</p>
          <p class="body-2">+{{student.student_basic_info.contact_no}}</p>
          <p class="body-2">{{student.student_basic_info.city_name}}</p>

          <br><br>
          <v-divider></v-divider>

          <v-expansion-panels hover focusable popout>
            <v-expansion-panel>
              <v-expansion-panel-header>Contact Details</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-row>
            <v-col cols="12" sm="4">
              <p class="title">Contact Details</p>
            </v-col>
            <v-col cols="12" sm="8">
            <div class="my-4">
              <p class="body-2">Name: {{student.student_basic_info.name}}</p>
              <p class="body-2">Email: {{student.student_basic_info.email}}</p>
              <p class="body-2">Contact No: {{student.student_basic_info.contact_no}}</p>
              <p class="body-2" v-if="student.student_basic_info.country_name">Country: {{student.student_basic_info.country_name}}</p>
              <p class="body-2" v-if="student.student_basic_info.state_name">State: {{student.student_basic_info.state_name}}</p>
              <p class="body-2" v-if="student.student_basic_info.city_name">City: {{student.student_basic_info.city_name}}</p>
            </div>
            </v-col>
                </v-row>
              </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel>
              <v-expansion-panel-header>Internship Preferences</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-row>
            <v-col cols="12" sm="4">
              <p class="title">Internship Preferences</p>
            </v-col>
            <v-col cols="12" sm="8">
            <div class="my-4">
              <p class="body-2">Fields:</p>
              <p class="body-2" v-for="(field,i) in student.student_internship_preferences" :key="i"> - {{field['title']}}</p>
            </div>
            </v-col>
                </v-row>
              </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel v-if="(student.student_phd) || (student.student_post_grad) || (student.student_grad) || (student.student_diploma) || (student.student_xii) || (student.student_x)">
            <v-expansion-panel-header>Education Details</v-expansion-panel-header>
              <v-expansion-panel-content>
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
                </v-row>
              </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel v-if="student.student_job.length!=0">
              <v-expansion-panel-header>Jobs Details</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-row>
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
                </v-row>
              </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel v-if="student.student_internship.length!=0">
              <v-expansion-panel-header>Internship Details</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-row>
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
                </v-row>
              </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel v-if="student.student_training.length!=0">
              <v-expansion-panel-header>Training Details</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-row>
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
                </v-row>
              </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel v-if="student.student_project.length!=0">
              <v-expansion-panel-header>Project Details</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-row>
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
                </v-row>
              </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel v-if="student.student_skills.length!=0">
              <v-expansion-panel-header>Skills</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-row>
                  <v-col cols="12" sm="4" v-if="student.student_skills.length!=0">
                    <p class="title">Skills</p>
                  </v-col>

                  <v-col cols="12" sm="8" v-if="student.student_skills.length!=0">
                      <div class="my-4" v-for="(skill,i) in student.student_skills" :key="i">
                        <p class="body-2">{{skill.skill_name}}</p>
                        <p class="body-2">{{skill.level}}</p>
                    </div>
                  </v-col>
                </v-row>
              </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel v-if="student.student_links">
              <v-expansion-panel-header>Links</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-row>
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
                </v-row>
              </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel v-if="(student.student_pos_of_resp.length!=0) || (student.student_additional.length!=0)">
              <v-expansion-panel-header>Other Details</v-expansion-panel-header>
              <v-expansion-panel-content>
                <v-row>
                  <v-col cols="12" sm="4" v-if="student.student_pos_of_resp.length!=0">
                    <p class="title">Position Of Responsibility</p>
                  </v-col>

                  <v-col cols="12" sm="8" v-if="student.student_pos_of_resp.length!=0">
                      <div class="my-4" v-for="(pos,i) in student.student_pos_of_resp" :key="i">
                        <p class="body-2">{{pos.description}}</p>
                    </div>
                  </v-col>

                  <v-col cols="12" sm="4" v-if="student.student_additional.length!=0">
                    <p class="title">Additional Details</p>
                  </v-col>

                  <v-col cols="12" sm="8" v-if="student.student_additional.length!=0">
                      <div class="my-4" v-for="(add,i) in student.student_additional" :key="i">
                        <p class="body-2">{{add.description}}</p>
                    </div>
                  </v-col>
                </v-row>
              </v-expansion-panel-content>
            </v-expansion-panel>
          
          </v-expansion-panels>

        </v-container>

        </v-card-text>
  </v-card>

</v-container>

</template>

<script>
export default {
    data(){
      return {
          student: {
            student_basic_info: [],
            student_internship_preferences: [],
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
          this.$store.commit('SET_LAYOUT', 'admin-layout');
            axios.get(`/admin/allstudents/${this.$route.params.id}/details`).then(response => {
                this.student = response.data;
            });
        
    },

    methods: {
      
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
