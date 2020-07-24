<template>
    <v-container class="mx-4 my-4">
        <v-card raised
					class="mx-auto my-4 p-4"
					width="85%"
					min-height="200"
					v-for="(post,i) in posts"
					:key="i"
					@click="details(post)">
						<p class="title">{{post.profile_name}}</p>
						<p class="subtitle-1">{{post.company_name}}</p><br>
						<p class="subtitle-2"><v-icon>mdi-map-marker</v-icon><span v-for="(loc,i) in post.location" :key="i"> {{loc}} </span></p>

						<br>
						<v-row>
							<v-col cols="3">
								<p class="body-2" v-if="post.start_date_type=='Immediately'">Start Date: <br> {{post.start_date_type}}</p>
								<p class="body-2" v-if="post.start_date_type=='Later'">Start Date: <br> {{post.start_date}}</p>
							</v-col>
							<v-col cols="3">
								<p class="body-2">Duration: <br> {{post.internship_duration}}</p>
							</v-col>
							<v-col cols="6">
								<p class="body-2" v-if="post.stipend_category=='Fixed'">Stipend: <br> Rs. {{post.stipend_fixed}} {{post.stipend_type}}</p>
								<p class="body-2" v-if="post.stipend_category=='Negotiable'">Stipend: <br> Rs. {{post.stipend_amount_min}} - {{post.stipend_amount_max}} {{post.stipend_type}}</p>
								<p class="body-2" v-if="post.stipend_category=='Performance based'">Stipend: <br> Rs. {{post.stipend_amount_min}} {{post.stipend_type}} Incentive: {{post.stipend_incentive}}</p>
								<p class="body-2" v-if="post.stipend_category=='Unpaid'">Stipend: <br> Unpaid</p>
							</v-col>
							</v-row>

							<v-chip
								class="ma-2"
								small
								v-if="post.is_part_time_allowed==1"
							>
								Part time allowed
							</v-chip>

							<v-chip
								class="ma-2"
								small
								v-if="post.preplacement_offer==1"
							>
								Internship with preplacement offer
							</v-chip>

							<v-chip
								class="ma-2"
								small
								v-if="post.preplacement_offer==0 & post.is_part_time_allowed==0"
							>
								Internship
							</v-chip>

							<br>


        </v-card>

    </v-container>
</template>

<script>
export default {
	data(){
		return {
			posts: [],
			i: 0,
		}
	},

	created(){
    this.$store.commit('SET_LAYOUT', 'student-layout');
    this.axios.get('/student/internships/main').then((response) => {
			this.posts = response.data;
    });
  },

	methods: {
		details(post){
			this.$route.params.id = post.id;
			this.$router.push(`/student/internship/${this.$route.params.id}/details`);
		}
	}
}
</script>

<style scoped>
p {
	margin: 0%;
}
.subtitle-1 {
	color: #626567;
}
.details {
	color: #3498DB ;
	text-align: right;
	float: right;
	cursor: pointer;
}

</style>
