<template>
  <v-card
    raised
    class="mx-auto"
    width="50%"
    min-height="100"
  >
    
    <v-toolbar
      color="cyan lighten-3"
      dark
    >
    <v-card-text>
      <v-toolbar-title class= "text-center h3">Contact Us</v-toolbar-title>
      
    </v-card-text>
    </v-toolbar>
    <v-row>
      <v-col cols="12">
        <br>
        </v-col>
       <v-col cols="12" class="text-center p-2 m-2 font-weight-medium h5">
           <v-btn class="mx-2 text-decoration-none"  fab small dark href="mailto:prepinternindia@gmail.com" color="red darken-1" ><v-icon>mdi-gmail</v-icon>
            </v-btn> Email us : prepinternindia@gmail.com
      </v-col>
      <v-col cols="12" class="text-center p-2 m-2 font-weight-medium h5">
           <v-btn  class="mx-2"  fab small dark color="deep blue"  ><v-icon>mdi-phone</v-icon>
            </v-btn> Call us : +91 8850198873
      </v-col>

        <v-col cols="12" class="text-center p-2 mt-2 font-weight-medium h4">
           Follow us at
      </v-col>

      
   
      <v-col cols="12"  class="text-center p-2 mb-2 " >
        
        <v-btn class="mx-2 text-decoration-none" fab dark color="light-blue darken-4"  href="https://m.facebook.com/PrepIntern/?tsid=0.7696890637138489&source=result" ><v-icon>mdi-facebook</v-icon>
            </v-btn>
        
        <v-btn class="mx-2 text-decoration-none"  fab dark color="pink darken-1" href="https://www.instagram.com/p/CBShS3Nn4lO/?igshid=dr3lpnp2ro8q"  ><v-icon>mdi-instagram</v-icon>
            </v-btn>

        
       
      </v-col>
     

     
    </v-row>
    </v-card>

      
</template>

<script>
export default {
  data() {
    return {
      // 
    }
  },

  created(){
    if(this.$auth.user().role_id === 4){
      this.$store.commit('SET_LAYOUT', 'company-layout');
    }
    if(this.$auth.user().role_id === 5){
      this.$store.commit('SET_LAYOUT', 'student-layout');
    }
  },
}
</script>