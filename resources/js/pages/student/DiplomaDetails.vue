<template>
  <v-card
    outlined
    class="mx-auto"
    width="450"
  >
    
    <v-toolbar
      color="purple darken-1"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Diploma Details</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="p-4">

              <p class="font-weight-medium">Diploma status:</p>
              <v-radio-group v-model="student.status" row>
                <v-radio label="Pursuing" value="pursuing"></v-radio>
                <v-radio label="Completed" value="completed"></v-radio>
            	</v-radio-group>

							<v-row>

							<v-col cols="4"
                    class="text-center">
                        <v-subheader>College</v-subheader>
                    </v-col>

                    <v-col cols="8">
                      <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="collegesearchquery"
                          label="Type to search colleges"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteCollege"
                          v-on="on"
                        />
                      </template>
                        
                            <v-list v-if="data_results.length"
																		style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in data_results"
                                  :key="i"
                                  @click="selectCollege(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.name"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
                      </v-menu>
                    </v-col>

										<v-col cols="6">
                      <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="student.start_year"
                          label="Start Year"
                          class="purple-input mr-4"
                          v-on="on"
                        />
                      </template>
                        
                            <v-list style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="year" color="primary">
                                <v-list-item
                                  v-for="(year, i) in year_list"
                                  :key="i"
                                  @click="student.start_year=year"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="year"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
                      </v-menu>
                    </v-col>

										<v-col cols="6">
                      <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="student.end_year"
                          label="End Year"
                          class="purple-input mr-4"
                          v-on="on"
                        />
                      </template>
                        
                            <v-list style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="year" color="primary">
                                <v-list-item
                                  v-for="(year, i) in year_list"
                                  :key="i"
                                  @click="student.end_year=year"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="year"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
                      </v-menu>
                    </v-col>


										<v-col cols="4"
                    class="text-center">
                        <v-subheader>Degree</v-subheader>
                    </v-col>

                    <v-col cols="8">
                      <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="degreesearchquery"
                          label="Type to search Degree"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteDegree"
                          v-on="on"
                        />
                      </template>
                        
                            <v-list v-if="data_results.length"
																		style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in data_results"
                                  :key="i"
                                  @click="selectDegree(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.title"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
                      </v-menu>
                    </v-col>

										<v-col cols="4"
                    class="text-center">
                        <v-subheader>Stream</v-subheader>
                    </v-col>

                    <v-col cols="8">
                      <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="streamsearchquery"
                          label="Type to search Stream"
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteStream"
                          v-on="on"
                        />
                      </template>
                        
                            <v-list v-if="data_results.length"
																		style="max-height: 250px"
       														class="overflow-y-auto">
                              <v-list-item-group v-model="data" color="primary">
                                <v-list-item
                                  v-for="(data, i) in data_results"
                                  :key="i"
                                  @click="selectStream(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.title"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
                      </v-menu>
                    </v-col>

                    <v-col cols="4"
                    class="text-center">
                        <v-subheader>GPA/Score:</v-subheader>
                    </v-col>

                    <v-col cols="8">
                      <v-text-field
                          v-model="student.score"
                          label="Enter your GPA"
                          class="purple-input mr-4"
                        />
                    </v-col>



						
							<v-col
                  cols="12"
                  class="text-right"
                >
                  <v-btn
                    color="success"
                    @click="submit"
                  >
                    Save
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        
  </v-card>

      
</template>

<script>
  export default {
    data() {
      return {
        student: {
            status: '',
            college_id: '',
            start_year: '',
            end_year: '',
            degree_id: '',
            stream_id: '',
            score: '',
				},
				collegesearchquery: '',
				degreesearchquery: '',
				streamsearchquery: '',
        data: 1,
				data_results: [],
				year: 1,
				year_list: ['2024','2023','2022','2021','2020','2019','2018','2017','2016','2015',
										'2014','2013','2012','2011','2010','2009','2008','2007','2006','2005',
										'2004','2003','2002','2001','2000','1999','1998','1997','1996','1995',
										'1994','1993','1992','1991','1990','1989','1988','1987','1986','1985'],
      }
  },

  
  methods: {

    submit() {
      this.errors = {};
      axios.post('/student/diplomadetails', this.student).then(response => {
        console.log(this.student);
        this.$router.push('/student/educationdetails');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      
		},
		
		autoCompleteCollege(){
        this.data_results = [];
        // console.log(this.searchquery);
        if(this.collegesearchquery.length > 2){
         axios.get('/student/collegesearch',{params: {collegesearchquery: this.collegesearchquery}}).then(response => {
            console.log(response);
          this.data_results = response.data;
         });
        }
    },

    selectCollege(data){
      this.collegesearchquery = data.name;
      this.data_results.length = false;
      this.student.college_id = data.id;
      console.log(this.student.college_id);
		},
		
		autoCompleteDegree(){
        this.data_results = [];
        // console.log(this.searchquery);
        if(this.degreesearchquery.length > 2){
         axios.get('/student/degreesearch',{params: {degreesearchquery: this.degreesearchquery}}).then(response => {
            console.log(response);
          this.data_results = response.data;
         });
        }
    },

    selectDegree(data){
      this.degreesearchquery = data.title;
      this.data_results.length = false;
      this.student.degree_id = data.id;
      console.log(this.student.degree_id);
		},
		
		autoCompleteStream(){
        this.data_results = [];
        // console.log(this.searchquery);
        if(this.streamsearchquery.length > 2){
         axios.get('/student/streamsearch',{params: {streamsearchquery: this.streamsearchquery}}).then(response => {
            console.log(response);
          this.data_results = response.data;
         });
        }
    },

    selectStream(data){
      this.streamsearchquery = data.title;
      this.data_results.length = false;
      this.student.stream_id = data.id;
      console.log(this.student.stream_id);
    }

  }   
  
    
  

  
  
  }
</script>