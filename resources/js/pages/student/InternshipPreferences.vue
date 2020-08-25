<template>
  <v-card
    raised
    class="mx-auto"
    width="85%"
  >

    <v-toolbar
      color="green dark-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Internship Preferences</v-toolbar-title>

    </v-card-text>
    </v-toolbar>
          <v-container class="p-4 m-4">
						<p class="font-weight-medium">In which fields are you looking for internship?</p>
						<v-container >

									<v-select
										v-model="student.fields[0]"
										label="Select your preference 1"
										:items="fields_list"
										item-text="title"
										item-value="id"
										solo
										dense
										return-object
									></v-select>

									<v-select
										v-model="student.fields[1]"
										label="Select your preference 2"
										:items="fields_list"
										item-text="title"
										item-value="id"
										solo
										dense
										return-object
									></v-select>

									<v-select
										v-model="student.fields[2]"
										label="Select your preference 3"
										:items="fields_list"
										item-text="title"
										item-value="id"
										solo
										dense
										return-object
									></v-select>

						</v-container>


							<p class="font-weight-medium">What type of internship are you interested in?</p>
								<v-radio-group v-model="student.type_of_internship_id">
										<v-radio
											v-for="(int,n) in this.type_of_int"
											:key="n"
											:label="int.name"
											:value="int.id"
											return-object
											@change="city(int.id)"
										></v-radio>
									</v-radio-group>

							<div v-if="show_city">
							<p class="font-weight-medium">In which cities would you like to do your internship?</p>

											<v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="citysearchquery1"
                          label="City preference 1"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteCity1"
													v-on="on"
                        />
                      </template>
                            <v-list v-if="city_data_results.length"
																	style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in city_data_results"
                                  :key="i"
                                  @click="selectCity1(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.name"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
											</v-menu>

											<v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="citysearchquery2"
                          label="City preference 2"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteCity2"
													v-on="on"
                        />
                      </template>
                            <v-list v-if="city_data_results.length"
																	style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in city_data_results"
                                  :key="i"
                                  @click="selectCity2(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.name"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
											</v-menu>

											<v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="citysearchquery3"
                          label="City preference 3"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteCity3"
													v-on="on"
                        />
                      </template>
                            <v-list v-if="city_data_results.length"
																	style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in city_data_results"
                                  :key="i"
                                  @click="selectCity3(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.name"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
											</v-menu>
							</div>



          </v-container>
					<v-row class="px-4">

					<v-col
                  cols="12"
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
					fields: [],
					type_of_internship_id: '',
					city_preferences: [],
				},
				citysearchquery1: '',
				citysearchquery2: '',
				citysearchquery3: '',
				city_data_results: [],
				counter: 2,
				i: 2,
				data: 1,
				show_city: false,
				fields_list: [],
				radioGroup: [],
				type_of_int: [
					{name:'Full time internships only', id:1},
					{name:'Work from home/ Part time (in your city) internships only', id:2},
					{name:'Both', id:3},
				],
				flag: '',

			}
		},

		beforeCreate() {
    axios.get('/student/internships/check',{params: {flag: this.flag}}).then(response => {
            this.flag = response.data;
            if (this.flag) {
              console.log("Continue")
            } else {
              this.$router.push('/student/primarydetails');
              console.log("redirected")
            }
         });
  },

		created() {
      this.$store.commit('SET_LAYOUT', 'student-layout');
			axios.get('/student/internships/fields').then(response => {
						this.fields_list= response.data;
			});
		},

		methods: {

			submit(){
				this.errors = {};
					axios.post('/student/internshippreferences', this.student).then(response => {
						this.$router.push('/student/addskills');
					}).catch(error => {
						if (error.response.status === 422) {
						console.log("error");
						}
					});
			},

			city(id){
				if (id==1 || id==3) {
					this.show_city = true;
				}else{
					this.show_city = false;
				}
			},
			autoCompleteCity1(){
        this.city_data_results = [];
        if(this.citysearchquery1.length > 2){
         axios.get('/student/internships/citysearch',{params: {citysearchquery: this.citysearchquery1}}).then(response => {
          this.city_data_results = response.data;
         });
        }
		},

		autoCompleteCity2(){
        this.city_data_results = [];
        if(this.citysearchquery2.length > 2){
         axios.get('/student/internships/citysearch',{params: {citysearchquery: this.citysearchquery2}}).then(response => {
         this.city_data_results = response.data;
         });
        }
		},

		autoCompleteCity3(){
        this.city_data_results = [];
        if(this.citysearchquery3.length > 2){
         axios.get('/student/internships/citysearch',{params: {citysearchquery: this.citysearchquery3}}).then(response => {
         this.city_data_results = response.data;
         });
        }
    },


    selectCity1(data){
      this.citysearchquery1 = data.name;
      this.city_data_results.length = false;
      this.student.city_preferences[0] = data.id;
		},

		selectCity2(data){
      this.citysearchquery2 = data.name;
      this.city_data_results.length = false;
      this.student.city_preferences[1] = data.id;
		},

		selectCity3(data){
      this.citysearchquery3 = data.name;
      this.city_data_results.length = false;
      this.student.city_preferences[2] = data.id;
    },

		}
}
</script>
