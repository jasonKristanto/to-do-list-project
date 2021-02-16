const GoToHomeMixins = {
    methods: {
        goToHome() {
            this.$router.push('/todoist');
            this.$router.go(0);
        }
    }
}

export default GoToHomeMixins
