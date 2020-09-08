<template>
  <v-card outlined
          class="mx-auto"
          width="85%">

    <v-toolbar
      color="orange darken-1"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Additional Details</v-toolbar-title>

    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="p-4">

							<v-row>

                  <v-col cols="12">
                        <v-subheader>Example:<br>Secured 1st rank among 500 entries in national level story writing competition organised by XYZ.</v-subheader>
                    </v-col>
										<v-col cols="12">
                      <v-textarea
												name="input-7-1"
												label="Description"
												v-model="student.description"
                        :error-messages="descError"
                        required
                        @input="$v.student.description.$touch()"
                        @blur="$v.student.description.$touch()"
											></v-textarea>
                    </v-col>

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
        description: { required },
      }
   },
    data() {
      return {
        student: {
						description: '',
        },
      }
  },

  created(){
    this.$store.commit('SET_LAYOUT', 'student-layout');
    this.axios.get('/student/additionaldetails/edit').then((response) => {
            this.student = response.data;
        });
  },

  computed: {
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
      axios.post('/student/additionaldetails', this.student).then(response => {
        this.$router.go(-1);
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      }
    },
    previous(){
            this.$router.go(-1);
				},
}

  }
</script>
