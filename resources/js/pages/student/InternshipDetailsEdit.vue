<template>
  <v-card
    raised
    class="mx-auto"
    width="85%"
  >

    <v-toolbar
      color="yellow darken-1"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Internship Details</v-toolbar-title>

    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="p-4">

							<v-row>

              <v-col cols="4"
                    class="text-center">
                        <v-subheader>Position:</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.position"
                          label=""
                          class="purple-input mr-4"
                          :error-messages="positionError"
                          required
                          @input="$v.student.position.$touch()"
                          @blur="$v.student.position.$touch()"
                        />
                    </v-col>

                    <v-col cols="4"
                    class="text-center">
                        <v-subheader>Organization:</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.organization"
                          label=""
                          class="purple-input mr-4"
                          :error-messages="orgError"
                          required
                          @input="$v.student.organization.$touch()"
                          @blur="$v.student.organization.$touch()"
                        />
                    </v-col>

                    <v-col cols="4"
                    class="text-center">
                        <v-subheader>Location:</v-subheader>
                    </v-col>

                    <v-col cols="8">
                    <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="citysearchquery"
                          label=""
                          class="purple-input mr-4"
                          v-on:keyup="autoCompleteCity"
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
                                  @click="selectCity(data)"
                                >
                                  <v-list-item-content>
                                    <v-list-item-title v-text="data.name"></v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                            </v-list>
											</v-menu>
                      <v-checkbox
                        v-model="checkbox"
                        label="Is work from home"
                        @change="checkCity"
                      ></v-checkbox>
                    </v-col>

                    <v-col
                      cols="6">
                        <v-menu
                          ref="menu1"
                          v-model="menu1"
                          :close-on-content-click="false"
                          :return-value.sync="student.start_date"
                          transition="scale-transition"
                          offset-y
                          min-width="290px"
                        >
                          <template v-slot:activator="{ on }">
                            <v-text-field
                              v-model="student.start_date"
                              label="Start Date"
                              readonly
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-date-picker v-model="student.start_date" color="green lighten-1" no-title scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu1 = false">Cancel</v-btn>
                            <v-btn text color="primary" @click="$refs.menu1.save(student.start_date)">OK</v-btn>
                          </v-date-picker>
                        </v-menu>
                    </v-col>

                    <v-col
                      cols="6">
                        <v-menu
                          ref="menu2"
                          v-model="menu2"
                          :close-on-content-click="false"
                          :return-value.sync="student.end_date"
                          transition="scale-transition"
                          offset-y
                          min-width="290px"
                        >
                          <template v-slot:activator="{ on }">
                            <v-text-field
                              v-model="student.end_date"
                              label="End Date"
                              readonly
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-date-picker v-model="student.end_date" color="green lighten-1" no-title scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu2 = false">Cancel</v-btn>
                            <v-btn text color="primary" @click="$refs.menu2.save(student.end_date)">OK</v-btn>
                          </v-date-picker>
                        </v-menu>
                        <v-checkbox
                          v-model="checkbox2"
                          label="Currently working here"
                          @change="checkJob"
                      ></v-checkbox>
                    </v-col>

                  <v-col cols="4"
                    class="text-center">
                        <v-subheader>Description:<br>(Provide link of your work if possible)</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-textarea
                          v-model="student.description"
                          label=""
                          class="purple-input mr-4"
                          :error-messages="descError"
                          required
                          @input="$v.student.description.$touch()"
                          @blur="$v.student.description.$touch()"
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
      student: {
        position: { required },
        organization: { required },
        description: { required },
      }
   },
    data() {
      return {
        student: [],
        citysearchquery: '',
        city_data_results: [],
        data: 1,
        checkbox: false,
        checkbox2: false,
        menu1: false,
        menu2: false,
      }
  },

  created(){
		this.$store.commit('SET_LAYOUT', 'student-layout');
		this.axios.get(`/student/internshipdetails/${this.$route.params.id}/edit`).then((response) => {
						this.student = response.data;
						if(this.student.is_work_from_home==0){
							this.citysearchquery = this.student.city_name;
							this.checkbox = false;
						}
						if(this.student.is_work_from_home==1){
							this.citysearchquery = 'Work From Home';
							this.checkbox = true;
						}
						if(this.student.is_currently_working==0){
							this.checkbox2 = false;
						}
						if(this.student.is_currently_working==1){
							this.checkbox2 = true;
						}

						console.log(this.student);
        });
  },

computed: {
      positionError () {
        const errors = []
        if (!this.$v.student.position.$dirty) return errors
        !this.$v.student.position.required && errors.push('This field is required.')
        return errors
      },
      orgError () {
        const errors = []
        if (!this.$v.student.organization.$dirty) return errors
        !this.$v.student.organization.required && errors.push('This field is required.')
        return errors
      }, 
      descError () {
        const errors = []
        if (!this.$v.student.description.$dirty) return errors
        !this.$v.student.description.required && errors.push('This field is required.')
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
        axios.post(`/student/internshipdetails/${this.$route.params.id}/update`, this.student).then(response => {
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

    autoCompleteCity(){
        this.city_data_results = [];
        if(this.citysearchquery.length > 2){
         axios.get('/student/internships/citysearch',{params: {citysearchquery: this.citysearchquery}}).then(response => {
          this.city_data_results = response.data;
         });
        }
    },

    selectCity(data){
      this.citysearchquery = data.name;
      this.city_data_results.length = false;
      this.student.city_id = data.id;
    },

    checkCity(){
      if (this.checkbox==true) {
        this.student.city_id = null;
        this.citysearchquery = 'Work From Home';
        this.student.is_work_from_home = 1;
      } else {
        this.student.city_id = null;
        this.citysearchquery = '';
        this.student.is_work_from_home = 0;
      }
    },

    checkJob(){
      if (this.checkbox2==true) {
        this.student.is_currently_working = 1;
      } else {
        this.student.is_currently_working = 0;
      }
    }
  }
  }
</script>
