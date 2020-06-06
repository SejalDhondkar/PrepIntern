<template>
  <v-card
    raised
    class="mx-auto"
    width="500"
  >
    
    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title>Edit Details</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          
        <v-container class="px-4 text-center">
            <v-btn class="ma-2" outlined color="indigo" @click="primary()">Primary Details</v-btn><br>
            <v-btn class="ma-2" outlined color="indigo" @click="address()">Address</v-btn><br>
            <v-btn class="ma-2" outlined color="indigo" @click="additional()">Additional Details</v-btn><br>
						<v-btn class="ma-2" outlined color="indigo" @click="social()">Social Media Links</v-btn>
        
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
    this.$store.commit('SET_LAYOUT', 'company-layout');
  },

    methods: {
        primary(){
            this.$router.push('/company/primarydetails/edit');
        },

        address(){
            this.$router.push('/company/address/edit');
        },

        additional(){
            this.$router.push('/company/additionaldetails/edit');
        },

				social(){
            this.$router.push('/company/socialmedialinks/edit');
        },

        back(){
            this.$router.push('/company/dashboard');
        },
    }
  
}
</script>