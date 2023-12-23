<template>
    <div class="custom-btn">
        <slot></slot>
    </div>
</template>

<script>
 export default {
     name: "CustomBtn"
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
