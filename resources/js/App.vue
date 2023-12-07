<template>
    <app-header :class="{ scrolled: isScrolled }" :links="links"></app-header>
    <app-main></app-main>
    <app-footer :links="links"></app-footer>
</template>

<script>
import AppHeader from "@/components/AppHeader.vue"
import AppMain from "@/components/AppMain.vue"
import AppFooter from "@/components/AppFooter.vue"
export default {
    components: { AppHeader, AppMain, AppFooter },
    data(){
        return {
            isScrolled: false,
            links: [
                { id: 1, name: "Новости", href: "#news" },
                { id: 2, name: "О нас", href: "#about" },
                { id: 3, name: "Команда", href: "#team" },
                { id: 4, name: "Контакты", href: "#contact" },
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
            this.isScrolled = scrollPosition > '62';
        }
    }
}
</script>

<style lang="scss">
</style>
