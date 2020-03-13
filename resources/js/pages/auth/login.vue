<template>
  <!-- <div class="row">
    <div class="col-lg-8 m-auto">
      <card :title="$t('login')">
        <form @submit.prevent="login" @keydown="form.onKeydown($event)"> -->
          <!-- Email -->
          <!-- <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
            <div class="col-md-7">
              <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
              <has-error :form="form" field="email" />
            </div>
          </div> -->

          <!-- Password -->
          <!-- <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
            <div class="col-md-7">
              <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
              <has-error :form="form" field="password" />
            </div>
          </div> -->

          <!-- Remember Me -->
          <!-- <div class="form-group row">
            <div class="col-md-3" />
            <div class="col-md-7 d-flex">
              <checkbox v-model="remember" name="remember">
                {{ $t('remember_me') }}
              </checkbox>

              <router-link :to="{ name: 'password.request' }" class="small ml-auto my-auto">
                {{ $t('forgot_password') }}
              </router-link>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-7 offset-md-3 d-flex"> -->
              <!-- Submit Button -->
              <!-- <v-button :loading="form.busy">
                {{ $t('login') }}
              </v-button> -->

              <!-- GitHub Login Button -->
              <!-- <login-with-github />
            </div>
          </div>
        </form>
      </card>
    </div>
  </div> -->




  <div class="main-container">
    <div class="row mr-0">
      <div class="col-sm-12 col-md-6 d-none d-md-block">
          <img class="img-fluid" src="img/Group 20 (1).png">
      </div>
      <div class="col-sm-12 col-md-4 p-5 mx-auto">

          <div class="bg- h-100 p-3 shadow mx-auto" >
              <h5 class="mb-4 text-cursive" style="text-align: center;">Login</h5>

              <form @submit.prevent="login" @keydown="form.onKeydown($event)">

                <div class="form-group">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email" placeholder="Email or username">
                  <has-error :form="form" field="email" />
                </div>


                <div class="form-group">
                  <input type="password" v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" name="password" placeholder="Password">
                  <has-error :form="form" field="password" />
                </div>

                <!-- Remember Me -->
                <div class="form-group">
                  <!-- <div class="col-md-3" /> -->
                  <!-- <div class="col-md-7 d-flex"> -->
                    <checkbox v-model="remember" name="remember">
                      {{ $t('remember_me') }}
                    </checkbox>

                    <router-link :to="{ name: 'password.request' }" class="small my-auto float-right">
                      {{ $t('forgot_password') }}
                    </router-link>
                  <!-- </div> -->
                </div>

                <div class="form-group">
                  <!-- <v-button class="form-control" :loading="form.busy">
                    {{ $t('login') }}
                  </v-button> -->
                  <input type="submit"  class="form-control" :loading="form.busy" value="LOGIN"  style="background: #1089FF; color: white; font-size: 12px;">
                </div>
                <p style="text-align: center;"> OR</p>
                <div class="form-group">
                  <input type="submit" class="form-control" value="LOGIN WITH GOOGLE" style="background: #23374D; color: white; font-size: 12px;">
                </div>
                <div class="form-group">
                  <input type="submit" class="form-control" value="LOGIN WITH FACEBOOK" style="background: #1089FF; color: white; font-size: 12px;">
                </div>
              </form>
          </div>

      </div>
    </div>

  </div>
</template>

<script>
import Form from 'vform'
import LoginWithGithub from '~/components/LoginWithGithub'

export default {
  middleware: 'guest',

  components: {
    LoginWithGithub
  },

  metaInfo () {
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),

  methods: {
    async login () {
      // Submit the form.
      const { data } = await this.form.post('/api/login')

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.$router.push({ name: 'home' })
    }
  }
}
</script>

<style scoped>
    /* Rubican */

    .text-muted pl-2 {
    position: absolute;
    width: 115px;
    height: 36px;
    left: 130px;
    top: 28px;

    font-family: Rubik;
    font-style: normal;
    font-weight: normal;
    font-size: 30px;
    line-height: 36px;
    /* identical to box height */


    color: #000000;
    }

    .input-icons i, select {
      position: absolute;
      margin-bottom: 10px;
    }

    .input-icons {
      width: 80%;
    }

    .icon {
      padding: 10px;
      color: black;
      min-width: 50px;
      text-align: center;
    }

    .input-field {
      width: 80%;
      padding: none;
      border: none;
      text-align: center;
    }

    placeholder {
    margin-left: 10px;
    }

    select {
      padding: 14px;
      min-width: 60px;
      border: none;
      cursor: pointer;
      height: 26px;
    }

    p {
      color: black;
    }

    .main-container {
      height: 80%;
      width: 100%;
      margin-top: none;
      background-color: #d7d7d7;
    }

    .main-container img {
      margin-left: 11%;
      padding-top: 2%;
      bottom: 2%;
    }

    .box-container {
      width: 35%;
      background-color: lightgrey;
      float: right;
    }

    .form-group .btn btn-primary {
      width: 100%;
    }

    .form-group {
      height: 20px;
      border: none;
    }

    .form-group input {
      height: 32px;
    }



</style>

