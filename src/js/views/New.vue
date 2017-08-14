<template>
  <div>
    <form v-if="loggedIn">
  		<h1>Post a New Job</h1>
  		{{ loggedIn }}
	</form>
	<div v-else>
            <form accept-charset="UTF-8" @submit.prevent="doLogin">
                <div class="errors" v-if="errors">
                    {{ errors }}
                </div>

                <input type="hidden" :name="csrfName" :value="csrfToken">

                <h3><label for="loginName">Username or email</label></h3>
                <input id="loginName" type="text" name="loginName" placeholder="username" v-model="theUser.loginName">

                <h3><label for="password">Password</label></h3>
                <input id="password" type="password" name="password" v-model="theUser.password">

                <button type="submit">Login</button>

            </form>
        </div>
  </div>
</template>

<script>
    import VueResource from 'vue-resource'

    export default {
        name: 'new',
        props: [ 'loggedIn' ],
        data () {
            return {
                theUser: {
                    loginName: null,
                    password: null,
                    action: 'users/login',
                    returnUrl: '/new'
                },
                errors: null,
                message: null,
            }
        },
        computed: {
            csrfName () {
                return window.csrfTokenName
            },
            csrfToken () {
                return window.csrfTokenValue
            }
        },
        methods: {
            doLogin () {
                let data = this.theUser

                this.$http.post('/', data)
                .then(function (response) {
                    console.log(response)
                    if (response.body.success) {
                        this.$router.go('/new')
                    }
                    if (response.body.error) {
                        this.errors = response.body.error
                    }
                })
            }
        }
    }
</script>

<style scoped lang="scss">
    .errors {
        background: red;
        color: white;
        padding: 1rem;
    }
</style>