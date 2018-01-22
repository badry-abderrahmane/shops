<template>
  <v-container fluid grid-list-md class="grey lighten-4" xs8>
    <v-layout row justify-space-around>
      <v-flex xs12 offset-xs0 md12 sm12 lg8 xl8>
        <v-card color="green darken-1">
          <v-card-title primary-title>
            <div>
              <h3 class="headline mb-0 white--text"><v-icon class="mr-1" color="white" large>location_on</v-icon>&nbsp;Nearby Shops</h3>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
    </v-layout>
    <v-layout row justify-space-around>
      <v-flex xs12 offset-xs0 md12 sm12 lg8 xl8>
        <v-layout row wrap>
          <v-progress-circular v-show="loading" indeterminate v-bind:size="70" v-bind:width="7" color="purple"></v-progress-circular>
          <v-flex v-show="!loading"
            xs12 sm4 md4 lg3
            v-for="shop in shops"
            :key="shop.name"
          >
            <v-card>
              <v-card-media
                :src="shop.picture"
                height="200px"
              >
                <v-container fill-height fluid>
                  <v-layout fill-height>
                    <v-flex  align-end flexbox>
                      <span class="headline white--text" v-text="shop.name"></span>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card-media>
              <v-card-actions class="white">
                <v-spacer></v-spacer>
                <v-btn color="success" @click="favorite(shop._id)">
                  <v-icon>favorite</v-icon>&nbsp;&nbsp;Like
                </v-btn>
                <v-btn color="error" @click="dislike(shop._id)">
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
    data(){
      return {
        loading: true,
      }
    },
    mounted(){
      this.loading = false
    },
    computed:{
      shops: function(){
        return this.$store.state.shops
      }
    },
    methods:{
      favorite(id){
        axios.post('/shops/favorite', {
          shop_id: id
        })
        .then(function (response) {
          this.$store.dispatch('LOAD_SHOPS_LIST')
          this.$store.dispatch('LOAD_FAVORITES_LIST')
        })
        .catch(function (error) {
          console.log(error);
        });
      },
      dislike(id){
        axios.post('/shops/dislike', {
          shop_id: id
        })
        .then(function (response) {
          this.$store.dispatch('LOAD_SHOPS_LIST')
          this.$store.dispatch('LOAD_FAVORITES_LIST')
        })
        .catch(function (error) {
          console.log(error);
        });
      }
    }
}
</script>
