<template>
    <div class="main-slider">
        <div class="main-slider__item" v-for="item in items" :key="item.id">
            <div class="main-slider__prev">
                <img class="main-slider__img" :src="item.img" :alt="item.title">
            </div>
            <div class="main-slider__content">
                <h1 class="main-slider__title">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores at, corporis culpa dicta
                </h1>
                <p class="main-slider__desc">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur assumenda aut, blanditiis commodi, dignissimos dolores hic ipsa iusto minima omnis pariatur
                    placeat quibusdam quod, sapiente soluta. Consequatur consequuntur quasi reprehenderit!
                </p>
                <a class="btn btn-primary">
                    Перейти
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import $ from 'jquery';
import "slick-carousel";
import "slick-carousel/slick/slick.scss"
    export default {
        name: "MainSlider",
        mounted() {
            this.createSlider();
        },
        props: {
            items: {
                type: Array,
                required: true,
            }
        },
        methods: {
            createSlider() {
                $(".main-slider").slick({
                    dots: false,
                    prevArrow:
                        '<button class="slider__btn slider__btn_prev"><svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#000000"></path></g></svg></button>',
                    nextArrow:
                        '<button class="slider__btn slider__btn_next"><svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#000000"></path></g></svg></button>',
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: false,
                    autoplaySpeed: 2000,
                    responsive: [
                        {
                            breakpoint: 775,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: false,
                                arrows: false,
                                swipe: true,
                            },
                        },
                    ],
                });
            },
        }
    }
</script>

<style scoped lang="scss">
    .main-slider{
        &__item {
            position: relative;
            height: 100vh;
        }
        &__prev {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        &__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        &__content {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
            padding: 0 50px;
        }
        &__title {
            color: #fff;
        }
    }
</style>
