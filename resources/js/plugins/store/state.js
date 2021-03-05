const state = {
    isLoggedIn: false,
    todoists: null,
    todoistsTitle: null,
    loginToken: localStorage.getItem('access_token') || null,
    config: {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    }
};

export default state;