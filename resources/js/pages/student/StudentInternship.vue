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
      <v-toolbar-title>Applied Internships</v-toolbar-title>

    </v-card-text>
    </v-toolbar>

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
            text: 'Company Name',
            align: 'start',
            sortable: true,
            value: 'company_name',
          },

          { text: 'Profile Name', value: 'profile_name' },
          { text: 'Status', value: 'status' },
		      { text: 'Action', value: 'actions', sortable: false },


        ],
        posts: [],


      }
    },

		created() {
            this.$store.commit('SET_LAYOUT', 'student-layout');
			axios.get('/student/studentinternship').then(response => {
			this.posts = response.data;
      console.log(this.posts);
      });

    },

    methods:{
      view(item){
        this.$route.params.id = item.id;
        this.$router.push(`/student/viewstudentinternship/${this.$route.params.id}/details`);
      },
      back(){
        this.$router.go(-1);
      },
    }
}
</script>
