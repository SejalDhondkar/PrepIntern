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
      <v-toolbar-title>Internships Posting</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          
        <v-container class="p-4">
            <v-data-table
							:headers="headers"
							:items="posts"
							class="elevation-1"
					></v-data-table>
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
            value: 'id',
          },
          { text: 'Company Name', value: 'name' },
					{ text: 'Internship post ID', value: 'id' },
					{ text: 'Created at', value: 'created_at'},
					{ text: 'Is Verified', value: 'is_verified'},
					
          
        ],
        posts: [],
      }
    },

		created() {
			axios.get('/admin/internships/index').then(response => {
						this.posts= response.data;
						console.log(this.posts);					
      });
		},
  
    
}
</script>