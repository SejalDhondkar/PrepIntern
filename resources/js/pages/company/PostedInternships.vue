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
      <v-toolbar-title>Posted Internships</v-toolbar-title>

    </v-card-text>
    </v-toolbar>

        <v-container class="p-4">
            <v-data-table
							:headers="headers"
							:items="posts"
							class="elevation-1"
					>
          <template v-slot:item.actions="{ item }">
            <v-btn class="ma-2" color="blue dark-3" dark @click="view(item)">View Applications</v-btn>
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
            text: 'Profile',
            align: 'start',
            sortable: true,
            value: 'profile_name',
          },
					{ text: 'Posted at', value: 'created_at'},
					{ text: 'Action', value: 'actions', sortable: false },


        ],
        posts: [],
        data: [],
        flag: '',
      }
    },

    beforeCreate(){
    axios.get('/company/verify/access').then(response => {
            this.flag = response.data;
            if (this.flag == true) {
              console.log("Continue");
            } else {
              this.$router.push('/company/dashboard');
              console.log("redirected");
            }
      });
  },

		created() {
      this.$store.commit('SET_LAYOUT', 'company-layout');
			axios.get('/company/view/internships').then(response => {
						this.posts= response.data;
      });
    },

    methods: {
      view(item){
        this.data = item;
        this.$route.params.id = item.id;
        this.$router.push(`/company/view/${this.$route.params.id}/applications`);

         }
    }


}
</script>
