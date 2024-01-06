<template>
    <section class="section section__home home" id="home">
        <div class="row align-items-center">
            <div class="col-12">
                <main-slider :items="this.slides"></main-slider>
            </div>
        </div>
    </section>
</template>

<script>
import MainSlider from "@/components/MainSlider.vue";

export default {
    components: {
        MainSlider
    },
    data() {
        return {
            slides: [
                {
                    id: 1,
                    img: "/images/1.jpg",
                    title: 'slide 1',
                    desc: 'desc',
                },
                {
                    id: 2,
                    img: "/images/2.png",
                    title: 'slide 2',
                    desc: 'desc',
                },
                {
                    id: 3,
                    img: "/images/2.png",
                    title: 'slide 3',
                    desc: 'desc',
                }
            ]
        };
    },
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
