<template>
  <v-card outlined
          class="mx-auto"
          width="85%">

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
                          :error-messages="collegeError"
                          required
                          @input="$v.collegesearchquery.$touch()"
                          @blur="$v.collegesearchquery.$touch()"
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
                          required
                          :error-messages="degreeError"
                          @input="$v.degreesearchquery.$touch()"
                          @blur="$v.degreesearchquery.$touch()"
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
                          v-model="student.gpa_score"
                          label="Enter your GPA"
                          class="purple-input mr-4"
                        />
                    </v-col>



                <v-col
                  cols="6"
                  class="text-left"
                >
                  <v-btn
                    color="primary"
                    @click="back"
                  >
                    Back
                  </v-btn>
                </v-col>

							<v-col
                  cols="6"
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
import { validationMixin } from 'vuelidate'
import { required } from 'vuelidate/lib/validators'
  export default {
  mixins: [validationMixin],
  validations: {
      collegesearchquery: { required },
      degreesearchquery: { required },
   },
    data() {
      return {
        student: {
            status: '',
            college_id: '',
            start_year: '',
            end_year: '',
            degree_id: '',
            stream_id: '',
            gpa_score: '',
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

  created(){
    this.$store.commit('SET_LAYOUT', 'student-layout');
    this.axios.get('/student/diplomadetails/edit').then((response) => {
            this.student = response.data;
            this.collegesearchquery = response.data.college_name;
            this.streamsearchquery = response.data.stream_name;
            this.degreesearchquery = response.data.degree_name;
        });
  },

    computed: {
      collegeError () {
        const errors = []
        if (!this.$v.collegesearchquery.$dirty) return errors
        !this.$v.collegesearchquery.required && errors.push('This field is required.')
        return errors
      },
      degreeError () {
        const errors = []
        if (!this.$v.degreesearchquery.$dirty) return errors
        !this.$v.degreesearchquery.required && errors.push('This field is required.')
        return errors
      },
      
    },


  methods: {

    submit() {
      this.$v.$touch();
        if (this.$v.$invalid) {
          console.log("invalid");
        } else {
        console.log("valid");
        this.errors = {};
        axios.post('/student/diplomadetails', this.student).then(response => {
          this.$router.go(-1);
        }).catch(error => {
          if (error.response.status === 422) {
          console.log("error");
          }
        });
      }   
    },

    back(){
      this.$router.go(-1);
    },

		autoCompleteCollege(){
        this.data_results = [];
        // console.log(this.searchquery);
        if(this.collegesearchquery.length > 2){
         axios.get('/student/collegesearch',{params: {collegesearchquery: this.collegesearchquery}}).then(response => {
          this.data_results = response.data;
         });
        }
    },

    selectCollege(data){
      this.collegesearchquery = data.name;
      this.data_results.length = false;
      this.student.college_id = data.id;
		},

		autoCompleteDegree(){
        this.data_results = [];
        // console.log(this.searchquery);
        if(this.degreesearchquery.length > 2){
         axios.get('/student/degreesearch',{params: {degreesearchquery: this.degreesearchquery}}).then(response => {
          this.data_results = response.data;
         });
        }
    },

    selectDegree(data){
      this.degreesearchquery = data.title;
      this.data_results.length = false;
      this.student.degree_id = data.id;
		},

		autoCompleteStream(){
        this.data_results = [];
        // console.log(this.searchquery);
        if(this.streamsearchquery.length > 2){
         axios.get('/student/streamsearch',{params: {streamsearchquery: this.streamsearchquery}}).then(response => {
          this.data_results = response.data;
         });
        }
    },

    selectStream(data){
      this.streamsearchquery = data.title;
      this.data_results.length = false;
      this.student.stream_id = data.id;
    }

  }






  }
</script>
