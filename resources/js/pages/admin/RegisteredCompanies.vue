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
      <v-toolbar-title>Companies</v-toolbar-title>

    </v-card-text>
    </v-toolbar>

        <v-container class="p-4">

          <v-radio-group v-model="group.is_verified" row @change="status()">
                <v-radio label="Approved" value="1"></v-radio>
                <v-radio label="Rejected" value="0"></v-radio>
            	</v-radio-group>



        </v-container>
        <v-container class="p-4">
            <v-data-table
							:headers="headers"
							:items="companies"
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
            value: 'id',
          },
          { text: 'Company Name', value: 'name' },
          { text: 'Company Email', value: 'contact_email' },
		      { text: 'Admin ID', value: 'admin_id' },
		      { text: 'Registered at', value: 'created_at'},
          { text: 'Action', value: 'actions', sortable: false },


        ],
        companies: [],
        group: {
          is_verified: "1",
        }
      }
    },

		created() {
            this.$store.commit('SET_LAYOUT', 'admin-layout');
			axios.get('/admin/registeredcompanies').then(response => {
			this.companies = response.data;
      });

    },

    methods:{
      view(item){
        this.$route.params.id = item.id;
        this.$router.push(`/admin/viewregisteredcompanies/${this.$route.params.id}/details`);
      },
      back(){
        this.$router.go(-1);
      },
      status(){
        axios.get('/admin/registeredcompanies/sort',{params: {status: this.group.is_verified}}).then(response => {
            this.companies = response.data;
      });
      },
    }
}
</script>
