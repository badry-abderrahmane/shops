<template lang="html">
  <v-container
      fluid
      style="min-height: 0;"
      grid-list-lg
    >
      <v-layout row wrap>
        <v-flex xs12 md8 offset-md2>
          <v-card color="blue-grey darken-2" class="white--text">
            <v-card-title primary-title>
              <div class="headline">Nearby Shops is your best app to find the shops located near you!</div>
            </v-card-title>
            <v-card-actions>
              <v-btn flat dark @click="$router.push({ path:'/nearby' })">Discover</v-btn>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
