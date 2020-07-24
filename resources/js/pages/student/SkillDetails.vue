<template>
  <v-card
    outlined
    class="mx-auto"
    width="85%"
  >

    <v-toolbar
      color="red darken-1"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Skills</v-toolbar-title>

    </v-card-text>
    </v-toolbar>
          <v-container class="p-4 m-4">
						<p class="font-weight-medium">Add your top 5 skills here</p>
											<v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="skillsearchquery1"
                          label="Skill 1"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteSkill1"
													v-on="on"
                        />
                      </template>
                            <v-list v-if="skill_data_results.length"
																	style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in skill_data_results"
                                  :key="i"
                                  @click="selectSkill1(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.title"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
											</v-menu>

											<v-radio-group v-model="student.level_1" row>
													<v-radio
														v-for="(level,n) in this.level_list"
														:key="n"
														:label="level"
														:value="level"
													></v-radio>
												</v-radio-group>

											<v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="skillsearchquery2"
                          label="Skill 2"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteSkill2"
													v-on="on"
                        />
                      </template>
                            <v-list v-if="skill_data_results.length"
																	style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in skill_data_results"
                                  :key="i"
                                  @click="selectSkill2(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.title"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
											</v-menu>

											<v-radio-group v-model="student.level_2" row>
													<v-radio
														v-for="(level,n) in this.level_list"
														:key="n"
														:label="level"
														:value="level"
													></v-radio>
												</v-radio-group>

											<v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="skillsearchquery3"
                          label="Skill 3"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteSkill3"
													v-on="on"
                        />
                      </template>
                            <v-list v-if="skill_data_results.length"
																	style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in skill_data_results"
                                  :key="i"
                                  @click="selectSkill3(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.title"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
											</v-menu>

											<v-radio-group v-model="student.level_3" row>
													<v-radio
														v-for="(level,n) in this.level_list"
														:key="n"
														:label="level"
														:value="level"
													></v-radio>
												</v-radio-group>

                        <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="skillsearchquery4"
                          label="Skill 4"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteSkill4"
													v-on="on"
                        />
                      </template>
                            <v-list v-if="skill_data_results.length"
																	style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in skill_data_results"
                                  :key="i"
                                  @click="selectSkill4(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.title"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
											</v-menu>

											<v-radio-group v-model="student.level_4" row>
													<v-radio
														v-for="(level,n) in this.level_list"
														:key="n"
														:label="level"
														:value="level"
													></v-radio>
												</v-radio-group>

                        <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="skillsearchquery5"
                          label="Skill 5"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteSkill5"
													v-on="on"
                        />
                      </template>
                            <v-list v-if="skill_data_results.length"
																	style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in skill_data_results"
                                  :key="i"
                                  @click="selectSkill5(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.title"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
											</v-menu>

											<v-radio-group v-model="student.level_5" row>
													<v-radio
														v-for="(level,n) in this.level_list"
														:key="n"
														:label="level"
														:value="level"
													></v-radio>
												</v-radio-group>




          </v-container>
					<v-row class="px-4">

            <v-col
                  cols="6"
                  class="text-left"
                >
                  <v-btn
                    color="primary"
                    class="mr-0"
                    @click="previous"
                  >
                    Previous
                  </v-btn>
                </v-col>

					<v-col
                  cols="6"
                  class="text-right"
                >
                  <v-btn
                    color="success"
                    class="mr-0"
                    @click="submit"
                  >
                    Save
                  </v-btn>
                </v-col>
              </v-row>


  </v-card>


</template>

