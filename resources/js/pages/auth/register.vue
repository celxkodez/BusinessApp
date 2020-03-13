<template>
  <!-- <div class="row">
    <div class="col-lg-8 m-auto">
      <card v-if="mustVerifyEmail" :title="$t('register')">
        <div class="alert alert-success" role="alert">
          {{ $t('verify_email_address') }}
        </div>
      </card>
      <card v-else :title="$t('register')">
        <form @submit.prevent="register" @keydown="form.onKeydown($event)"> -->
          <!-- Name -->
          <!-- <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('username') }}</label>
            <div class="col-md-7">
              <input v-model="form.username" :class="{ 'is-invalid': form.errors.has('username') }" class="form-control" type="text" name="username">
              <has-error :form="form" field="username" />
            </div>
          </div> -->

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

          <!-- Password Confirmation -->
          <!-- <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">{{ $t('confirm_password') }}</label>
            <div class="col-md-7">
              <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" type="password" name="password_confirmation">
              <has-error :form="form" field="password_confirmation" />
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-7 offset-md-3 d-flex"> -->
              <!-- Submit Button -->
              <!-- <v-button :loading="form.busy">
                {{ $t('register') }}
              </v-button> -->

              <!-- GitHub Register Button -->
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
          <img class="img-fluid" src="img/Group 21.png">
      </div>
      <div class="col-sm-12 col-md-4 p-3 mx-auto">
          
          <div class="bg- h-100 p-3 shadow mx-auto" >
              <h5 class="mb-4 text-cursive" style="text-align: center;">Sign Up</h5>
              <form @submit.prevent="register" @keydown="form.onKeydown($event)">
                
                <!-- for the email  -->
                <div class="form-group">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email" placeholder="Email">
                  <has-error :form="form" field="email" />
                </div>

                <!-- username -->
                <div class="form-group">
                  <input type="text" v-model="form.username" :class="{ 'is-invalid': form.errors.has('username') }" class="form-control" name="username" placeholder="Username">
                  <has-error :form="form" field="username" />
                </div>

                <!-- password feild -->
                <div class="form-group">
                  <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password" placeholder="Password">
                  <has-error :form="form" field="password" />
                </div>


                <!-- for the confirm password feild -->
                <div class="form-group">
                  <input placeholder="Confirm Password" v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" type="password" name="password_confirmation">
                  <has-error :form="form" field="password_confirmation" />
                </div>

                <div class="form-group">
                  <input type="submit" :loading="form.busy" class="form-control" value="SIGN UP"  style="background: #1089FF; color: white;">
                </div>

                <p style="text-align: center;"> OR</p>
                  <div class="form-group">
                  <input type="submit" class="form-control" value="SIGN UP WITH GOOGLE" style="background: #23374D; color: white;">
                </div>

                  <div class="form-group">
                  <input type="submit" class="form-control" value="SIGN UP WITH FACEBOOK" style="background: #1089FF; color: white;">
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
    return { title: this.$t('register') }
  },

  data: () => ({
    form: new Form({
      username: '',
      email: '',
      password: '',
      password_confirmation: ''
    }),
    mustVerifyEmail: false
  }),

  methods: {
    async register () {
      // Register the user.
      const { data } = await this.form.post('/api/register')

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Log in the user.
        const { data: { token } } = await this.form.post('/api/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'home' })
      }
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
