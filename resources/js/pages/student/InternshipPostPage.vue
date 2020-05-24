<template>
<div>
  <v-card
    raised
    class="mx-auto"
    width="700"
  >
    <v-card-text>
          
        <v-container class="p-4">
					<p class="headline"> {{post.profile_name}} </p>
					<p class="subtitle-1"> {{post.company_name}} </p>
					<p class="body-2">Location: {{post.type_of_internship}}</p>
          <v-row>
            <v-col cols="4">
              <p class="body-2" v-if="post.start_date_type=='Immediately'">Start Date: {{post.start_date_type}}</p>
              <p class="body-2" v-if="post.start_date_type=='Later'">Start Date: {{post.start_date}}</p>
            </v-col>
            <v-col cols="4">
              <p class="body-2">Duration: {{post.internship_duration}}</p>
            </v-col>
            <v-col cols="4">
              <p class="body-2" v-if="post.stipend_category=='Fixed'">Stipend: Rs. {{post.stipend_fixed}} {{post.stipend_type}}</p>
              <p class="body-2" v-if="post.stipend_category=='Negotiable'">Stipend: Rs. {{post.stipend_amount_min}} - {{post.stipend_amount_max}} {{post.stipend_type}}</p>
              <p class="body-2" v-if="post.stipend_category=='Performance based'">Stipend: Rs. {{post.stipend_amount_min}} {{post.stipend_type}} Incentive: {{post.stipend_incentive}}</p>
              <p class="body-2" v-if="post.stipend_category=='Unpaid'">Stipend: Unpaid</p>              
            </v-col>
            <v-col cols="12" v-if="post.is_part_time_allowed==1"><p class="body-2">Part time allowed</p></v-col>
          </v-row>

            
        </v-container>
        
        </v-card-text>
  </v-card>
  <v-card
    raised
    class="mx-auto mt-4"
    width="700"
  >
    <v-card-text>
          
        <v-container class="p-4">			
					
					<p class="body-2">About Internship:</p>
          <p class="body-2"> {{post.intern_resp_desc}}</p>
          <p class="body-2"># of internships available: {{post.no_of_openings}} </p>

          <p class="body-2">Skills required: {{post.skills_id}}</p>
          <p class="body-2">Who can apply:</p>
          <p class="body-2">Only those candidates can apply who:</p>
          <p class="body-2">1. are available for duration of {{post.internship_duration}}</p>
          <p class="body-2">2. have relevant skills and interests</p>
          <p class="body-2">Perks: {{post.perks}}</p>

          <v-btn class="ma-2 text-center" outlined color="indigo" @click="apply()">Apply Now</v-btn><br>

            
        </v-container>
        
        </v-card-text>
  </v-card>
</div>
      
</template>

<script>
export default {
    data(){
      return {
          post: [],
      }
    },

    created() {
        axios.get(`/student/internship/${this.$route.params.id}/details`).then(response => {
            this.post = response.data;
            console.log(this.post);
        });
    },

    methods: {
      apply(){
        this.$router.push(`/student/internship/${this.$route.params.id}/assessment`);
      }
    }
}
</script>