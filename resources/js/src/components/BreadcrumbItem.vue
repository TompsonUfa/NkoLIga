<template>
    <li>
        <router-link  :to=this.to>
            <slot></slot>
        </router-link>
    </li>
</template>

<script>
export default {
    name: "BreadcrumbItem",
    props: {
        to: {
            type: String,
            required: true,
        }
    },
}
</script>

<style lang="scss">

</style>
