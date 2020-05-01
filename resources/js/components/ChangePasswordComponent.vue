<template>
  <div class="container" id="request-page" v-if="unlock">
    <div class="form center-h">
      <div class="heading">
        <h1>Set a New Password</h1>
      </div>
      <div class="siimple-field">
          <div class="siimple-field-label">Your new password</div>
          <input type="password" v-model.trim="password" class="siimple-input siimple-input--fluid">
      </div>
      <div class="siimple-field">
          <div class="siimple-field-label">Confirm password</div>
          <input type="password" v-model.trim="confirmPassword" class="siimple-input siimple-input--fluid">
      </div>
      <div class="siimple-btn siimple-btn--primary siimple-btn--fluid" v-bind:class="{ 'siimple-btn--disabled':(this.confirmPassword == '') }" v-on:click="submit">
          Reset my Password
      </div>
      <div v-if="message" class="alert siimple-alert siimple-alert--success" v-bind:class="{ 'siimple-alert--error':this.error }">
        {{this.message}}
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data() {
        return {
          password: '',
          confirmPassword: '',
          isActive: true,
          message: '',
          error: false,
          token: this.$attrs.token,
          unlock: true,
          email: ''
        }
      },
      computed: {
      },
      mounted() {
        window.axios.get('http://app-api.test/api/password/find/' + this.token)
        .then((response) => {
          this.email = response.data.email
        })
        .catch((response) => {
          this.unlock = false
        })
      },
      methods: {
        submit() {
          if(this.password != this.confirmPassword) {
            this.error = true
            this.message = 'Password mismatch'
          } else {
            window.axios.post('http://app-api.test/api/password/reset', {
              email: this.email,
              password: this.password,
              token: this.token ,
            })
            .then((response) => {
              this.error = response.data.error
              this.message = response.data.message
            });
          }
        }
      }
    }
</script>
