<template>
  <v-container fluid fill-height>
    <v-layout align-center justify-center>
      <v-btn color="primary" @click="setLayout('frontend-layout')">Frontend Layout</v-btn>
      <v-btn color="secondary" @click="setLayout('backend-layout')">Backend Layout</v-btn>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  methods: {
    setLayout (layout) {
      this.$store.commit('SET_LAYOUT', layout)
    }
  }
}
</script>