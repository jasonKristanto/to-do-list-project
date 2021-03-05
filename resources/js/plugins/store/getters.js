const getters = {
    isUserLoggedIn(state) {
        return state.isLoggedIn || state.loginToken != null;
    },
    getTodoistTitle(state) {
        return state.todoistsTitle;
    },
    getTodoists(state) {
        return state.todoists;
    },
    getLoginToken(state) {
        return state.loginToken;
    },
    getAxiosConfig(state) {
        return state.config;
    }
};

export default getters;