import Vue from 'vue';
import Vuex from 'vuex';

import state from "./plugins/store/state";
import getters from "./plugins/store/getters";
import mutations from "./plugins/store/mutations";
import actions from "./plugins/store/actions";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: state,
    getters: getters,
    mutations: mutations,
    actions: actions,
});

export default store;