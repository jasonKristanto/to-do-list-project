<template>
    <v-app>
        <v-app-bar app color="brown lighten-5" dark elevation="0">
            <v-btn @click="goToHome" color="white" class="mr-2 brown--text">My todoists</v-btn>
            <v-spacer></v-spacer>
            <v-btn @click="logout" color="brown lighten-5" class="mr-2 brown--text">Logout</v-btn>
        </v-app-bar>

        <v-content>
            <v-card class="mx-auto" max-width="750">
                <v-card-title class="mb-5">
                    <v-text-field
                        v-model="todoistTitle"
                        label="Todoist Title"
                        hide-details="auto"
                    ></v-text-field>
                </v-card-title>

                <v-card-subtitle>
                    <v-text-field
                        v-model="todoistDesc"
                        label="Todoist Description"
                        hide-details="auto"
                    ></v-text-field>
                </v-card-subtitle>

                <v-card-text>
                    <div>
                        <div v-for="(todo, index) in todoists" :key="index">
                            <v-row>
                                <v-col>
                                    <v-checkbox v-model="todo.status" :label="todo.todos"></v-checkbox>
                                </v-col>
                                <v-col class="mr-2">
                                    <v-text-field
                                        v-model="todo.todos"
                                        label="Edit Your Todos"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="2">
                                    <v-btn @click="removeTodos(index, todo)" class="mx-2 mt-3" fab dark small
                                           color="red">
                                        <v-icon dark>
                                            mdi-minus
                                        </v-icon>
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </div>
                    </div>

                    <v-row>
                        <v-col cols="7">
                            <v-text-field
                                v-model="newTodoists"
                                label="New Todos"
                                hide-details="auto"
                                v-on:keyup.enter="addTodos"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="4" class="py-auto mr-2">
                            <v-btn @click="addTodos" color="brown lighten-5" class="mt-3 brown--text"
                                   style="width: 100%;">
                                Add Todos
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-text>

                <v-card-actions>
                    <v-row>
                        <v-col cols="12">
                            <v-btn @click="createNewTodos" color="white" class="brown--text" style="width: 100%;">
                                Create This Todoist
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-actions>
            </v-card>
        </v-content>
    </v-app>
</template>

<script>
import GoToHomeMixin from "../../plugins/mixins/GoToHomeMixins";
import LogoutMixin from "../../plugins/mixins/LogoutMixins";
import SeeExistingMixin from "../../plugins/mixins/SeeExistingMixins";

const axios = require('axios');
axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

export default {
    name: "NewTodoistComponent",
    mixins: [GoToHomeMixin, LogoutMixin, SeeExistingMixin],
    data() {
        return {
            todoistTitle: '',
            todoistDesc: '',
            newTodoists: '',
            todoists: [],
        }
    },
    methods: {
        addTodos() {
            if (this.newTodoists.length > 1) {
                this.todoists.push({
                    todos: this.newTodoists,
                    status: 0,
                    info: 'new todos',
                });
                console.log(this.todoists);
            }

            this.newTodoists = '';
        },
        removeTodos(index, todo) {
            console.log(index)
            this.todoists.splice(index, 1);
        },
        createNewTodos() {
            console.log(this.todoistTitle)
            console.log(this.todoistDesc)
            console.log(this.todoists)
            console.log(this.todoistId)

            var newTodoist = {
                todoistId: this.todoistId,
                todoistTitle: this.todoistTitle,
                todoistDesc: this.todoistDesc.length > 0 ? this.todoistDesc : '-',
            };

            if (this.todoists.length > 0) {
                newTodoist.todoists = this.todoists;
            }

            this.$store.dispatch('createNewTodoist', newTodoist).then((success) => {
                this.goToHome();
            });
        },
    },
}
</script>

<style scoped>

</style>
