<template>
		<v-app>
      <v-app-bar app color="white">
          <v-img
            src="./images/Prepintern1.png"
            alt="Vuetify"
            width="90px"
            height="30px"
            contain
          ></v-img>
        

          <v-spacer></v-spacer>

          <v-btn v-if="!$auth.check()" class="ma-2 text-decoration-none" tile outlined color="primary" to="/login">
            Log In
          </v-btn>          

          <v-menu offset-y v-if="!$auth.check()">
          <template v-slot:activator="{ on }">
            <v-btn class="ma-2" tile color="primary" v-on="on">
            Register
          </v-btn>
          </template>
          <v-list>
            <v-list-item
              v-for="(item, index) in register_dropdown"
              :key="index"
              :to="item.url"
              class="text-decoration-none"
            >
              <v-list-item-title>{{ item.name }}</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>

        <v-btn v-if="$auth.check()" class="ma-2 text-decoration-none" tile outlined color="primary" @click="dashboard()">
          Go to Dashboard
        </v-btn>

        <v-btn v-if="$auth.check()" class="ma-2 text-decoration-none" tile color="primary" @click.prevent="$auth.logout()">
          Log Out
        </v-btn>
      
      </v-app-bar>

        
        <v-container fluid class="m-4 p-4 mx-auto">
          <v-carousel 
            show-arrows-on-hover
            hide-delimiters 
            cycle 
            interval="4000" 
            continuous>
            <v-carousel-item
              v-for="(item,i) in carousel"
              :key="i"
              :src="item.src"
              contain
            ></v-carousel-item>
          </v-carousel>

          <br><br><br>

          <p class="headings">Features</p>

          <v-row>
            <v-col cols="6" class="d-flex justify-end">
              <v-card raised class="m-4 p-4 " width="400">
                <p class="feature-heading">For Students</p><br>
                <p class="features"><v-icon color="success">mdi-check</v-icon>100% Verified Internships</p>
                <p class="features"><v-icon color="success">mdi-check</v-icon>In-Built Resume Feature</p>
                <p class="features"><v-icon color="success">mdi-check</v-icon>Performance Tracking</p>
                <p class="features"><v-icon color="success">mdi-check</v-icon>Profile Ratings</p>
              </v-card>
            </v-col>

            <v-col cols="6" class="d-flex justify-start">
              <v-card raised class="m-4 p-4" width="400">
                <p class="feature-heading">For Employers</p><br>
                <p class="features"><v-icon color="success">mdi-check</v-icon>Post Internships for free</p>
                <p class="features"><v-icon color="success">mdi-check</v-icon>Performance Tracking</p>
                <p class="features"><v-icon color="success">mdi-check</v-icon>Verified Student Profiles</p>
                <p class="features"><v-icon color="success">mdi-check</v-icon>24x7 Customer Support</p>
              
              </v-card>
            </v-col>
          </v-row>

          <br><br><br>

          <p class="headings">About Us</p>
          <v-row>
            <v-col cols="6">
              <v-card flat tile class="d-flex align-end">
              <v-img
                src="./images/logo2.jpeg"
                alt="PrepIntern"
                width="200px"
                height="200px"
                contain
              ></v-img>
              </v-card>
            </v-col>
            <v-col cols="6" class="text d-flex flex-column justify-center">
              <v-card flat tile>
                PrepIntern is a Startup initiative of Yuvaleads aimed towards providing guaranteed paid/unpaid internships to everyone in technical/non-technical domains.
                <br><br>"We welcome beginners in Internship Journey" 
              </v-card>
            </v-col>
          </v-row>
          
          <br><br><br><br><br>
        </v-container>

      <v-footer app absolute padless color="grey darken-3" class="p-2">
        <v-card-text class="white--text text-center">
        <v-btn class="text-decoration-none" icon dark href="https://m.facebook.com/PrepIntern/?tsid=0.7696890637138489&source=result" ><v-icon>mdi-facebook</v-icon>
            </v-btn>
            <v-btn class="mx-2 text-decoration-none"  icon dark href="https://www.instagram.com/p/CBShS3Nn4lO/?igshid=dr3lpnp2ro8q"  ><v-icon>mdi-instagram</v-icon>
            </v-btn>
            <v-btn class="mx-2 text-decoration-none"  icon dark href="mailto:prepinternindia@gmail.com"  ><v-icon>mdi-email-outline</v-icon>
            </v-btn>
          <br>
           PrepIntern &copy; {{ new Date().getFullYear() }} - All Rights Reserved<br>
          <a href="https://yuvaleads.org/" class="text-decoration-none white--text"> A YuvaLeads Initiative</a>
        </v-card-text>        
      </v-footer>
    </v-app>
</template>

<script>
export default {
	data() {
      return {
        register_dropdown: [
          {name: 'As Student', url: '/student/register'},
          {name: 'As Employer', url: '/company/register'},
        ],
        index: 0,
        i: 0,
        carousel: [
          {
            src: './images/image3.png',
          },
          {
            src: './images/image2.png',
          },
          {
            src: './images/image1.png',
          },
        ],
      }
  },

  created(){
      this.$store.commit('SET_LAYOUT', 'loginsignup-layout');
    },

    methods: {
      dashboard(){
        if(this.$auth.user().role_id === 1)
            {
              this.$router.push({path: '/admin'});
            }
        if(this.$auth.user().role_id === 4)
            {
              this.$router.push({path: '/company/dashboard'});
            }
        if(this.$auth.user().role_id === 5)
            {
              this.$router.push({path: '/student/dashboard'});
            }
      }
    }
}
</script>

<style scoped>
.headings {
  text-align: center;
  font-size: 2.5rem;
  font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
  font-weight: 250;
  color: #424242;
}
.text {
  text-align: left;
  padding-right: 15%;
  font-size: 1.1rem;
  font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-weight: 50;
  color: #212121;
  font-stretch: semi-expanded;
}
.features {
  text-align: center;
  font-size: 1rem;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  font-weight: 40;
  color: #212121;
  font-stretch: semi-expanded;
}
.feature-heading {
  text-align: center;
  font-size: 1.5rem;
  font-weight: 40;
  color: #424242;
}
</style>