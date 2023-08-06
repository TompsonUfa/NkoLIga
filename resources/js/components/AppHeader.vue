<template>
    <header class="header fixed-top">
        <app-nav></app-nav>
    </header>
</template>

<script>
import AppNav from "@/components/AppNav.vue"
export default {
    components: {
        AppNav,
    }
}
</script>

<style lang="scss" scoped>
.header {
    height: var(--header-height);
}
</style>