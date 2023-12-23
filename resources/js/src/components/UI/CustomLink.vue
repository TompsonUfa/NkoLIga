<template>
    <a :href=url class="custom-btn">
        <slot></slot>
    </a>
</template>

<script>
 export default {
     name: "CustomLink",
     props: {
         url: {
             type: String,
             required: true,
         },
     }
 }
</script>

<style scoped lang="scss">
    .custom-btn {
        color: #fff;
        background-color: var(--second-color);
        opacity: 1;
        &:active,&:focus,&:hover{
            color: #fff;
            background-color: var(--second-color);
            opacity: 0.8;
        }
    }
</style>
