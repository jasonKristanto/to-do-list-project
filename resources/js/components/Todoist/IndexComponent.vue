<template>
    <v-app>
        <v-app-bar app color="brown lighten-5" dark elevation="0">
            <h1 class="brown--text darken-4">My todoists</h1>
            <v-spacer></v-spacer>
            <v-btn @click="createNew" color="brown darken-4" class="mr-2">Create New Todoist</v-btn>
            <v-btn @click="logout" color="brown lighten-5" class="mr-2 brown--text">Logout</v-btn>
        </v-app-bar>

        <v-content>
            <v-container fluid>
                <v-btn @click="seeExisting()">See existing todoist</v-btn>
                <v-row dense>
                    <v-col v-for="todoistTitle in todoistsTitle" :key="todoistTitle.title_id">
                        <v-card max-width="344">
                            <v-card-title>
                                {{ todoistTitle.title }}
                            </v-card-title>

                            <v-card-subtitle>
                                {{ todoistTitle.description }}
                            </v-card-subtitle>

                            <v-card-actions>
                                <v-btn color="orange lighten-2" text>
                                    Explore
                                </v-btn>

                                <v-spacer></v-spacer>

                                <v-btn icon @click="show = !show">
                                    <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                                </v-btn>
                            </v-card-actions>

                            <v-expand-transition>
                                <div v-show="show">
                                    <v-divider></v-divider>

                                    <v-card-text>
                                        <ol>
                                            <li v-for="todo in todoists" :key="todo.id">
                                                {{ todo.todos }}
                                            </li>
                                        </ol>
                                    </v-card-text>
                                </div>
                            </v-expand-transition>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
import LogoutMixin from "../../plugins/mixins/LogoutMixins";
import CreateNewMixin from "../../plugins/mixins/CreateNewMixins";
import SeeExistingMixin from "../../plugins/mixins/SeeExistingMixins";

const axios = require('axios');
axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

export default {
    name: "IndexComponent",
    mixins: [CreateNewMixin, LogoutMixin, SeeExistingMixin],
    data() {
        return {
            todoistsTitle: null,
            todoists: null,
            show: false,
        };
    },
    mounted() {
        this.getTodoist();
    },
    methods: {
        async getTodoist() {
            var config = {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            };

            await axios.post('api/todos/', config).then(response => {
                console.log(response.data);
                this.todoistsTitle = response.data.data.todoists_title;
                this.todoists = response.data.data.todoists;

                console.log(this.todoistsTitle)
                console.log(this.todoists)
            }).catch(error => {
                console.log(error.response);
            });
        },
    },
}
</script>

<style scoped>

</style>
