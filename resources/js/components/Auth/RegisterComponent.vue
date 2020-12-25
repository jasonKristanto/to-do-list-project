<template>
    <div>
        <v-dialog
            v-model="isRegister"
            max-width="75%"
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
                        <v-col cols="2">
                            <v-btn class="ma-2" text icon @click="isRegister = false">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-title>
                <v-card-text>Let Google help apps determine location. This means sending anonymous location data
                    to Google, even when no apps are running.
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="green darken-1"
                        text
                        @click="isRegister = false"
                    >
                        Disagree
                    </v-btn>
                    <v-btn
                        color="green darken-1"
                        text
                        @click="isRegister = false"
                    >
                        Agree
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
    name: "RegisterComponent",
    data() {
        return {
            isRegister: false
        }
    },
}
</script>

<style scoped>

</style>
