<template>
    <app-header :links="links"></app-header>
    <main class="main">
        <router-view></router-view>
    </main>
    <app-footer :links="links"></app-footer>
</template>

<script>
import AppFooter from "@/components/AppFooter.vue";
import AppHeader from "@/components/AppHeader.vue";
import axios from "axios";
export default {
    components: { AppHeader, AppFooter },
    data(){
        return {
            links: [
                { id: 1, name: "О нас", href: "#about" },
                { id: 2, name: "Новости", href: "#news" },
                { id: 3, name: "Контакты", href: "#contact" },
                { id: 4, name: "Команда", href: "#team" },
            ],

        }
    },
}
</script>

<style scoped lang="scss">
    .main {
        padding-top: var(--header-height);
        min-height: calc(100vh - var(--header-height));
    }
</style>
