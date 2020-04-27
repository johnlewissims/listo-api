<template>
  <div class="container" id="request-page">
    <div class="form center-h">
      <div class="heading">
        <h1>I Lost My Password...</h1>
      </div>
      <div class="siimple-field">
          <div class="siimple-field-label">Your email</div>
          <input type="text" v-model.trim="email" class="siimple-input siimple-input--fluid" placeholder="you@company.com">
      </div>
      <div class="siimple-btn siimple-btn--primary siimple-btn--fluid" v-bind:class="{ 'siimple-btn--disabled':(this.email == '') }" v-on:click="submit">
          Reset my Password
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data() {
        return {
          email: '',
          isActive: true,
        }
      },
      computed: {
      },
      mounted() {
      },
      methods: {
        submit() {
          console.log(this.email)
        }
      }
    }
</script>
