<template>
    <v-app>
        <v-app-bar app color="brown lighten-5" dark elevation="0">
            <v-btn @click="goToHome" color="white" class="mr-2 brown--text">My todoists</v-btn>
            <v-spacer></v-spacer>
            <v-btn @click="logout" color="brown lighten-5" class="mr-2 brown--text">Logout</v-btn>
        </v-app-bar>

        <v-content>
            <div>This is new todoist component</div>
        </v-content>
    </v-app>
</template>

<script>
import GoToHomeMixin from "../../plugins/mixins/GoToHomeMixins";
import LogoutMixin from "../../plugins/mixins/LogoutMixins";
import SeeExistingMixin from "../../plugins/mixins/SeeExistingMixins";

export default {
    name: "NewTodoistComponent",
    mixins: [GoToHomeMixin, LogoutMixin, SeeExistingMixin],
}
</script>

<style scoped>

</style>
