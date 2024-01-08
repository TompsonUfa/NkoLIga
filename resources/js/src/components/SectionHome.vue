<template>
    <section class="section section__home home" id="home">
        <main-slider v-if="this.banners" :items="this.banners"></main-slider>
    </section>
</template>

<script>
import MainSlider from "@/components/MainSlider.vue";

export default {
    components: {
        MainSlider
    },
    props: {
        banners: {
            type: Array,
        }
    }
};
</script>

<style lang="scss">
.home {
    padding: 0 !important;

    &__btn {
        display: inline-block;
        border-radius: 5px;
        padding: 10px 20px;
        margin-top: 20px;
        font-size: 16px;
        background-color: var(--second-color);
        border: none;
        opacity: 1;
        color: #fff;
        font-weight: bold;
        text-decoration: none;

        &:hover {
            background-color: var(--second-color);
            opacity: 0.7;
            color: #fff;
        }

        svg {
            width: 20px;
            height: 20px;
            fill: #fff;
        }
    }
}
</style>
