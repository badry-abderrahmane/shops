<template lang="html">
  <v-container
      fluid
      style="min-height: 0;"
      grid-list-lg
    >
      <v-layout row wrap>
        <v-flex xs12 md4 offset-md4>
          <v-card color="teal darken-3" class="white--text">
            <v-card-title primary-title>
              <div class="headline">Register</div>
            </v-card-title>

              <v-flex xs12>
                <v-form v-model="valid">
                  <v-text-field dark color="green"
                    label="Name"
                    v-model="name"
                    :rules="nameRules"
                    :counter="10"
                    required
                  ></v-text-field>
                  <v-text-field dark color="green"
                    label="E-mail"
                    v-model="email"
                    :rules="emailRules"
                    required
                  ></v-text-field>
                  <v-text-field dark color="green"
                    label="Password"
                    v-model="password"
                    :rules="password"
                    required
                  ></v-text-field>
                  <v-text-field dark color="green"
                    label="Confirm Password"
                    v-model="password_confirmation"
                    :rules="password"
                    required
                  ></v-text-field>
                </v-form>
              </v-flex>

            <v-card-actions>
              <v-btn flat dark>Register</v-btn>&nbsp;Or&nbsp;
              <v-btn flat dark>Login</v-btn>
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
