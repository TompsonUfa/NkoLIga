import {createRouter, createWebHistory} from "vue-router";
import routes from "@/router/routes.js";
import store from "@/store/index.js";

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes: routes,
})

router.beforeEach( (to, from, next) => {
    if (to.meta.middleware === "guest") {
        if (store.state.auth.authenticated) {
            next({name: "admin"})
        }
        next();
    } else if (to.meta.middleware === "auth") {
        store.dispatch('checkAuth');
    }
    next();
});

export default router;
