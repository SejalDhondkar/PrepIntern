<template>
  <v-card
    raised
    class="mx-auto"
    width="85%"
    min-height="400"
  >
    
    <v-toolbar
      color="blue dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title>Internships Posting</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          
        <v-container class="p-4">
            <v-data-table
							:headers="headers"
							:items="posts"
							class="elevation-1"

					>
            <template v-slot:item.actions="{ item }">
            <v-btn class="ma-2" color="green dark-3" dark @click="view(item)" >View</v-btn>
            
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
      }
    },

		created() {
      this.$store.commit('SET_LAYOUT', 'admin-layout');   
			axios.get('/admin/internships/index').then(response => {
						this.posts= response.data;
						console.log(this.posts);					
      });
		},
    methods:
    {
      view(item)
      {
        this.$route.params.id = item.id;
        this.$router.push(`/admin/${this.$route.params.id}/viewinternshipsdetail`);     
      }
    }
    
}
</script>