<template>
  <v-card
    outlined
    class="mx-auto"
    width="85%"
  >

    <v-toolbar
      color="yellow darken-1"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Project Details</v-toolbar-title>

    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="p-4">

							<v-row>

              <v-col cols="4"
                    class="text-center">
                        <v-subheader>Title:</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.project_name"
                          label=""
                          class="purple-input mr-4"
                          :error-messages="project_nameError"
                          required
                          @input="$v.student.project_name.$touch()"
                          @blur="$v.student.project_name.$touch()"
                        />
                    </v-col>



                    <v-col
                      cols="6">
                        <v-menu
                          ref="menu1"
                          v-model="menu1"
                          :close-on-content-click="false"
                          :return-value.sync="student.start_month"
                          transition="scale-transition"
                          offset-y
                          min-width="290px"
                        >
                          <template v-slot:activator="{ on }">
                            <v-text-field
                              v-model="student.start_month"
                              label="Start Month"
                              readonly
                              v-on="on"
                              :error-messages="start_monthError"
                              required
                              @input="$v.student.start_month.$touch()"
                              @blur="$v.student.start_month.$touch()"
                            ></v-text-field>
                          </template>
                          <v-date-picker v-model="student.start_month" type="month" color="green lighten-1" no-title scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu1 = false">Cancel</v-btn>
                            <v-btn text color="primary" @click="$refs.menu1.save(student.start_month)">OK</v-btn>
                          </v-date-picker>
                        </v-menu>
                    </v-col>

                    <v-col
                      cols="6">
                        <v-menu
                          ref="menu2"
                          v-model="menu2"
                          :close-on-content-click="false"
                          :return-value.sync="student.end_month"
                          transition="scale-transition"
                          offset-y
                          min-width="290px"
                        >
                          <template v-slot:activator="{ on }">
                            <v-text-field
                              v-model="student.end_month"
                              label="End Month"
                              readonly
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-date-picker v-model="student.end_month" type="month" color="green lighten-1" no-title scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu2 = false">Cancel</v-btn>
                            <v-btn text color="primary" @click="$refs.menu2.save(student.end_month)">OK</v-btn>
                          </v-date-picker>
                        </v-menu>
                        <v-checkbox
                          v-model="checkbox2"
                          label="Currently ongoing"
                          @change="checkOngoing"
                      ></v-checkbox>
                    </v-col>

                  <v-col cols="4"
                    class="text-center">
                        <v-subheader>Description:</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.description"
                          label=""
                          class="purple-input mr-4"
                          :error-messages="descError"
                          required
                          @input="$v.student.description.$touch()"
                          @blur="$v.student.description.$touch()"
                        />
                    </v-col>

										<v-col cols="4"
                    class="text-center">
                        <v-subheader>Project Link:</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="student.project_link"
                          label=""
                          class="purple-input mr-4"
                          :error-messages="project_linkError"
                          required
                          @input="$v.student.project_link.$touch()"
                          @blur="$v.student.project_link.$touch()"
                        />
                        <br><p class="caption">(* Provide link of images/video if project link is not available)</p>
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
        project_name: { required },
        start_month: { required },
        project_link: { required },
        description: { required },
      },
  },
    data() {
      return {
        student: [],
        checkbox2: false,
        menu1: false,
        menu2: false,
      }
  },

  created(){
    this.$store.commit('SET_LAYOUT', 'student-layout');
    this.axios.get(`/student/projectdetails/${this.$route.params.id}/edit`).then((response) => {
						this.student = response.data;
						if(this.student.is_currently_ongoing==0){
							this.checkbox2 = false;
						}
						if(this.student.is_currently_ongoing==1){
							this.checkbox2 = true;
						}
        });
  },

  computed: {
      project_nameError () {
        const errors = []
        if (!this.$v.student.project_name.$dirty) return errors
        !this.$v.student.project_name.required && errors.push('This field is required.')
        return errors
      },
      start_monthError () {
        const errors = []
        if (!this.$v.student.start_month.$dirty) return errors
        !this.$v.student.start_month.required && errors.push('This field is required.')
        return errors
      }, 
      descError () {
        const errors = []
        if (!this.$v.student.description.$dirty) return errors
        !this.$v.student.description.required && errors.push('This field is required.')
        return errors
      }, 
      project_linkError () {
        const errors = []
        if (!this.$v.student.project_link.$dirty) return errors
        !this.$v.student.project_link.required && errors.push('This field is required.')
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
        axios.post(`/student/projectdetails/${this.$route.params.id}/update`, this.student).then(response => {
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

    checkOngoing(){
      if (this.checkbox2==true) {
        this.student.is_currently_ongoing = 1;
      } else {
        this.student.is_currently_ongoing = 0;
      }
    }
  }
  }
</script>
