<template>
  <v-card
    raised
    class="mx-auto"
    width="85%"
  >

    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title>Education Details</v-toolbar-title>

    </v-card-text>
    </v-toolbar>

        <v-container class="px-4 text-center">
            <v-btn class="ma-2" outlined color="indigo" @click="graduation()">Graduation details</v-btn><br>
            <v-btn class="ma-2" outlined color="indigo" @click="twelth()">XII (Senior Secondary) details</v-btn><br>
            <v-btn class="ma-2" outlined color="indigo" @click="tenth()">X (Secondary) Details</v-btn><br>
            <v-btn class="ma-2" outlined color="indigo" @click="postgrad()">Post Graduation Details</v-btn><br>
            <v-btn class="ma-2" outlined color="indigo" @click="diploma()">Diploma Details</v-btn><br>
            <v-btn class="ma-2" outlined color="indigo" @click="phd()">PhD Details</v-btn>

        <v-row>
          <v-col
						cols="6"
						class="text-left"
					>
						<v-btn
							color="primary"
							@click="back()"
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
							@click="next()"
						>
							Next
						</v-btn>
					</v-col>
				</v-row>
        </v-container>

  </v-card>


</template>

<script>
export default {
    data(){
      return {
      }
    },

    created(){
    this.$store.commit('SET_LAYOUT', 'student-layout');
  },

    methods: {
        graduation(){
            this.$router.push('/student/graduationdetails');
        },

        twelth(){
            this.$router.push('/student/twelthdetails');
        },

        tenth(){
            this.$router.push('/student/tenthdetails');
        },

        postgrad(){
            this.$router.push('/student/postgraduationdetails');
        },

        diploma(){
            this.$router.push('/student/diplomadetails');
        },

        phd(){
            this.$router.push('/student/phddetails');
				},

				next(){
            this.$router.push('/student/experiencedetails');
        },
        back(){
          this.$router.push('/student/dashboard');
        }
    }

}
</script>
