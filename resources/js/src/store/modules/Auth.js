import router from "@/router/router.js";

export default {
    actions: {
        checkAuth(ctx) {
            return axios.get('/api/user')
                .catch(err => {
                    ctx.dispatch('logout');
                });
        },
        login(ctx) {
            return axios.get('/api/user')
                .then(res => {
                    ctx.commit('SET_USER', res.data)
                    ctx.commit('SET_AUTHENTICATED', true)
                    router.push({name: 'admin'})
                }).catch(err => {
                    ctx.dispatch('logout');
                })
        },
        logout(ctx) {
            ctx.commit('SET_USER', {})
            ctx.commit('SET_AUTHENTICATED', false)
            router.push({name: 'login'})
        }
    },
    mutations: {
        SET_AUTHENTICATED(state, value) {
            state.authenticated = value
        },
        SET_USER(state, value) {
            state.user = value
        }
    },
    state: {
        authenticated: false,
        user: {}
    },
    getters: {
        authenticated(state) {
            return state.authenticated
        },
        user(state) {
            return state.user
        }
    },
}
