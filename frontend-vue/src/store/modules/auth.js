import "@/plugins/axios";

export default {
    state: {
        user: null,
        token: null,
        loggedIn: false,
    },
    mutations: {
        SET_USER(state, user) {
            state.user = user;
        },
        SET_TOKEN(state, token) {
            state.token = token;
        },
        SET_LOGGED_IN(state, loggedIn) {
            state.loggedIn = loggedIn;
        },
        LOGIN(state, payload) {
            state.user = payload.user;
            state.token = payload.token;
            state.loggedIn = true;
        },
        LOGOUT(state) {
            state.user = null;
            state.token = null;
            state.loggedIn = false;
        },
    },
    actions: {
        login({ commit }, payload) {
            return new Promise((resolve, reject) => {
                axios
                    .post("login", payload)
                    .then((response) => {
                        const { user, token } = response.data;
                        commit("LOGIN", { user, token });
                        resolve(response);
                    })
                    .catch((error) => {
                        reject(error);
                    });
            });
        },
        logout({ commit }) {
            return new Promise((resolve, reject) => {
                axios
                    .post("logout")
                    .then((response) => {
                        commit("LOGOUT");
                        resolve(response);
                    })
                    .catch((error) => {
                        reject(error);
                    });
            });
        },
    },
    getters: {
        user(state) {
            return state.user;
        },
        token(state) {
            return state.token;
        },
        loggedIn(state) {
            return state.loggedIn;
        },
    },
};
