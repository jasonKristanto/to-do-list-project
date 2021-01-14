<template>
    <v-app>
        <v-main>
            <section>
                <v-parallax src="/assets/homepage.jpg" light>
                    <v-row align="center" justify="center">
                        <v-col class="text-center" cols="12">
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
                    <v-row align="center" justify="center">
                        <v-col cols="6">
                            <login-component></login-component>
                        </v-col>
                        <v-col cols="6">
                            <register-component></register-component>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="6">
                            <v-btn block @click="getTodosTitle">GET TODOS</v-btn>
                        </v-col>
                        <v-col cols="6">
                            <v-btn block @click="logout">LOGOUT</v-btn>
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
        logout: function () {
            var config = {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            };

            var axios = require('axios');
            axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

            axios.post('auth/logout', '', config).then(response => {
                console.log(response.data);
                this.posts = response.data.data;
                location.reload();
            }).catch(error => {
                console.log(error.response);
            })
        },
        getTodosTitle: function () {
            var config = {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            };

            var axios = require('axios');
            axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

            axios.get('api/todos/title', config).then(response => {
                console.log(response.data);
            }).catch(error => {
                console.log(error.response);
            });
        },
    }
}
</script>

<style scoped>

</style>
