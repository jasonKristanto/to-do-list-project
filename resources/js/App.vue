<template>
    <v-app>
        <v-main>
            <v-btn
                color="primary"
                elevation="2"
                medium
            >This is button</v-btn>
            <v-btn
                @click="login"
                color="primary"
                elevation="2"
                medium
            >This is login button</v-btn>
            <v-btn
                @click="logout"
                color="primary"
                elevation="2"
                medium
            >This is logout button</v-btn>
            <v-btn
                @click="getTodosTitle"
                color="primary"
                elevation="2"
                medium
            >This is get todos title button</v-btn>
        </v-main>
    </v-app>
</template>

<script>
export default {
    name: "App",
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
        }
    }
}
</script>

<style scoped>

</style>
