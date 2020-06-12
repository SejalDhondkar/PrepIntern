<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
    >
      <v-list dense>
        <template v-for="item in items">
          <v-row
            v-if="item.heading"
            :key="item.heading"
            align="center"
          >
            <v-col cols="6">
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-col>
            <v-col
              cols="6"
              class="text-center"
            >
              <a
                href="#!"
                class="body-2 black--text"
              >EDIT</a>
            </v-col>
          </v-row>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon=""
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title>
                  {{ item.text }}
                </v-list-item-title>
              </v-list-item-content>
            </template>
            <v-list-item
              v-for="(child, i) in item.children"
              :key="i"
              link
              :to="child.link"
              id="child"
            >
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  {{ child.text }}
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item
            v-else
            :key="item.text"
            link
            :to="item.link"
            id="list"
          >
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                {{ item.text }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      app
      color="blue darken-3"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title
        style="width: 300px"
        class="ml-0 pl-4"
      >
        <span class="hidden-sm-and-down">PrepIntern</span>
      </v-toolbar-title>
     <!-- <v-text-field
        flat
        solo-inverted
        hide-details
        prepend-inner-icon="mdi-magnify"
        label="Search"
        class="hidden-sm-and-down"
      ></v-text-field> -->
      <v-spacer></v-spacer>
      <!-- <v-btn icon>
        <v-icon>mdi-apps</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>mdi-bell</v-icon>
      </v-btn> -->
      <v-tooltip bottom>
      <template v-slot:activator="{ on }">
        <v-btn
          icon
          large
          class="mr-4"
          v-on="on"
          @click="profile"
        >
          <v-avatar
            size="32px"
            item
          >
            <v-icon dark>mdi-account</v-icon></v-avatar>
        </v-btn>
      </template>
      <span>View Profile</span>
    </v-tooltip>
    </v-app-bar>
    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <router-view></router-view>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: false,
      items: [
        { icon: 'mdi-view-dashboard-outline', text: 'Dashboard', link: '/student/dashboard' },
        {
          icon: 'mdi-chevron-up',
          'icon-alt': 'mdi-chevron-down',
          text: 'Add/Edit Details',
          model: false,
          children: [
            { text: 'Education Details', link: '/student/educationdetails'},
            { text: 'Experience Details', link: '/student/experiencedetails' },
            { text: 'Training/Project Details', link: '/student/otherexperiencedetails' },
            { text: 'Other Details',  link: '/student/otherdetails' },
          ],
        },
        { icon: 'mdi-file-multiple-outline', text: 'View Internships', link: '/student/internships/main' },
        { icon: 'mdi-message-outline', text: 'Send feedback', link: '' },
        { icon: 'mdi-phone-outline', text: 'Contact Us', link: '' },
        { icon: 'mdi-power', text: 'Log Out', link: '' },
        // { icon: 'mdi-help-circle-outline', text: 'Help' },
      ],
    }),

    methods: {
      profile(){
        this.$router.push('/profile');
      }
    }
  }
</script>

<style scoped>
#child, #list {
    text-decoration: none;
}
</style>