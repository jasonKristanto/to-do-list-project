<template>
    <v-app>
        <v-main>
            <section>
                <v-parallax
                    src="https://images.unsplash.com/photo-1517842645767-c639042777db?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                    light
                >
                    <v-row
                        align="center"
                        justify="center"
                    >
                        <v-col
                            class="text-center"
                            cols="12"
                        >
                            <div class="brown lighten-2">
                                <h1 class="display-1 font-weight-thin mb-4">
                                    Todoful
                                </h1>
                                <h4 class="subheading">
                                    Do what you have to do today, <br> so every day you live your life with fullest!
                                </h4>
                            </div>
                        </v-col>
                    </v-row>
                    <v-row
                        align="center"
                        justify="center"
                    >
                        <v-col cols="6">
                            <login-component></login-component>
                        </v-col>
                        <v-col cols="6">
                            <register-component></register-component>
                        </v-col>
                    </v-row>
                </v-parallax>
            </section>
        </v-main>
    </v-app>
</template>

<script>
import LoginComponent from "./components/Auth/LoginComponent"
import RegisterComponent from "./components/Auth/RegisterComponent"

export default {
    name: "App",
    data() {
        return {}
    },
    components: {
        LoginComponent,
        RegisterComponent
    },
    methods: {
        login: function () {
            var config = {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            }

            const data = {
                email: 'jason@gmail.com',
                password: 'password'
            }
            var axios = require('axios')
            axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content
            axios.post('auth/login', data, config).then(response => {
                this.token = response.data.token
            }).catch(error => {
                console.log(error)
            })
        },
        logout: function () {
            var config = {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            }

            var axios = require('axios')
            axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content

            axios.post('auth/logout', '', config).then(response => {
                console.log(response.data)
                this.posts = response.data.data
            }).catch(error => {
                console.log(error.response)
            })
        },
        getTodosTitle: function () {
            var config = {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            }

            var axios = require('axios')
            axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content

            axios.get('api/todos/title', config).then(response => {
                console.log(response.data)
            }).catch(error => {
                console.log(error.response)
            })
        },
    }
}
</script>

<style scoped>

</style>
