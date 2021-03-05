const mutations = {
    login(state, loginToken) {
        if (!state.isLoggedIn) {
            state.isLoggedIn = true;
            state.loginToken = loginToken;
        }
    },
    logout(state) {
        if (state.isLoggedIn) {
            state.isLoggedIn = false;
            state.loginToken = null;
        }
    },
    getTodoistTitle(state, todoistTitle) {
        state.todoistsTitle = todoistTitle;
    },
    getTodoists(state, todoists) {
        state.todoists = {
            id: todoists.todoists_title[0].title_id,
            title: todoists.todoists_title[0].title,
            desc: todoists.todoists_title[0].description,
            todos: todoists.todoists,
        };
    }
};

export default mutations;