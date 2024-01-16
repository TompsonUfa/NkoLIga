<template>
    <app-loader v-if="isLoading"/>
    <router-view v-else></router-view>
</template>

<script>
import AppLoader from "@/components/AppLoader.vue";

export default {
    data() {
        return {
            isLoading: true
        };
    },
    created() {
        const body = document.querySelector('body');

        this.$router.beforeResolve((to, from, next) => {
            body.style.overflow = 'hidden';
            this.isLoading = true;
            next();
        })
        this.$router.afterEach((to, from) => {
            body.style.overflow = 'auto';
            this.isLoading = false;
        })
    },
    components: {
        AppLoader,
    },
}
</script>

<style lang="scss">

</style>
