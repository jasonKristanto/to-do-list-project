<template>
    <v-app>
        <v-app-bar app color="brown lighten-5" dark elevation="0">
            <v-btn @click="goToHome" color="white" class="mr-2 brown--text">My todoists</v-btn>
            <v-spacer></v-spacer>
            <v-btn @click="createNew" color="brown darken-4" class="mr-2">Create New Todoist</v-btn>
            <v-btn @click="logout" color="brown lighten-5" class="mr-2 brown--text">Logout</v-btn>
        </v-app-bar>

        <v-container fluid>
            <v-row dense>
                <v-col v-for="todoistTitle in todoistsTitle" :key="todoistTitle.title_id" cols="4">
                    <v-card max-width="344" height="200">
                        <v-card-title>
                            {{ todoistTitle.title }}
                        </v-card-title>

                        <v-card-subtitle>
                            {{ todoistTitle.description }}
                        </v-card-subtitle>

                        <v-card-actions>
                            <v-btn @click="getTodoistDetails(todoistTitle.title_id)" color="orange lighten-2" text>
                                Details
                            </v-btn>

                            <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-app>
</template>

<script>
import LogoutMixin from "../../plugins/mixins/LogoutMixins";
import CreateNewMixin from "../../plugins/mixins/CreateNewMixins";
import GoToHomeMixin from "../../plugins/mixins/GoToHomeMixins";
import SeeExistingMixin from "../../plugins/mixins/SeeExistingMixins";

export default {
    name: "IndexComponent",
    mixins: [CreateNewMixin, GoToHomeMixin, LogoutMixin, SeeExistingMixin],
    data() {
        return {
            todoistsTitle: null,
        };
    },
    created() {
        this.getTodoist();
    },
    methods: {
        getTodoist() {
            this.$store.dispatch('getTodoistTitle').then((success) => {
                this.todoistsTitle = this.$store.state.todoistsTitle;
            }).catch((error) => {
                console.log(error.response);
            });
        },
        getTodoistDetails(todoistTitleId) {
            this.$router.push({ name: 'Existing Todoist', params: { id: todoistTitleId } });
        },
    },
}
</script>

<style scoped>

</style>
