<template>
    <app-header :class="{ scrolled: isScrolled }" :links="links"></app-header>
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
            isScrolled: false,
            links: [
                { id: 1, name: "О нас", href: "#about" },
                { id: 2, name: "Новости", href: "#news" },
                { id: 3, name: "Контакты", href: "#contact" },
                { id: 4, name: "Команда", href: "#team" },
            ],

        }
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll);
    },
    beforeUnmount() {
        window.removeEventListener('scroll', this.handleScroll);
    },
    methods: {
        handleScroll(){
            const scrollPosition = window.scrollY || window.pageYOffset;
            this.isScrolled = scrollPosition > '0';
        },
    }
}
</script>

<style scoped lang="scss">
    .main {
        padding-top: var(--header-height);
    }
</style>
