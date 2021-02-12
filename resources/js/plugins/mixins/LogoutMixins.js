const LogoutMixin = {
    methods: {
        logout() {
            var config = {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                }
            };

            var axios = require('axios');
            axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

            axios.post('auth/logout', '', config).then(response => {
                console.log(response.data);
                this.posts = response.data.data;
                this.$router.push('/');
                this.$router.go(0);
            }).catch(error => {
                console.log(error.response);
            })
        }
    }
}

export default LogoutMixin
