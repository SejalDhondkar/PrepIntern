<template>
  <v-card
    class="mx-auto p-4"
    width="700"
    raised
  >
    <v-form
    ref="form"
    v-model="valid"
    lazy-validation
  >
    <v-text-field
      v-model="role.title"
      :counter="20"
      :rules="titleRules"
      label="Title"
      required
    ></v-text-field>

    <v-text-field
      v-model="role.description"
      :rules="descriptionRules"
      :counter="200"
      label="Description"
      required
    ></v-text-field>

    
    <v-btn
      :disabled="!valid"
      color="success"
      class="mr-4"
      @click="submit"
    >
      Submit
    </v-btn>

    
  </v-form>
  </v-card>
</template>

<script>
  export default {
    data: () => ({
      valid: true,
      
      titleRules: [
        v => !!v || 'Title is required',
        v => (v && v.length <= 20) || 'Title must be less than 20 characters',
      ],
      
      descriptionRules: [
        v => !!v || 'Description is required',
        v => (v && v.length <= 200) || 'Description must be less than 200 characters',
      ],
      role: {
          title: '',
          description: '',
      }
      
    }),

    created() {
      this.$store.commit('SET_LAYOUT', 'admin-layout');
        let uri = `http://127.0.0.1:8000/api/roles/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.role = response.data;
        });
      },

    methods: {
    submit() {
      this.errors = {};
      axios.put(`/roles/update/${this.$route.params.id}`, this.role).then(response => {
        console.log('Message sent!');
        this.$router.push('/roles');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      
    },
  },
  }
</script>