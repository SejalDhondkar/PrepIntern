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
      <v-toolbar-title>All Students</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          
        <v-container class="p-4">
            <v-data-table
							:headers="headers"
							:items="students"
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
            text: 'User ID',
            align: 'start',
            sortable: true,
            value: 'id',
          },
          { text: 'Name', value: 'name' },
          { text: 'Email', value: 'email' },
          { text: 'Contact No', value: 'contact_no' },
					{ text: 'Registered at', value: 'created_at'},
				  { text: 'Action', value: 'actions', sortable: false },
					
          
        ],
        students: [],
      }
    },

		created() {
      this.$store.commit('SET_LAYOUT', 'admin-layout');   
			axios.get('/admin/allstudents/list').then(response => {
						this.students = response.data;					
      });
		},
    methods:
    {
      view(item)
      {
        this.$route.params.id = item.id;
        this.$router.push(`/admin/allstudents/${this.$route.params.id}/details`);     
      }
    }
    
}
</script>