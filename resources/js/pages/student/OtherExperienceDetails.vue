<template>
  <v-card
    raised
    class="mx-auto"
    width="500"
    min-height="300"
  >
    
    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title>Other Experience Details</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          
        <v-container class="px-4 text-center">
            <v-btn class="ma-2" outlined color="indigo" @click="position()">Add New Position of Responsibility</v-btn><br>
            <v-btn class="ma-2" outlined color="indigo" @click="training()">Add New Training Details</v-btn><br>
						<v-btn class="ma-2" outlined color="indigo" @click="project()">Add New Project details</v-btn>
						<br><br><br><br><br>
            
        <v-row>
					<v-col
						cols="6"
						class="text-left"
					>
						<v-btn
							color="primary"
							@click="previous()"
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
        position(){
            this.$router.push('/student/positionofresponsibility');
        },

        training(){
            this.$router.push('/student/trainingdetails');
				},
				
				project(){
            this.$router.push('/student/projectdetails');
        },

        previous(){
            this.$router.push('/student/experiencedetails');
				},
				
				next(){
            this.$router.push('/student/otherdetails');
        },
    }
  
}
</script>