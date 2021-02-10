<template>
    <v-app>
        <v-main>
            <section>
                This is index component from todoist
            </section>
        </v-main>
    </v-app>
</template>

<script>
const axios = require('axios');
axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

export default {
    name: "IndexComponent",
    mounted() {
        var config = {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
        };

        var axios = require('axios');
        axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

        axios.get('api/todos/title', config).then(response => {
            console.log(response.data);
        }).catch(error => {
            console.log(error.response);
        });
    },
}
</script>

<style scoped>

</style>
