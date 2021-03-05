<template>
    <div>
        <v-dialog
            v-model="isRegister"
            max-width="50%"
            persistent
        >
            <template v-slot:activator="{ on, attrs }">
                <v-btn
                    class="black"
                    color="brown lighten-5"
                    v-bind="attrs"
                    v-on="on"
                    depressed
                    block
                >Register
                </v-btn>
            </template>
            <v-card>
                <v-card-title>
                    <v-row>
                        <v-col cols="10">
                            <span class="headline">Register</span>
                        </v-col>
                        <v-col class="text-right" cols="2">
                            <v-btn class="ma-2" text icon @click="closeForm">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-title>
                <v-card-text>
                    <validation-observer ref="registerForm" v-slot="{ invalid }">
                        <form @submit.prevent="submitRegisterForm">
                            <validation-provider v-slot="{ errors }"
                                                 name="name"
                                                 rules="required|alpha_spaces">
                                <v-text-field
                                    v-model="name"
                                    :error-messages="errors"
                                    label="Name"
                                    required>
                                </v-text-field>
                            </validation-provider>

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
                                        Register
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
import {required, email, alpha_spaces} from 'vee-validate/dist/rules';
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

extend('alpha_spaces', {
    ...alpha_spaces,
    message: 'The {_field_} may only contain alphabetic characters as well as spaces',
});

const axios = require('axios');
axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

export default {
    name: "RegisterComponent",
    components: {
        ValidationObserver,
        ValidationProvider,
    },
    data() {
        return {
            isRegister: false,
            checkbox: null,
            name: '',
            email: '',
            password: '',
            showPassword: false,
            showDialogMessage: false,
            valid: true,
        };
    },
    methods: {
        clearForm() {
            this.email = this.password = this.name = '';
        },
        closeForm() {
            this.clearForm();
            this.isRegister = false;
            this.$refs.registerForm.reset();
        },
        register() {
            this.$store.dispatch('register', {
                name: this.name,
                email: this.email,
                password: this.password,
            }).then(response => {
                alert("Registration Success. Please go to login section");
            }).catch((error) => {
                alert("Registration Failed");
            });
        },
        submitRegisterForm() {
            this.$refs.registerForm.validate().then(success => {
                if (success) {
                    this.register();

                    this.$nextTick(() => {
                        this.closeForm();
                    });
                }
            });
        },
    },
}
</script>

<style scoped>

</style>
