<template>
    <v-app>
        <v-main>
            <section>
                <div class="bg">
                    <div class="main">
                        <div class="custom-center" style="background-color: #9da3a3a8;">
                            <v-row align="center" justify="center">
                                <v-col class="text-center" cols="12">
                                    <h1 class="display-1 font-weight-thin mb-4">
                                        Todoists
                                    </h1>
                                    <h4 class="subheading">
                                        Let's do all your to-do lists today to live life the fullest!
                                    </h4>
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
                        </div>
                    </div>
                </div>
            </section>
        </v-main>
    </v-app>
</template>

<script>
import LoginComponent from "./LoginComponent";
import RegisterComponent from "./RegisterComponent";

export default {
    name: "IndexComponent",
    data() {
        return {};
    },
    components: {
        LoginComponent,
        RegisterComponent,
    },
}
</script>

<style scoped>
.bg {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background: url('https://images.unsplash.com/photo-1530041859951-6cbea5e69b14?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1950&q=80') no-repeat center center;
    background-size: cover;
}

.main {
    height: 100%;
    position: relative;
}

.custom-center {
    margin: 0;
    position: absolute;
    width: 75%;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    border-radius: 10px;
    padding: 20px;
}
</style>
