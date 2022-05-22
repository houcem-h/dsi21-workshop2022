import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

/* Modules */
import auth from "./modules/auth";
import post from "./modules/post";

export default new Vuex.Store({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        auth,
        post,
    },
});
