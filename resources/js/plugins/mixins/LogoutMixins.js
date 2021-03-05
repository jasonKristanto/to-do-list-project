const LogoutMixin = {
    methods: {
        logout() {
            this.$store.dispatch('logout').then(response => {
                this.$router.push('/');
                this.$router.go(0);
            });
        }
    }
}

export default LogoutMixin
