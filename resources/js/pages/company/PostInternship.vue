<template>
<div>
  <v-card
    outlined
    class="mx-auto"
    width="600"
  >
    
    <v-toolbar
      color="blue-grey darken-1"
      dark
    >
    <v-card-text>
      <v-toolbar-title class="text-center">Post an internship</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
          <v-form>
            <v-container class="p-4">

              <p class="title">Internship Details</p>
							<v-subheader>Profile</v-subheader>
              <v-container class="px-4">
								<v-radio-group v-model="post.profile_id">
											<v-radio
												v-for="(profile,n) in this.profiles_list"
												:key="n"
												:label="profile.title"
												:value="profile.id"											
												return-object
											></v-radio>
										</v-radio-group>
              </v-container>

								<v-subheader>Internship type</v-subheader>
								<v-container class="px-4">
                  <v-radio-group v-model="post.type_of_internship" row>
                    <v-radio label="Regular (In-office/On-field)" value="Regular"></v-radio>
                    <v-radio label="Work from home" value="Work from home"></v-radio>
                  </v-radio-group>
								</v-container>

              
                <v-container class="px-4" v-if="post.type_of_internship=='Regular'">
              <v-subheader>City/Cities</v-subheader>
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

                      <v-checkbox
                        v-model="checkbox1"
                        label="Allow applications only from the above or neighboring cities"
                        @change="CheckBox1()"
                      ></v-checkbox>

                      <v-switch
                        v-model="switch1"
                        label="Is part-time allowed?"
                        @change="Switch1()"
                      ></v-switch>

                      </v-container>

							<v-row>
                <v-col cols="4">
                        <v-subheader>Number of openings</v-subheader>
                    </v-col>
										<v-col cols="8">
                      <v-text-field
                          v-model="post.no_of_openings"
                          label=""
                          class="purple-input mr-4"
                          outlined
                        />
                    </v-col>

                    <v-col cols="12">

                    <v-subheader>Internship start date</v-subheader>
                      <v-container class="px-4">
                        <v-radio-group v-model="post.start_date_type" row @change="dateType()">
                          <v-radio label="Immediately (within next 30 days)" value="Immediately"></v-radio>
                          <v-radio label="Later" value="Later"></v-radio>
                        </v-radio-group>
                      </v-container>

                    </v-col>
                    
                    <v-container v-if="post.start_date_type=='Later'">
                      <v-row>
                      <v-col cols="4">
                        <v-subheader>From:</v-subheader>
                    </v-col>
                      <v-col
                          cols="8">
                        <v-menu
                          ref="menu1"
                          v-model="menu1"
                          :close-on-content-click="false"
                          :return-value.sync="post.start_date"
                          transition="scale-transition"
                          offset-y
                          min-width="290px"
                        >
                          <template v-slot:activator="{ on }">
                            <v-text-field
                              v-model="post.start_date"
                              label="Start Date"
                              readonly
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-date-picker v-model="post.start_date" color="green lighten-1" no-title scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu1 = false">Cancel</v-btn>
                            <v-btn text color="primary" @click="$refs.menu1.save(post.start_date)">OK</v-btn>
                          </v-date-picker>
                        </v-menu>
                    </v-col>

                    <v-col cols="4">
                        <v-subheader>To:</v-subheader>
                    </v-col>

                    <v-col
                      cols="8">
                        <v-menu
                          ref="menu2"
                          v-model="menu2"
                          :close-on-content-click="false"
                          :return-value.sync="post.end_date"
                          transition="scale-transition"
                          offset-y
                          min-width="290px"
                        >
                          <template v-slot:activator="{ on }">
                            <v-text-field
                              v-model="post.end_date"
                              label="End Date"
                              readonly
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-date-picker v-model="post.end_date" color="green lighten-1" no-title scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu2 = false">Cancel</v-btn>
                            <v-btn text color="primary" @click="$refs.menu2.save(post.end_date)">OK</v-btn>
                          </v-date-picker>
                        </v-menu>
                    </v-col>
                      </v-row>
                      </v-container>
                        <v-col cols="12">
                        <v-subheader>Internship duration</v-subheader>
                        </v-col>
                        <v-col cols="6">
                          <v-menu offset-y>
                            <template v-slot:activator="{ on }">
                              <v-text-field
                                v-model="choose_duration"
                                label="Choose Duration"
                                class="purple-input mr-4"
                                v-on="on"
                              />
                            </template>                        
                                  <v-list style="max-height: 250px"
                                        class="overflow-y-auto">
                                    <v-list-item-group v-model="data" color="primary">
                                      <v-list-item
                                        v-for="i in 6"
                                        :key="i"
                                        @click="choose_duration=i"
                                        @change="duration()"
                                      >
                                        <v-list-item-content>
                                          <v-list-item-title v-text="i"></v-list-item-title>
                                        </v-list-item-content>
                                      </v-list-item>
                                    </v-list-item-group>
                                  </v-list>
											    </v-menu>
                        </v-col>

                        <v-col cols="6">
                          <v-radio-group v-model="duration_type" row @change="duration()">
                            <v-radio label="months" value="months"></v-radio>
                            <v-radio label="weeks" value="weeks"></v-radio>
                          </v-radio-group>
                        </v-col>


                        <v-col cols="12">
                        <v-subheader>Intern’s responsibilities:</v-subheader>
                        </v-col>
                        <v-col cols="12">
                        <v-textarea
                          name="input-7-1"
                          v-model="post.intern_resp_desc"
                          outlined
                        ></v-textarea>
                        </v-col>

                        <v-col cols="12">
                        <v-divider></v-divider>
                        </v-col>
                        </v-row>

                        <p class="title">Stipend and perks</p>
                        <v-container class="px-4">
                        <v-subheader>Stipend</v-subheader>
                          <v-radio-group v-model="post.stipend_category" row @change="clearModels()">
                            <v-radio label="Fixed" value="Fixed"></v-radio>
                            <v-radio label="Negotiable" value="Negotiable"></v-radio>
                            <v-radio label="Performance based" value="Performance based"></v-radio>
                            <v-radio label="Unpaid" value="Unpaid"></v-radio>
                          </v-radio-group>
                        </v-container>

                        <v-container v-if="post.stipend_category=='Fixed'">
                          <v-row>
                            <v-col cols="4"><v-subheader>Choose Amount</v-subheader></v-col>
                            <v-col cols="4">
                                <v-text-field
                                v-model="post.stipend_fixed"
                                label="eg. 10000"
                                class="purple-input mr-4"
                              />
                            </v-col>
                            <v-col cols="4">
                              <v-menu offset-y>
                                <template v-slot:activator="{ on }">
                                  <v-text-field
                                    v-model="post.stipend_type"
                                    label="type"
                                    class="purple-input mr-4"
                                    v-on="on"
                                  />
                                </template>                        
                                      <v-list style="max-height: 250px"
                                            class="overflow-y-auto">
                                        <v-list-item-group v-model="data" color="primary">
                                          <v-list-item
                                            v-for="(type,i) in stipend_list"
                                            :key="i"
                                            @click="post.stipend_type=type"
                                          >
                                            <v-list-item-content>
                                              <v-list-item-title v-text="type"></v-list-item-title>
                                            </v-list-item-content>
                                          </v-list-item>
                                        </v-list-item-group>
                                      </v-list>
                                </v-menu>
                            </v-col>
                          </v-row>
                        
                        </v-container>

                        <v-container v-if="post.stipend_category=='Negotiable'">
                          <v-row>
                            <v-col cols="12"><p>The stipend must be negotiated and finalised before the internship starts</p></v-col>
                            <v-col cols="4">
                                <v-text-field
                                v-model="post.stipend_amount_min"
                                label="eg. 1000"
                                class="purple-input mr-4"
                              />
                            </v-col>
                            <v-col cols="1"><v-subheader>to</v-subheader></v-col>
                            <v-col cols="4">
                                <v-text-field
                                v-model="post.stipend_amount_max"
                                label="eg. 5000"
                                class="purple-input mr-4"
                              />
                            </v-col>
                            <v-col cols="3">
                              <v-menu offset-y>
                                <template v-slot:activator="{ on }">
                                  <v-text-field
                                    v-model="post.stipend_type"
                                    label="type"
                                    class="purple-input mr-4"
                                    v-on="on"
                                  />
                                </template>                        
                                      <v-list style="max-height: 250px"
                                            class="overflow-y-auto">
                                        <v-list-item-group v-model="data" color="primary">
                                          <v-list-item
                                            v-for="(type,i) in stipend_list"
                                            :key="i"
                                            @click="post.stipend_type=type"
                                          >
                                            <v-list-item-content>
                                              <v-list-item-title v-text="type"></v-list-item-title>
                                            </v-list-item-content>
                                          </v-list-item>
                                        </v-list-item-group>
                                      </v-list>
                                </v-menu>
                            </v-col>                            
                          </v-row>                        
                        </v-container>

                        <v-container v-if="post.stipend_category=='Performance based'">
                          <v-row>
                            <v-col cols="12"><v-subheader>For an output-driven performance-based internships, such as Business Development (Sales), etc. we insist on a minimum assured stipend and the rest could be incentive-based</v-subheader></v-col>
                            <v-col cols="4"><v-subheader>Minimum assured</v-subheader></v-col>
                            <v-col cols="4">
                                <v-text-field
                                v-model="post.stipend_amount_min"
                                label="eg. 8000"
                                class="purple-input mr-4"
                              />
                            </v-col>
                            <v-col cols="4">
                              <v-menu offset-y>
                                <template v-slot:activator="{ on }">
                                  <v-text-field
                                    v-model="post.stipend_type"
                                    label="type"
                                    class="purple-input mr-4"
                                    v-on="on"
                                  />
                                </template>                        
                                      <v-list style="max-height: 250px"
                                            class="overflow-y-auto">
                                        <v-list-item-group v-model="data" color="primary">
                                          <v-list-item
                                            v-for="(type,i) in stipend_list"
                                            :key="i"
                                            @click="post.stipend_type=type"
                                          >
                                            <v-list-item-content>
                                              <v-list-item-title v-text="type"></v-list-item-title>
                                            </v-list-item-content>
                                          </v-list-item>
                                        </v-list-item-group>
                                      </v-list>
                                </v-menu>
                            </v-col>

                            <v-col cols="4"><v-subheader>Incentive based</v-subheader></v-col>
                            <v-col cols="4">
                                <v-text-field
                                v-model="incentive_amount"
                                label="eg. 750"
                                class="purple-input mr-4"
                                @change="incentive()"
                              />
                            </v-col>
                            <v-col cols="4">
                              <v-text-field
                                v-model="incentive_type"
                                label="eg. per data entry"
                                class="purple-input mr-4"
                                @change="incentive()"
                              />
                            </v-col>                            
                          </v-row>                                                 
                        </v-container>

                        <v-subheader>Perks</v-subheader> 
                        <v-container class="px-4">
                          <v-checkbox v-model="post.perks" label="Certificate" value="Certificate"></v-checkbox>
                          <v-checkbox v-model="post.perks" label="Letter of recommendation" value="Letter of recommendation"></v-checkbox>
                          <v-checkbox v-model="post.perks" label="Flexible work hours" value="Flexible work hours"></v-checkbox>
                          <v-checkbox v-model="post.perks" label="5 days a week" value="5 days a week"></v-checkbox>
                          <v-checkbox v-model="post.perks" label="Informal dress code" value="Informal dress code"></v-checkbox>
                          <v-checkbox v-model="post.perks" label="Free snacks and beverages" value="Free snacks and beverages"></v-checkbox>

                          <v-switch
                            v-model="switch2"
                            label="Does this internship come with a pre-placement offer (PPO)?"
                            @change="Switch2()"
                          ></v-switch>
                        </v-container>

                        <v-divider></v-divider>

                        <p class="title">Skills and assessment</p>
                        <v-container class="px-4">
                          <v-subheader>Skills required</v-subheader>
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
                        
                        <v-divider></v-divider>
                        
                        <v-subheader>Assessment</v-subheader>
                        <v-subheader>Question 1 and 2 will be asked to every applicant by default. If you wish, you may ask two more customized questions.</v-subheader>
                        
                        <v-subheader>Question 1: Why should you be hired for this role?</v-subheader>
                        <v-subheader>Question 2: Are you available for 1 month, starting immediately, for a full time internship at ? If not, what is the time period you are available for and the earliest date you can start this internship on?</v-subheader>
                        <br>
                        <p @click="question1=true">+ Add question 3</p>

                        <div v-if="question1==true">
                          <v-textarea 
                            name="input-7-1"
                            label="Question 3"
                            v-model="post.question_1"
                            outlined
                          >
                          </v-textarea>
                          <p @click="question2=true">+ Add question 4</p>
                        </div>
                        <div v-if="question2==true">
                          <v-textarea 
                            name="input-7-1"
                            label="Question 4"
                            v-model="post.question_2"
                            outlined
                          >
                          </v-textarea>
                        </div>

                        <v-subheader>Mention any other requirements that the applicants should have</v-subheader>
                        <v-textarea 
                            name="input-7-1"
                            label="Other Requirements"
                            v-model="post.other_req"
                            outlined
                          >
                          </v-textarea>
                        

                        </v-container>

                        

                    
							<v-row>
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

    <v-snackbar
        v-model="snackbar"
        :timeout="timeout"
        :multi-line="multiLine"
      >
        {{ text }}

        <template v-slot:action="{ attrs }">
          <v-btn
            color="blue"
            text
            v-bind="attrs"
            @click="snackbar = false"
          >
            Close
          </v-btn>
        </template>
      </v-snackbar>

  </div>

      
