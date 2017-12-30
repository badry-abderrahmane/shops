<template>
  <v-container fluid grid-list-md class="grey lighten-4" xs8>
    <v-layout row justify-space-around>
      <v-flex xs12 offset-xs0 md12 sm12 lg8 xl8>
        <v-card color="red darken-1">
          <v-card-title primary-title>
            <div>
              <h3 class="headline mb-0 white--text"><v-icon class="mr-1" color="white" large>favorite</v-icon>&nbsp;My Preferred Shops</h3>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
    </v-layout>
    <v-layout row justify-space-around>
      <v-flex xs12 offset-xs0 md12 sm12 lg8 xl8>
        <v-layout row wrap>
          <v-flex
            xs12 sm4 md4 lg3
            v-for="card in cards"
            :key="card.title"
          >
            <v-card>
              <v-card-media
                :src="card.src"
                height="200px"
              >
                <v-container fill-height fluid>
                  <v-layout fill-height>
                    <v-flex  align-end flexbox>
                      <span class="headline white--text" v-text="card.title"></span>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card-media>
              <v-card-actions class="white">
                <v-spacer></v-spacer>
                <v-btn color="error">
                  <v-icon>delete_sweep</v-icon>&nbsp;&nbsp;Dislike
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>


    </v-container>
</template>

<script>
export default {
    data: () => ({
      cards: [
        { title: 'Pre-fab homes', src: '/static/doc-images/cards/house.jpg'},
        { title: 'Favorite road trips', src: '/static/doc-images/cards/road.jpg'},
      ]
    })
}
</script>
