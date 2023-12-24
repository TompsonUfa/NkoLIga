<template>
    <header class="header fixed-top" :class="this.$route.name != 'home' ? 'header-border' : null">
        <app-nav :links="links"></app-nav>
    </header>
</template>

<script>
import AppNav from "@/components/AppNav.vue";
export default {
    components: {
        AppNav,
    },
    props: {
        links: {
            type: Array,
            required: true,
        }
    },
    mounted() {
        console.log(this.$route.name)
    },
};
</script>

<style lang="scss">
.header {
    height: var(--header-height);
    width: 100vw;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.scrolled {
    background-color: #000;
    a {
        color: #fff !important;
        transition: .2s ease;
        &:hover {
            color: var(--second-color) !important;
        }
    }
}
.header-border {
    box-shadow: 0 2px 3px rgba(100, 100, 100, 0.1);
}
</style>
