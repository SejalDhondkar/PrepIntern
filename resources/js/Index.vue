<template>
  <v-app>
    <component v-bind:is="layout"></component>
  </v-app>
</template>

<script>
import BackendLayout from './layouts/BackendLayout'
import FrontendLayout from './layouts/FrontendLayout'
export default {
  computed: {
    layout () {
      return this.$store.getters.layout
    }
  },
  components: {
    'backend-layout': BackendLayout,
    'frontend-layout': FrontendLayout
    // define as many layouts you want for the application
  }
}
</script>