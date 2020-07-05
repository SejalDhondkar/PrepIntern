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
      <v-toolbar-title>Dashboard (List of Users)</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          
        <v-container class="p-4">
 
          <v-radio-group v-model="group.role_id" row @change="status()">
                <v-radio label="All Users" value="0"></v-radio>
                <v-radio label="Students" value="5"></v-radio>
                <v-radio label="Companies" value="4"></v-radio>
                <v-radio label="Admins" value="1"></v-radio>
            	</v-radio-group> 

            <v-data-table
							:headers="headers"
							:items="users"
							class="elevation-1"
					>
       
            
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
            text: 'id',
            align: 'start',
            sortable: true,
            value: 'id',
          },
          { text: 'Name', value: 'name'},
          { text: 'Email', value: 'email'},
					{ text: 'Contact Number', value: 'contact_no',  },
					
          
        ],
        users: [],
        group: {
          role_id: "0",
        }
        
      }
    },

		created() {
      this.$store.commit('SET_LAYOUT', 'admin-layout');
			axios.get('/admin/users/list').then(response => {
            this.users = response.data;
      });
    },

    methods:{
      status(){
        axios.get('/admin/users/sort',{params: {status: this.group.role_id}}).then(response => {       
            this.users = response.data;
      });
      },
    } 
    
  
    
}
</script> 