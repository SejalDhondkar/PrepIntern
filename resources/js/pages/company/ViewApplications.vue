<template>
  <v-card
    raised
    class="mx-auto"
    width="80%"
    min-height="400"
  >
    
    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title>Posted Internships</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          
        <v-container class="p-4">
            <v-data-table
							:headers="headers"
							:items="applications"
							class="elevation-1"
					>
          <!-- <template v-slot:item.status="{ item }">
            <v-chip class="ma-2"></v-chip>
            </template> -->
          <template v-slot:item.actions="{ item }">
            <v-btn class="ma-2" color="blue dark-3" dark @click="view(item)" >View</v-btn>
            <!-- <v-btn class="ma-2" color="yellow dark-3" dark @click="shortlist(item)" >Shortlist</v-btn>
            <v-btn class="ma-2" color="green dark-3" dark @click="accept(item)" >Accept</v-btn>
            <v-btn class="ma-2" color="red dark-3" dark @click="reject(item)" >Reject</v-btn> -->
          </template>
          </v-data-table>
        </v-container>
        
        
  </v-card>

      
</template>

<script>
export default {
    data(){
      return {
        headers: [
          {
            text: 'Applicants',
            align: 'start',
            sortable: true,
            value: 'student_name',
          },
          { text: 'Applied at', value: 'created_at'},
          { text: 'Status', value: 'status'},
					{ text: 'Action', value: 'actions', sortable: false },
					
          
        ],
        applications: [],
      }
    },

		created() {
			axios.get(`/company/view/${this.$route.params.id}/applications`).then(response => {
						this.applications = response.data;
						console.log(response.data);
      });
    },
    
    methods: {
      view(item){
        this.$route.params.id = item.id;
        this.$router.push(`/company/view/${this.$route.params.id}/response`);
      }
    }
  
    
}
</script> 