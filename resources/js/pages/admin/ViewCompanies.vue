<template>
<div>
<div >  
  <v-card
    raised
    class="mx-auto"
    width="800"
  >
    <v-card-text>
      <v-flex>
      
        <v-container class="p-4">
		     <p class="display-1">{{company.company_basic_info.name}}</p>
          <p class="body-2">{{company.company_basic_info.email}}</p>
          <p class="body-2">{{company.company_basic_info.contact_no}}</p>
          <br><br>
          <v-divider></v-divider>

          <v-row>
            <v-col cols="4">
              <p class="title">Address</p>
            </v-col>
            <v-col cols="8">
            <div class="my-4" v-if="company.company_address">
              <p class="body-2">Registered Address- {{company.company_address.registered_address}}</p>
              <p class="body-2">Country name -{{company.company_address.country_name}}</p>
              <p class="body-2">State name -{{company.company_address.state_name}}</p>
              <p class="body-2">City name -{{company.company_address.city_name}}</p>
              <p class="body-2">Pincode-{{company.company_address.pincode}}</p>
            </div>
            </v-col>
          </v-row>

          <v-row>
            <v-col cols="4">
              <p class="title">Additional Details</p>
            </v-col>
            <v-col cols="8">
            <div class="my-4" v-if="company.company_additional_details">
              <p class="body-2">Registration No-{{company.company_additional_details.registration_no}}</p>
              <p class="body-2">Certificate of incorporation-{{company.company_additional_details.certificate_of_incorporation}}</p>
              <p class="body-2">Website-{{company.company_additional_details.website}}</p>
              <p class="body-2">Year of Establishment-{{company.company_additional_details.year_of_establishment}}</p>
              <p class="body-2">Type Of Company-{{company.company_additional_details.type_of_company}}</p>
              <p class="body-2">Description-{{company.company_additional_details.description}}</p>
              <p class="body-2">Range of employee-{{company.company_additional_details.range_of_employees}}</p>
              
            </div>
            </v-col>
          </v-row>


          <v-row>
            <v-col cols="4">
              <p class="title">Social Media</p>
            </v-col>
            
            <v-col cols="8" v-if="company.company_social_media_links.length!=0">
              <div class="my-4" v-for="(com,i) in company.company_social_media_links" :key="i">
                  <p class="body-2">Social Media-{{com.title}}</p>
                  <p class="body-2">URL-{{com.url}}</p>
              </div>
            </v-col>
          </v-row>
      </v-container>
    </v-flex>
    </v-card-text>
    </v-card>
</div>
<v-bottom-navigation
      fixed
      horizontal
      grow
      :v-model="company.company_basic_info.is_verified"
    >
   
      
      <v-btn text color="grey" left @click="back()">
        <span>Go Back</span>
      </v-btn>

      <v-btn text color="success" value=1 @click="select()">
        <span>Select</span>
        <v-icon>mdi-checkbox-marked-circle-outline</v-icon>
      </v-btn>

      <v-btn text color="red" value=0 @click="reject()">
        <span>Reject</span>
        <v-icon>mdi-close-circle-outline</v-icon>
      </v-btn>

      
    </v-bottom-navigation>
</div>
</template>
<script>
export default {
    data(){
        return{
            company:{
                company_basic_info:[],
                company_address:[],
                company_additional_details:{},
                company_social_media_links:[],
                company_social_media:[],
            },
            verify:{
              company_id:'',
              is_verified:'',
            },


        }
    },

    created() {
        this.$store.commit('SET_LAYOUT', 'admin-layout');
        axios.get(`/admin/viewcompanies/${this.$route.params.id}/details`).then(response => {

            this.company = response.data;
            console.log(response.data.company_additional_details.registeration_no);
            
        });
    },
    methods:{
      select(){
        this.verify.company_id = this.company.company_basic_info.id;
        this.verify.is_verified = 1;
        
        this.errors = {};
        axios.put('/admin/verifycompanies/changeverify', this.verify).then(response => {
          // console.log(this.status_array);
        }).catch(error => {
          if (error.response.status === 422) {
          console.log("error");
          }
        });
      },
      reject(){
        this.verify.company_id = this.company.company_basic_info.id;
        this.verify.is_verified = 0;
   
        this.errors = {};
        axios.put('/admin/verifycompanies/changeverify', this.verify).then(response => {
          // console.log(this.status_array);
        }).catch(error => {
          if (error.response.status === 422) {
          console.log("error");
          }
        });

      },
      back(){
        this.$router.go(-1);
      }

    }
}

    

</script>
<style scoped>
p {
  margin: 0%;
  padding: 0%;
}

.title, .subtitle-1 {
  color: blue;
}
</style>