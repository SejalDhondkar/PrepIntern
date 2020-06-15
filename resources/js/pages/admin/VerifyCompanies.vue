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
      <v-toolbar-title>Registered Companies</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          
        <v-container class="p-4">
            <v-data-table
							:headers="headers"
							:items="companies"
							class="elevation-1"
					>
          <template v-slot:item.actions="{ item }">
            <v-btn class="ma-2" color="green dark-3" dark @click="accept(item)" >Accept</v-btn>
            <v-btn class="ma-2" color="red dark-3" dark @click="reject(item)" >Reject</v-btn>
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
            value: 'id',
          },
          { text: 'Company Name', value: 'name' },
					{ text: 'Admin ID', value: 'admin_id' },
					{ text: 'Registered at', value: 'created_at'},
          { text: 'Action', value: 'actions', sortable: false },
					
          
        ],
        companies: [],
      }
    },

		created() {
      this.$store.commit('SET_LAYOUT', 'admin-layout');   
			axios.get('/admin/verifycompanies').then(response => {
						this.companies = response.data;
						console.log(this.companies);					
      });
    },
    
    methods:{
      accept(item){
        item.is_verified = 1;
         this.errors = {};
      axios.put(`/admin/verifycompanies/changeverify`,item).then(response => {
        console.log('Verified');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      },
      reject(item) {
        item.is_verified = 0;
        this.errors = {};
      axios.put(`/admin/verifycompanies/changeverify`,item).then(response => {
        console.log('Verified');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      },
    }
  
    
}
</script>