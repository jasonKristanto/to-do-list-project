var axios = require('axios');
axios.defaults.headers.post['X-CSRF-Token'] = document.querySelector('meta[name="csrf-token"]').content;

const actions =  {
    login(context, credentials) {
        return new Promise((resolve, reject) => {
            axios.post('/auth/login', credentials).then((success) => {
                const loginToken = success.data.data.token;

                localStorage.setItem('access_token', loginToken)
                context.commit('login', loginToken);
                resolve(success);
            }).catch((error) => {
                console.log(error.response);
                reject(error);
            });
        });
    },
    logout(context) {
        return new Promise((resolve, reject) => {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.getters.getLoginToken;

            axios.post('auth/logout').then(success => {
                localStorage.removeItem('access_token')
                context.commit('logout');
                resolve(success);
            }).catch(error => {
                console.log(error.response);
                localStorage.removeItem('access_token')
                context.commit('logout');
                reject(error);
            })
        });
    },
    register(context, credentials) {
        return new Promise((resolve, reject) => {
            axios.post('/auth/register', credentials).then((success) => {
                resolve(success);
            }).catch((error) => {
                console.log(error.response);
                reject(error);
            });
        });
    },
    getTodoistTitle(context) {
        return new Promise((resolve, reject) => {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.getters.getLoginToken;

            axios.post('api/todos/', '', context.state.config).then(success => {
                console.log(success);
                context.commit('getTodoistTitle', success.data.data);
                resolve(success);
            }).catch(error => {
                console.log(error.response);
                reject(error);
            });
        });
    },
    createNewTodoist(context, newTodoist) {
        return new Promise((resolve, reject) => {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.getters.getLoginToken;

            axios.post('api/todos/store-todoist', newTodoist, context.state.config).then(success => {
                console.log(success);
                resolve(success);
            }).catch(error => {
                console.log(error.response);
                reject(error);
            });
        });
    },
    getTodoist(context, todoistTitleId) {
        return new Promise((resolve, reject) => {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.getters.getLoginToken;

            axios.post('api/todos/get-todoist', todoistTitleId, context.state.config).then(success => {
                console.log(success);
                context.commit('getTodoists', success.data.data);
                resolve(success);
            }).catch(error => {
                console.log(error.response);
                reject(error);
            });
        });
    },
    updateTodoist(context, todoists) {
        return new Promise((resolve, reject) => {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.getters.getLoginToken;

            axios.post('api/todos/update-todoist', todoists, context.state.config).then(success => {
                console.log(success);
                resolve(success);
            }).catch(error => {
                console.log(error.response);
                reject(error);
            });
        });
    },
    removeTodoists(context, todoistTitleId) {
        return new Promise((resolve, reject) => {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.getters.getLoginToken;

            axios.post('api/todos/remove-todoist', todoistTitleId, context.state.config).then(success => {
                console.log(success);
                context.commit('getTodoistTitle', success.data.data);
                resolve(success);
            }).catch(error => {
                console.log(error.response);
                reject(error);
            });
        });
    },
};

export default actions;