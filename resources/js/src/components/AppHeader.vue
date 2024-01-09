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
    background-color: #fff;
    box-shadow: 0 2px 3px rgba(100, 100, 100, 0.1);
    a {
        transition: .2s ease;
        &:hover {
            color: var(--second-color) !important;
        }
    }
}
</style>
