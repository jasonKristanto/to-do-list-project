const GoToHomeMixins = {
    methods: {
        goToHome() {
            this.$router.push('/todoist').catch(()=>{});
        }
    }
};

export default GoToHomeMixins;
