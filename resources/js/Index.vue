<template>
  <v-app>
    <component v-bind:is="layout"></component>
  </v-app>
</template>

<script>
import CompanyLayout from './layouts/CompanyLayout'
import StudentLayout from './layouts/StudentLayout'
import LoginSignupLayout from './layouts/LoginSignupLayout'
import AdminLayout from './layouts/AdminLayout'

export default {
  computed: {
    layout () {
      return this.$store.getters.layout
    }
  },
  components: {
    'company-layout': CompanyLayout,
    'student-layout': StudentLayout,
    'loginsignup-layout': LoginSignupLayout,
    'admin-layout': AdminLayout,
    // define as many layouts you want for the application
  }
}
</script>