<template>
    <v-app>
        <v-app-bar app color="brown lighten-5" dark elevation="0">
            <v-btn @click="goToHome" color="white" class="mr-2 brown--text">My todoists</v-btn>
            <v-spacer></v-spacer>
            <v-btn @click="createNew" color="brown darken-4" class="mr-2">Create New Todoist</v-btn>
            <v-btn @click="logout" color="brown lighten-5" class="mr-2 brown--text">Logout</v-btn>
        </v-app-bar>

        <v-content>
            <v-card class="mx-auto" max-width="750" outlined>
                <v-card-title class="mb-5">
                    <v-text-field
                        v-model="todoistTitle.title"
                        label="Todoist Title"
                        hide-details="auto"
                    ></v-text-field>
                </v-card-title>

                <v-card-subtitle>
                    <v-text-field
                        v-model="todoistTitle.description"
                        label="Todoist Description"
                        hide-details="auto"
                    ></v-text-field>
                </v-card-subtitle>

                <v-card-text>
                    <div v-for="todo in todoists" :key="todo.id">
                        <v-checkbox
                            v-model="todo.status"
                            :label="todo.todos"
                        ></v-checkbox>
                    </div>
                </v-card-text>
            </v-card>
        </v-content>
    </v-app>
</template>

<script>
import GoToHomeMixin from "../../plugins/mixins/GoToHomeMixins";
import LogoutMixin from "../../plugins/mixins/LogoutMixins";
import CreateNewMixin from "../../plugins/mixins/CreateNewMixins";
import SeeExistingMixin from "../../plugins/mixins/SeeExistingMixins";

const axios = require('axios');
axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

export default {
    name: "TodoistComponent",
    mixins: [CreateNewMixin, GoToHomeMixin, LogoutMixin, SeeExistingMixin],
    data() {
        return {
            todoistTitle: null,
            todoists: null,
        }
    },
    mounted() {
        console.log(this.$route.params.id)
        this.getTodoists();
    },
    methods: {
        async getTodoists() {
            var config = {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            };

            var data = {
                id: this.$route.params.id
            };

            await axios.post('api/todos/get-todoist', data, config).then(response => {
                console.log(response.data);
                this.todoistTitle = response.data.data.todoists_title[0];
                this.todoists = response.data.data.todoists;
            }).catch(error => {
                console.log(error.response);
            });
        }
    },
}
</script>

<style scoped>

</style>
