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
              <div class="headline">Login</div>
            </v-card-title>

              <v-flex xs12>
                <v-form v-model="valid">
                  <v-text-field dark color="green"
                    label="Email"
                    v-model="email"
                    :rules="emailRules"
                    :counter="10"
                    required
                  ></v-text-field>
                  <v-text-field dark color="green"
                    name="password"
                    label="Enter your password"
                    hint="At least 6 characters"
                    min="6"
                    :append-icon="e3 ? 'visibility' : 'visibility_off'"
                    :append-icon-cb="() => (e3 = !e3)"
                    :type="e3 ? 'password' : 'text'"
                    :rules="passwordRules"
                  ></v-text-field>
                </v-form>
              </v-flex>

            <v-card-actions>
              <v-btn flat dark>Login</v-btn>&nbsp;Or&nbsp;
              <v-btn flat dark>Register</v-btn>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
</template>

<script>
export default {
  data () {
    return {
      valid: false,
      e3: true,
      email: '',
      emailRules: [
        (v) => !!v || 'E-mail is required',
        (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
      ],

      password: '',
      passwordRules: [
        (v) => !!v || 'Password is required',
        (v) => v.length >= 6 || 'Password must be more than 6 characters'
      ],

    }
  }
}
</script>

<style lang="css">
</style>
