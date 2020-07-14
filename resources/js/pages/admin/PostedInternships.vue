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
 
          <v-radio-group v-model="group.is_verified" row @change="status()">
                <v-radio label="Selected" value="1"></v-radio>
                <v-radio label="Rejected" value="2"></v-radio>
            	</v-radio-group> 

            
          
        </v-container>
        <v-container class="p-4">
            <v-data-table
							:headers="headers"
							:items="posts"
							class="elevation-1"
					>
          <template v-slot:item.actions="{ item }">
            <v-btn class="ma-2" color="blue dark-3" dark @click="view(item)" >View Details</v-btn>
          </template>
          </v-data-table>
          <v-row>
            <v-col cols="12"
              class="text-left">
              <br>
              <v-btn              
              color="primary"
              @click="back"
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
        headers: [
          {
            text: 'Company ID',
            align: 'start',
            sortable: true,
            value: 'company_id',
          },
          { text: 'Company Name', value: 'company_name' },
          { text: 'Internship post ID', value: 'id' },
          { text: 'Profile Name', value: 'profile_name' },
		  { text: 'Created at', value: 'created_at'},
		  { text: 'Action', value: 'actions', sortable: false },
					
          
        ],
        posts: [],
        group: {
          is_verified: "1",
        }
        
      }
    },

		created() {
            this.$store.commit('SET_LAYOUT', 'admin-layout');   
			axios.get('/admin/postedinternships').then(response => {
			this.posts = response.data;	
      });
        
    },
    
    methods:{
      view(item){
        this.$route.params.id = item.id;
        this.$router.push(`/admin/viewpostedinternships/${this.$route.params.id}/details`);
      },
      back(){
        this.$router.go(-1);
      },
      status(){
        axios.get('/admin/postedinternships/sort',{params: {status: this.group.is_verified}}).then(response => {       
            this.posts = response.data;
      });
      },
    }   
}
</script>