</template>

<script>
  export default {
    data() {
      return {
        post: {
           profile_id: '',
           type_of_internship: '',
           city_preferences: [],
           applicants_from_sel_cities: 0,
           is_part_time_allowed: 0,
           no_of_openings: '',
           start_date_type: '',
           start_date: null,
           end_date: null,
           internship_duration: '',
           intern_resp_desc: "Selected intern's day-to-day responsibilities include:",
           stipend_category: '',
           stipend_fixed: '',
           stipend_amount_min: '',
           stipend_amount_max: '',
           stipend_incentive: '',
           stipend_type: '',
           perks: [],
           preplacement_offer: 0,
           skills_id: [],
           question_1: '',
           question_2: '',
           other_req: '',
				},
				profiles_list: [],
        citysearchquery1: '',
				citysearchquery2: '',
				citysearchquery3: '',
				city_data_results: [],
        data: 1,
        i: 1,
        checkbox1: false,
        switch1: false,
        menu1: false,
        menu2: false,
        choose_duration: '',
        duration_type: '',
        stipend_list: ['/month','/week','lumpsum'],
        incentive_amount: '',
        incentive_type: '',
        switch2: false,
        chips: [],
        items: [],
        item: 1,
        skillsearchquery1: '',
				skillsearchquery2: '',
				skillsearchquery3: '',
        skill_data_results: [],
        question1: false,
        question2: false,
        flag: '',
        snackbar: false,
        text: 'We have successfully received your post. It will be posted after we verify it',
        timeout: 3000,
        multiLine: true,
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
			axios.get('/internships/profiles').then(response => {
						this.profiles_list= response.data;					
      });
      axios.get('/internships/skills').then(response => {
            this.items= response.data;
			});
		},
  
  methods: {

    submit() {
      this.errors = {};
      axios.post('/company/postinternship', this.post).then(response => {
        this.snackbar = true;
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      
    },
    
    remove (item) {
        this.chips.splice(this.chips.indexOf(item), 1)
        this.chips = [...this.chips]
      },

    autoCompleteCity1(){
        this.city_data_results = [];
        if(this.citysearchquery1.length > 2){
         axios.get('/internships/citysearch',{params: {citysearchquery: this.citysearchquery1}}).then(response => {
          this.city_data_results = response.data;
         });
        }
		},
		
		autoCompleteCity2(){
        this.city_data_results = [];
        if(this.citysearchquery2.length > 2){
         axios.get('/internships/citysearch',{params: {citysearchquery: this.citysearchquery2}}).then(response => {
         this.city_data_results = response.data;
         });
        }
		},
		
		autoCompleteCity3(){
        this.city_data_results = [];
        if(this.citysearchquery3.length > 2){
         axios.get('/internships/citysearch',{params: {citysearchquery: this.citysearchquery3}}).then(response => {
         this.city_data_results = response.data;
         });
        }
    },

    
    selectCity1(data){
      this.citysearchquery1 = data.name;
      this.city_data_results.length = false;
      this.post.city_preferences[0] = data.id;
		},
		
		selectCity2(data){
      this.citysearchquery2 = data.name;
      this.city_data_results.length = false;
      this.post.city_preferences[1] = data.id;
		},
		
		selectCity3(data){
      this.citysearchquery3 = data.name;
      this.city_data_results.length = false;
      this.post.city_preferences[2] = data.id;
    },

    CheckBox1(){
      if (this.checkbox1==true) {
        this.post.applicants_from_sel_cities = 1;
      } else {
        this.post.applicants_from_sel_cities = 0;
      }
    },

    Switch1(){
      if (this.switch1==true) {
        this.post.is_part_time_allowed = 1;
      } else {
        this.post.is_part_time_allowed = 0;
      }
    },

    dateType(){
      if (this.post.start_date_type=='Later') {
        this.post.start_date = new Date().toISOString().substr(0, 10);
        this.post.end_date = new Date().toISOString().substr(0, 10);
      } else {
        this.post.start_date = null;
        this.post.end_date = null;
      }
    },

    duration(){
      this.post.internship_duration = this.choose_duration + ' ' + this.duration_type;
    },

    clearModels(){
      this.post.stipend_fixed = '';
      this.post.stipend_amount_min = '';
      this.post.stipend_amount_max = '';
      this.post.stipend_incentive = '';
      this.post.stipend_type = '';
    },

    incentive(){
      this.post.stipend_incentive = this.incentive_amount + ' ' + this.incentive_type;
    },
    
    Switch2(){
      if (this.switch2==true) {
        this.post.preplacement_offer = 1;
      } else {
        this.post.preplacement_offer = 0;
      }
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

    
    selectSkill1(data){
      this.skillsearchquery1 = data.title;
      this.skill_data_results.length = false;
      this.post.skills_id[0] = data.id;
		},
		
		selectSkill2(data){
      this.skillsearchquery2 = data.title;
      this.skill_data_results.length = false;
      this.post.skills_id[1] = data.id;
		},
		
		selectSkill3(data){
      this.skillsearchquery3 = data.title;
      this.skill_data_results.length = false;
      this.post.skills_id[2]= data.id;
    },
		

  }

  
  }
</script>