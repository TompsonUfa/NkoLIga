<template>
    <header class="header fixed-top">
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
    }
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
        color: #fff;
    }
}
</style>
