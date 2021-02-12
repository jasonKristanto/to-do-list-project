<template>
    <v-app>
        <v-app-bar app color="brown lighten-5" dark elevation="0">
            <h1 class="brown--text darken-4">My todoists</h1>
            <v-spacer></v-spacer>
            <v-btn @click="createNew" color="brown darken-4" class="mr-2">Create New Todoist</v-btn>
            <v-btn @click="logout" color="brown lighten-5" class="mr-2 brown--text">Logout</v-btn>
        </v-app-bar>

        <v-content>
            <div>This is existing todoist component</div>
        </v-content>
    </v-app>
</template>

<script>
import LogoutMixin from "../../plugins/mixins/LogoutMixins";
import CreateNewMixin from "../../plugins/mixins/CreateNewMixins";
import SeeExistingMixin from "../../plugins/mixins/SeeExistingMixins";

export default {
    name: "TodoistComponent",
    mixins: [CreateNewMixin, LogoutMixin, SeeExistingMixin],
}
</script>

<style scoped>

</style>
