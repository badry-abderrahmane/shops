<template>
  <v-app light>
    <v-toolbar fixed app color="teal darken-3" dark>
      <v-toolbar-title v-text="title"></v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-sm-and-down">
      <v-btn flat @click="$router.push({ name: 'Nearby' })"><v-icon color="green" class="mr-2">location_on</v-icon>Nearby Shops</v-btn>
      <v-btn flat @click="$router.push({ name: 'Favorite' })"><v-icon color="red" class="mr-2">favorite</v-icon>My preferred Shops</v-btn>
    </v-toolbar-items>
    </v-toolbar>
    <v-content>
      <router-view></router-view>
    </v-content>
    <v-footer :fixed="fixed" app>
      <span>&copy; 2017</span>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    data () {
      return {
        fixed: false,
        title: 'Nearby Shops v0.0.1'
      }
    }
  }
</script>