<script>
export default {
    data(){
			return {
				student: {
					skill_1: '',
					skill_2: '',
          skill_3: '',
          skill_4: '',
          skill_5: '',
					level_1: '',
					level_2: '',
          level_3: '',
          level_4: '',
          level_5: '',
          id_1: '',
          id_2: '',
          id_3: '',
          id_4: '',
          id_5: '',
				},
				skillsearchquery1: '',
				skillsearchquery2: '',
        skillsearchquery3: '',
        skillsearchquery4: '',
        skillsearchquery5: '',
				skill_data_results: [],
				counter: 2,
				i: 2,
				data: 1,
				level_list: ['Beginner','Intermediate','Advanced'],
			}
    },

    created(){
    this.$store.commit('SET_LAYOUT', 'student-layout');
    this.axios.get('/student/skilldetails/edit').then((response) => {
            if(response.data[0]){
              this.skillsearchquery1 = response.data[0].skill_name;
              this.student.skill_1 = response.data[0].skill_id;
              this.student.level_1 = response.data[0].level;
              this.student.id_1 = response.data[0].id;
            }
            if(response.data[1]){
              this.skillsearchquery2 = response.data[1].skill_name;
              this.student.skill_2 = response.data[1].skill_id;
              this.student.level_2 = response.data[1].level;
              this.student.id_2 = response.data[1].id;
            }
            if(response.data[2]){
              this.skillsearchquery3 = response.data[2].skill_name;
              this.student.skill_3 = response.data[2].skill_id;
              this.student.level_3 = response.data[2].level;
              this.student.id_3 = response.data[2].id;
            }
            if(response.data[3]){
              this.skillsearchquery4 = response.data[3].skill_name;
              this.student.skill_4 = response.data[3].skill_id;
              this.student.level_4 = response.data[3].level;
              this.student.id_4 = response.data[3].id;
            }
            if(response.data[4]){
              this.skillsearchquery5 = response.data[4].skill_name;
              this.student.skill_5 = response.data[4].skill_id;
              this.student.level_5 = response.data[4].level;
              this.student.id_5 = response.data[4].id;
            }
            // this.student = response.data;
        });
    },

		methods: {

			submit(){
				this.errors = {};
					axios.post('/student/skilldetails', this.student).then(response => {
						this.$router.go(-1);
					}).catch(error => {
						if (error.response.status === 422) {
						console.log("error");
						}
					});
      },

      previous(){
            this.$router.go(-1);
				},

			autoCompleteSkill1(){
        this.skill_data_results = [];
        if(this.skillsearchquery1.length > 2){
         axios.get('/student/skillsearch',{params: {skillsearchquery: this.skillsearchquery1}}).then(response => {
          this.skill_data_results = response.data;
         });
        }
		},

		autoCompleteSkill2(){
        this.skill_data_results = [];
        if(this.skillsearchquery2.length > 2){
         axios.get('/student/skillsearch',{params: {skillsearchquery: this.skillsearchquery2}}).then(response => {
         this.skill_data_results = response.data;
         });
        }
		},

		autoCompleteSkill3(){
        this.skill_data_results = [];
        if(this.skillsearchquery3.length > 2){
         axios.get('/student/skillsearch',{params: {skillsearchquery: this.skillsearchquery3}}).then(response => {
         this.skill_data_results = response.data;
         });
        }
    },

    autoCompleteSkill4(){
        this.skill_data_results = [];
        if(this.skillsearchquery4.length > 2){
         axios.get('/student/skillsearch',{params: {skillsearchquery: this.skillsearchquery4}}).then(response => {
         this.skill_data_results = response.data;
         });
        }
    },

    autoCompleteSkill5(){
        this.skill_data_results = [];
        if(this.skillsearchquery5.length > 2){
         axios.get('/student/skillsearch',{params: {skillsearchquery: this.skillsearchquery5}}).then(response => {
         this.skill_data_results = response.data;
         });
        }
    },


    selectSkill1(data){
      this.skillsearchquery1 = data.title;
      this.skill_data_results.length = false;
      this.student.skill_1 = data.id;
		},

		selectSkill2(data){
      this.skillsearchquery2 = data.title;
      this.skill_data_results.length = false;
      this.student.skill_2 = data.id;
		},

		selectSkill3(data){
      this.skillsearchquery3 = data.title;
      this.skill_data_results.length = false;
      this.student.skill_3 = data.id;
    },

    selectSkill4(data){
      this.skillsearchquery4 = data.title;
      this.skill_data_results.length = false;
      this.student.skill_4 = data.id;
    },

    selectSkill5(data){
      this.skillsearchquery5 = data.title;
      this.skill_data_results.length = false;
      this.student.skill_5 = data.id;
    },

		}
}
</script>
