<template>
  <v-container>
    <v-card raised
            class="mx-auto"
            width="95%"
            max-width="700px">
      <v-card-text>

        <v-container class="p-4">
          <p class="headline"> {{post.profile_name}} </p>
          <p class="subtitle-1"> {{post.company_name}} </p>
          <p class="body-2">Location(s): <span v-for="(loc,i) in post.location" :key="i"> {{loc}} </span></p>
          <br>
          <v-row>
            <v-col cols="12" sm="3">
              <p class="body-2" v-if="post.start_date_type=='Immediately'">Start Date: <br> {{post.start_date_type}}</p>
              <p class="body-2" v-if="post.start_date_type=='Later'">Start Date: <br> {{post.start_date}}</p>
            </v-col>
            <v-col cols="12" sm="3">
              <p class="body-2">Duration: <br> {{post.internship_duration}}</p>
            </v-col>
            <v-col cols="12" sm="6">
              <p class="body-2" v-if="post.stipend_category=='Fixed'">Stipend: <br> Rs. {{post.stipend_fixed}} {{post.stipend_type}}</p>
              <p class="body-2"
                 v-if="post.stipend_category=='Negotiable'">Stipend: <br> Rs. {{post.stipend_amount_min}} - {{post.stipend_amount_max}} {{post.stipend_type}}</p>
              <p class="body-2"
                 v-if="post.stipend_category=='Performance based'">Stipend: <br> Rs. {{post.stipend_amount_min}} {{post.stipend_type}} Incentive: {{post.stipend_incentive}}</p>
              <p class="body-2"
                 v-if="post.stipend_category=='Unpaid'">Stipend: <br> Unpaid</p>
            </v-col>
          </v-row>

          <p class="body-2 mt-4" v-if="post.is_part_time_allowed==1">Part time allowed</p>
        </v-container>

      </v-card-text>
    </v-card>
    <v-card raised
            class="mx-auto mt-4"
            width="95%"
            max-width="700px">
      <v-card-text>

        <v-container class="p-4">

          <p class="body-1">About Internship:</p>
          <p class="body-2" v-if="post.intern_resp_desc">Selected Intern's day-to-day responsibilities include:<br> {{post.intern_resp_desc}}</p> <br>
          <p class="body-1" v-if="post.no_of_openings"># of internships available: {{post.no_of_openings}} </p><br>

          <p class="body-1" v-if="post.skills">Skills required:</p>
          <p class="body-2" v-if="post.skills"><span v-for="(skill,i) in post.skills" :key="i"> {{skill}}, </span></p><br>
          <p class="body-1">Who can apply:</p>
          <p class="body-2">Only those candidates can apply who:</p>
          <p class="body-2">1. are available for duration of {{post.internship_duration}}</p>
          <p class="body-2">2. have relevant skills and interests</p><br>
          <p class="body-1" v-if="post.perks_array">Perks: </p>
          <p class="body-2" v-if="post.perks_array"><span v-for="(perk,i) in post.perks_array" :key="i"> {{perk}}, </span></p>
          <p class="body-1" v-if="post.other_req">Other Requirements: </p>
          <p class="body-2" v-if="post.other_req"> {{post.other_req}} </p>


          <br><br>

          <v-row>

            <v-col cols="6"
                   class="text-right">
              <v-btn @click="back()">
                Go back
              </v-btn>
            </v-col>
            <v-col cols="6"
                   class="text-left">
              <v-btn color="success"
                     @click="apply()">
                Apply Now
              </v-btn>
            </v-col>

          </v-row>

        </v-container>

      </v-card-text>
    </v-card>
  </v-container>
</template>

<script>
  export default {
    data() {
      return {
        post: [],
        i: 0
      }
    },

    created() {
      this.$store.commit('SET_LAYOUT', 'student-layout')
      axios.get(`/student/internship/${this.$route.params.id}/details`).then(response => {
        this.post = response.data
      })
    },

    methods: {
      apply() {
        this.$router.push({ name: 'student.ViewResume', params: { post_id: this.post.id } })
      },
      back() {
        this.$router.go(-1)
      }
    }
  }
</script>

<style scoped>
  .headline,
  .body-1 {
    color: black;
  }
  p {
    margin: 0%;
  }
</style>
