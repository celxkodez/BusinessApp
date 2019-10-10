<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>

          <div class="card-body">
            <div v-if="message" class="alert">{{ message }}</div>
            <form @submit.prevent="onSubmit($event)" v-else>
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" v-model="user.email" />
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">username</label>

                <div class="col-md-6">
                  <input id="username" type="text" class="form-control" v-model="user.username" />
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" v-model="user.password" />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="password-confirm"
                  class="col-md-4 col-form-label text-md-right"
                >Confirm Password</label>

                <div class="col-md-6">
                  <input
                    id="password-confirm"
                    type="password"
                    class="form-control"
                    v-model="user.cpassword"
                  />
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" :disabled="saving">{{ saving ? 'Creating...' : 'Create' }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import api from "../../api/users";

export default {
  data() {
    return {
      saving: false,
      message: false,
      user: {
        username: "",
        email: "",
        password: ""
      }
    };
  },
  methods: {
    onSubmit($event) {
      this.saving = true;
      this.message = false;
    //  console.log(this.user);
      api
        .create(this.user)
        .then(response => {
          console.log(response);
        //   this.$router.push();
        })
       .catch(e => {
          this.message =
            e.response.data.message || "There was an issue creating the user.";
        })
        .then(() => (this.saving = false));
    }
  }
};
</script>
<style lang="scss" scoped>
$red: lighten(red, 30%);
$darkRed: darken($red, 50%);

.form-group {
  margin-bottom: 1em;
  label {
    display: block;
  }
}
.alert {
  background: $red;
  color: $darkRed;
  padding: 1rem;
  margin-bottom: 1rem;
  width: 50%;
  border: 1px solid $darkRed;
  border-radius: 5px;
}
</style>
