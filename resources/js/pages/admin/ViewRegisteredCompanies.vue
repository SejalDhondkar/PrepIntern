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
          <p class="body-2">{{company.company_basic_info.contact_email}}</p>
          <p class="body-2">{{company.company_basic_info.contact_no}}</p>
          <br><br>
          <v-divider></v-divider>

          <v-row>
            <v-col cols="4">
              <p class="title">Admin Details</p>
            </v-col>
            <v-col cols="8">
            <div class="my-4">
              <p class="body-2">Name-<b> {{company.company_admin_details.name}}</b></p>
              <p class="body-2">Email - <b>{{company.company_admin_details.email}}</b></p>
              <p class="body-2">Contact No - <b>{{company.company_admin_details.contact_no}}</b></p>
            </div>
            </v-col>

            <v-col cols="12"><v-divider></v-divider></v-col>

            <v-col cols="4">
              <p class="title">Address</p>
            </v-col>
            <v-col cols="8">
            <div class="my-4">
              <p class="body-2">Registered Address-<b> {{company.company_address.registered_address}}</b></p>
              <p class="body-2">Country - <b>{{company.company_address.country_name}}</b></p>
              <p class="body-2">State - <b>{{company.company_address.state_name}}</b></p>
              <p class="body-2">City - <b>{{company.company_address.city_name}}</b></p>
              <p class="body-2">Pincode- <b>{{company.company_address.pincode}}</b></p>
            </div>
            </v-col>

            <v-col cols="12"><v-divider></v-divider></v-col>

            <v-col cols="4">
              <p class="title">Additional Details</p>
            </v-col>
            <v-col cols="8">
            <div class="my-4">
              <p class="body-2">Registration No - <b>{{company.company_additional_details.registration_no}}</b></p>
              <p class="body-2">Certificate of incorporation - <b>{{company.company_additional_details.certificate_of_incorporation}}</b></p>
              <p class="body-2">Website- <b>{{company.company_additional_details.website}}</b></p>
              <p class="body-2">Year of Establishment - <b>{{company.company_additional_details.year_of_establishment}}</b> </p>
              <p class="body-2">Type Of Company - <b>{{company.company_additional_details.type_of_company}}</b></p>
              <p class="body-2">Description - <b>{{company.company_additional_details.description}}</b></p>
              <p class="body-2">Range of employee - <b>{{company.company_additional_details.range_of_employees}}</b></p>
              
            </div>
            </v-col>
          
          <v-col cols="12"><v-divider></v-divider></v-col>


            <v-col cols="4">
              <p class="title">Social Media</p>
            </v-col>
            
            <v-col cols="8">
              <div class="my-4" v-for="(com,i) in company.company_social_media_links" :key="i">
                  <p class="body-2">{{com.title}}- <b>{{com.url}}</b></p>
              </div>
            </v-col>
          </v-row>
      </v-container>
    </v-flex>
    </v-card-text>
    </v-card>
    <br><br><br>


  </div>       
</div>
</template>
<script>
export default {
    data(){
        return{
            company:{
                company_basic_info:[],
                company_admin_details: [],
                company_address:[],
                company_additional_details:{},
                company_social_media_links:[],
                company_social_media:[],
            },
            


        }
    },

    created() {
        this.$store.commit('SET_LAYOUT', 'admin-layout');
        axios.get(`/admin/viewregisteredcompanies/${this.$route.params.id}/details`).then(response => {
            this.company = response.data;
            console.log(this.company);
            
        });
    },
}
    
    

</script>
<style scoped>
p {
  margin: 1;
  padding: 0%;
}

.title, .subtitle-1 {
  color: blue;
}
</style>