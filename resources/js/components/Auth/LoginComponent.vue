<template>
    <div>
        <v-dialog v-model="isLogin"
                  max-width="50%"
                  persistent>
            <template v-slot:activator="{ on, attrs }">
                <v-btn class="white--text" color="brown darken-4"
                       v-bind="attrs"
                       v-on="on"
                       depressed
                       block>
                    Login
                </v-btn>
            </template>
            <v-card>
                <v-card-title>
                    <v-row>
                        <v-col cols="10">
                            <span class="headline">Login</span>
                        </v-col>
                        <v-col class="text-right" cols="2">
                            <v-btn class="ma-2" text icon @click="closeForm">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-title>
                <v-card-text>
                    <validation-observer ref="loginForm" v-slot="{ invalid }">
                        <form @submit.prevent="submitLoginForm">
                            <validation-provider v-slot="{ errors }"
                                                 name="email"
                                                 rules="required|email">
                                <v-text-field
                                    v-model="email"
                                    :error-messages="errors"
                                    label="E-mail"
                                    type="email"
                                    required>
                                </v-text-field>
                            </validation-provider>

                            <validation-provider v-slot="{ errors }"
                                                 name="password"
                                                 rules="required">
                                <v-text-field v-model="password"
                                              :error-messages="errors"
                                              label="Password"
                                              type="password"
                                              required>
                                </v-text-field>
                            </validation-provider>

                            <v-row>
                                <v-col cols="12">
                                    <v-btn class="mr-4"
                                           type="submit"
                                           block>
                                        Login
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </form>
                    </validation-observer>
                </v-card-text>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import {required, email} from 'vee-validate/dist/rules';
import {extend, ValidationObserver, ValidationProvider, setInteractionMode} from 'vee-validate';

setInteractionMode('eager');

extend('required', {
    ...required,
    message: '{_field_} can not be empty',
});

extend('email', {
    ...email,
    message: 'Email must be valid',
});

const axios = require('axios');
axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

export default {
    name: "LoginComponent",
    components: {
        ValidationObserver,
        ValidationProvider,
    },
    data() {
        return {
            isLogin: false,
            checkbox: null,
            email: '',
            password: '',
            showPassword: false,
            valid: true,
        };
    },
    methods: {
        clearForm() {
            this.email = this.password = '';
        },
        closeForm() {
            this.clearForm();
            this.isLogin = false;
            this.$refs.loginForm.reset();
        },
        login() {
            const loginRequestData = {
                email: this.email,
                password: this.password
            }

            axios.post('/auth/login', loginRequestData).then((success) => {
                alert("Login Success");
                window.location.reload();
            }).catch((error) => {
                alert("Login Failed");
            });
        },
        submitLoginForm() {
            this.$refs.loginForm.validate().then(success => {
                if (success) {
                    this.login();

                    this.$nextTick(() => {
                        this.closeForm();
                    });
                } else {
                    alert('Username and/or Password is incorrect.')
                }
            });
        },
    },
}
</script>

<style scoped>

</style>
