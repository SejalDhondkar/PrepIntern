<template>
  <v-app>
    <v-app-bar app color="white">
      <v-img src="./images/Prepintern_new_1.png"
             alt="Vuetify"
             width="110px"
             height="45px"
             contain></v-img>

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
          <v-list-item v-for="(item, index) in register_dropdown"
                       :key="index"
                       :to="item.url"
                       class="text-decoration-none">
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

    <v-container fluid class="m-4 p-4">
      <v-row>
        <v-col cols="12">
          <v-carousel show-arrows-on-hover hide-delimiters cycle
                    interval="4000"
                    continuous
                    class="hidden-sm-and-down">
            <v-carousel-item v-for="(item,i) in carousel"
                             :key="i"
                             :src="item.src"
                             contain>
            </v-carousel-item>
        </v-carousel>
        </v-col>
        <v-col cols="12">
          <p class="headings">Features</p>
        </v-col>
        <v-col cols="12" sm="6" class="d-flex justify-center mx-auto">
          <v-card raised class="m-4 p-4 mx-auto" width="400">
            <p class="feature-heading">For Students</p><br>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>100% Verified Internships</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>In-Built Resume Feature</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>Performance Tracking</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>Profile Ratings</p>
          </v-card>
        </v-col>
        <v-col cols="12" sm="6" class="d-flex justify-center mx-auto">
          <v-card raised class="m-4 p-4 mx-auto" width="400">
            <p class="feature-heading">For Employers</p><br>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>Post Internships for free</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>Performance Tracking</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>Verified Student Profiles</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>24x7 Customer Support</p>
          </v-card>
        </v-col>
        <v-col cols="12">
          <br><br><p class="headings">Get Internships</p><br>
        </v-col>
      
        <v-col cols="12"
               sm="3">
          <v-card class="cards">
            <p class="cards-text">
              <v-icon x-large color="indigo darken-2">mdi-volume-high</v-icon>Marketing</p>
          </v-card>
        </v-col>
        <v-col cols="12"
               sm="3">
          <v-card class="cards">
            <p class="cards-text">
              <v-icon x-large color="indigo darken-2">business_center</v-icon>Business Development</p>
          </v-card>
        </v-col>
        <v-col cols="12"
               sm="3">
          <v-card class="cards">
            <p class="cards-text">
              <v-icon x-large color="indigo darken-2">mdi-book-open-page-variant</v-icon>Content Writing</p>
          </v-card>
        </v-col>
        <v-col cols="12"
               sm="3">
          <v-card class="cards">
            <p class="cards-text">
              <v-icon x-large color="indigo darken-2">mdi-draw</v-icon>Graphic Design</p>
          </v-card>
        </v-col>
        <v-col cols="12"
               sm="3">
          <v-card class="cards">
            <p class="cards-text">
              <v-icon x-large color="indigo darken-2">attach_money</v-icon>Finance</p>
          </v-card>
        </v-col>
        <v-col cols="12"
               sm="3">
          <v-card class="cards">
            <p class="cards-text">
              <v-icon x-large color="indigo darken-2">mdi-account-group-outline</v-icon>Human Resources</p>
          </v-card>
        </v-col>
        <v-col cols="12"
               sm="3">
          <v-card class="cards">
            <p class="cards-text">
              <v-icon x-large color="indigo darken-2">mdi-remote-desktop</v-icon>Engineering</p>
          </v-card>
        </v-col>
        <v-col cols="12"
               sm="3">
          <v-card class="cards">
            <p class="cards-text">
              <v-icon x-large color="indigo darken-2">mdi-search-web</v-icon>All Internships</p>
          </v-card>
        </v-col>

        <v-col cols="12">
          <br><br><p class="headings">About Us</p>
        </v-col>
        <v-col cols="12" sm="4">
          <v-card flat tile class="d-flex align-end">
            <v-img src="./images/logo2.jpeg"
                   alt="PrepIntern"
                   width="200px"
                   height="200px"
                   contain></v-img>
          </v-card>
        </v-col>
        <v-col cols="12" sm="8" class="text d-flex flex-column">
        <v-container>
          <v-card flat tile>
            PrepIntern is a startup initiative of YuvaLeads aimed at providing guaranteed internships in all technical & non technical
            domains and tracking intern's performance throughout the internship.<br> In today's digital world getting
            an internship is not a very difficult task but evaluating that "HOW MUCH HAVE I LEARNT IN THIS INTERNSHIP ?" is
            still a question mark.<br> PrepIntern is focused on providing end to end solution to Internship System. Students
            can apply for internships in any technical & non technical domain.
            <br>Companies interested in hiring interns will be benefited by getting potential interns through PrepIntern. We
            match up company's requirements with our pool of interns to serve you best results.
          </v-card>
          </v-container>
        </v-col>

        <v-col cols="12">
          <v-carousel cycle
                      min-height="200"
                      show-arrows-on-hover
                      hide-delimiters
                      >
            <v-carousel-item v-for="(slide, i) in slides"
                             :key="i">
              <v-row class="fill-height"
                     align="center"
                     justify="center">
                <v-card light shaped raised
                        color="indigo lighten-5"
                        class="mx-auto my-auto"
                        width="80%">
                  <v-row class="fill-height p-2"
                         align="center"
                         justify="center">
                    <v-col class="text-center" cols="12" sm="3">
                      <p class="slide-name">{{slide.name}}</p>
                      <p class="slide-position">{{slide.position}}</p>
                    </v-col>
                    <v-col class="slide-msg" cols="12" sm="9">
                      {{slide.msg}}
                    </v-col>
                  </v-row>
                </v-card>
              </v-row>
            </v-carousel-item>
          </v-carousel>
          <br><br><br>
        </v-col>
      </v-row>
    </v-container>

    <v-footer app absolute padless color="grey darken-3" class="p-2">
      <v-card-text class="white--text text-center">
        <v-btn class="text-decoration-none" icon dark href="https://m.facebook.com/PrepIntern/?tsid=0.7696890637138489&source=result">
          <v-icon>mdi-facebook</v-icon>
        </v-btn>
        <v-btn class="mx-2 text-decoration-none" icon dark href="https://www.instagram.com/p/CBShS3Nn4lO/?igshid=dr3lpnp2ro8q">
          <v-icon>mdi-instagram</v-icon>
        </v-btn>
        <v-btn class="mx-2 text-decoration-none" icon dark href="https://www.linkedin.com/company/prepintern/">
          <v-icon>mdi-linkedin</v-icon>
        </v-btn>
        <v-btn class="mx-2 text-decoration-none" icon dark href="mailto:prepinternindia@gmail.com">
          <v-icon>mdi-email-outline</v-icon>
        </v-btn>
        <br> PrepIntern &copy; {{ new Date().getFullYear() }} - All Rights Reserved<br>
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
          { name: 'As Student', url: '/student/register' },
          { name: 'As Employer', url: '/company/register' }
        ],
        index: 0,
        i: 0,
        carousel: [
          {
            src: './images/image1.png'
          },
          {
            src: './images/image2.png'
          },
          {
            src: './images/image3.png'
          }
        ],
        slides: [
          {
            name: 'Ashwini Singh',
            position: 'Web Development Intern at Yuvaleads',
            msg:
              'Prepintern is surely one of the best organisation I have associated with.Right from the starting when I joined prepintern,all were super supportive and helpful.Be it Priyanka,Sejal or you,all have been there to help me whenever I needed them.The most I liked about this organization is there motive to help younger generation grow and develop value added skills .I am forever grateful to be part of this organization as one of the intern in yuvaleads.'
          },
          {
            name: 'Nikhil bhere',
            position: 'Market Research Intern at WordsMaya',
            msg:
              "It's been a month since I joined WordsMaya Edutech Pvt. Ltd. as a Sales and Marketing Intern and It has been a great experience working there. It was PrepIntern who recommended me this internship after I get to know about them through a friend. PrepIntern helped me throughout the way by being a medium between me and WordsMaya until I got selected. I thank PrepIntern for taking the time and helping me find the right internship for me."
          },
          {
            name: 'Piyush Gupta',
            position: 'Market Research Intern at WordsMaya',
            msg:
              "I'm doing my intern as sales and marketing research. PrepIntern gave me the opportunity by finding suitable internship for me. They made it very easy for me to get internship. This internship not only gave me opportunity to learn something new, but even I got work experience in well recognised startup.Thanks PrepIntern."
          },
          {
            name: 'Disha Shah',
            position: 'Web Development Intern at Yuvaleads',
            msg:
              'Prepintern is a great platform for getting internships. The process of applying the internship on prepintern is effortless where you can directly apply for internships without paying anything to anyone. Based on your skills and areas you want to apply for internships they shortlist you for internships in the companies. While applying for an internship there is questions asked by recruiters regarding your skills and work experience. If interview goes well you will get selected for an internship. Currently, I am doing an internship in a company in which I got internship through prepintern. It is a great company. I have learnt many new skills during my internship which has helped me to progress and develop my skillset.'
          }
        ]
      }
    },

    created() {
      this.$store.commit('SET_LAYOUT', 'loginsignup-layout')
    },

    methods: {
      dashboard() {
        if (this.$auth.user().role_id === 1) {
          this.$router.push({ path: '/admin' })
        }
        if (this.$auth.user().role_id === 4) {
          this.$router.push({ path: '/company/dashboard' })
        }
        if (this.$auth.user().role_id === 5) {
          this.$router.push({ path: '/student/dashboard' })
        }
      }
    }
  }
</script>

<style scoped>
  .headings {
    text-align: center;
    font-size: 2.5rem;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana,
      sans-serif;
    font-weight: 250;
    color: #424242;
  }
  .text {
    text-align: justify;
    font-size: 1.1rem;
    padding-left: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: 50;
    color: #212121;
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
  .cards {
    background-color: #f5f5f5;
    width: 100%;
    height: 180px;
  }
  .cards-text {
    text-align: center;
    padding-top: 60px;
    font-size: 1.4rem;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: 50;
    color: #212121;
    font-stretch: semi-expanded;
  }
  .slide-name {
    text-align: center;
    padding-left: 10px;
    color: black;
    font-size: 1.4rem;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-weight: 60;
  }
  .slide-position {
    text-align: center;
    padding: 10px;
    color: #283593;
    font-size: 1.1rem;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-weight: 40;
  }
  .slide-msg {
    text-align: justify;
    padding: 30px;
    color: #212121;
    font-size: 0.9rem;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: 30;
  }
</style>
