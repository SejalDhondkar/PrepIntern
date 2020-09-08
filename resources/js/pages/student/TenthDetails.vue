<template>
  <v-card
    outlined
    class="mx-auto"
    width="85%"
  >

    <v-toolbar
      color="purple darken-1"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">X (Secondary) Details</v-toolbar-title>

    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="p-4">

              <p class="font-weight-medium">Matriculation status:</p>
              <v-radio-group v-model="student.status" row>
                <v-radio label="Pursuing" value="pursuing"></v-radio>
                <v-radio label="Completed" value="completed"></v-radio>
            	</v-radio-group>

							<v-row>

							<v-col cols="4"
                    class="text-center">
                        <v-subheader>Board</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.board"
                          label=""
                          class="purple-input mr-4"
                          required
                          :error-messages="boardError"
                          @input="$v.student.board.$touch()"
                          @blur="$v.student.board.$touch()"
                        />
                    </v-col>

										<v-col cols="4"
                    class="text-center">
                        <v-subheader>Year of completion:</v-subheader>
                    </v-col>

										<v-col cols="8">
                      <v-menu offset-y>
                      <template v-slot:activator="{ on }">
                        <v-text-field
                          v-model="student.year_of_completion"
                          label=""
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
                                  @click="student.year_of_completion=year"
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
                        <v-subheader>School:</v-subheader>
                    </v-col>

                    <v-col cols="8">
                      <v-text-field
                          v-model="student.school_name"
                          label=""
                          class="purple-input mr-4"
                          required
                          :error-messages="schoolError"
                          @input="$v.student.school_name.$touch()"
                          @blur="$v.student.school_name.$touch()"
                        />
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
      student: {
        school_name: { required },
        board: { required },
      }      
   },
    data() {
      return {
        student: {
						status: '',
						school_name: '',
						board: '',
						year_of_completion: '',
            gpa_score: '',
				},
				year: 1,
				year_list: ['2022','2021','2020','2019','2018','2017','2016','2015',
										'2014','2013','2012','2011','2010','2009','2008','2007','2006','2005',
										'2004','2003','2002','2001','2000','1999','1998','1997','1996','1995',
										'1994','1993','1992','1991','1990','1989','1988','1987','1986','1985'],
      }
  },

created(){
    this.$store.commit('SET_LAYOUT', 'student-layout');
    this.axios.get('/student/tenthdetails/edit').then((response) => {
            this.student = response.data;
        });
  },

  computed: {
      boardError () {
        const errors = []
        if (!this.$v.student.board.$dirty) return errors
        !this.$v.student.board.required && errors.push('This field is required.')
        return errors
      },
      schoolError () {
        const errors = []
        if (!this.$v.student.school_name.$dirty) return errors
        !this.$v.student.school_name.required && errors.push('This field is required.')
        return errors
      },
    },


  methods: {

    submit() {
      this.$v.$touch();
        if (this.$v.$invalid) {
          console.log("invalid");
        } else {console.log("valid");
        this.errors = {};
        axios.post('/student/tenthdetails', this.student).then(response => {
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

	}

  }
</script>
