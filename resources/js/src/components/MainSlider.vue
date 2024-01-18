<template>
    <div class="main-slider">
        <div class="main-slider__item" v-for="banner in items" :key="banner.id">
            <div class="main-slider__prev">
                <img class="main-slider__img" :src="banner.image" :alt="banner.title">
            </div>
            <div class="main-slider__content">
                <div class="container text-center">
                    <h1 class="main-slider__title">
                        {{ banner.title }}
                    </h1>
                    <p class="main-slider__desc">
                        {{ banner.desc }}
                    </p>
                    <template v-if="banner.on_main_screen">
                        <a :href="'news/' + banner.id" class="main-slider__btn">
                            Узнать подробнее
                        </a>
                    </template>
                    <template v-else>
                        <div class="d-flex gap-3">
                            <a href="#about" class="main-slider__btn">Узнать</a>
                            <a href="#contact" class="main-slider__btn">Контакты</a>
                        </div>
                    </template>
                </div>
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
    watch: {
        items: {
            handler(newItems, oldItems) {
                if (newItems.length > 0) {
                    this.$nextTick(() => {
                        this.createSlider();
                    });
                }
            },
            deep: true,
            immediate: true,
        },
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
                dots: true,
                prevArrow:
                    '<button class="slider__btn slider__btn_prev"><svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#000000"></path></g></svg></button>',
                nextArrow:
                    '<button class="slider__btn slider__btn_next"><svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#000000"></path></g></svg></button>',
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
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
    },
}
</script>

<style lang="scss">
.main-slider {

    &__item {
        position: relative;
        display: flex !important;
        justify-content: center;
        align-items: center;
        height: 700px;
    }

    &__prev {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;

        &:after {
            background: rgba(0, 0, 0, 0.58);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            content: "";
        }
    }

    &__img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    &__content {
        position: relative;
    }

    &__title, &__desc {
        color: #fff;
    }

    .slider__btn {
        z-index: 2;

        &_next {
            right: 50px !important;
        }

        &_prev {
            left: 50px !important;
        }
    }

    .slick-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 10px;

        li {
            position: relative;
            display: inline-block;
            width: 15px;
            height: 15px;
            margin: 0 5px;
            padding: 0;
            cursor: pointer;
        }

        button {
            font-size: 0;
            line-height: 0;
            display: block;
            width: 15px;
            height: 15px;
            border: 1px transparent;
            border-radius: 50%;
            cursor: pointer;
            background: #fff;
            opacity: 0.5;
        }

        .slick-active {
            button {
                background: var(--second-color);
                opacity: .8;
            }
        }
    }

    &__title {

    }

    &__desc {

    }

    &__btn {
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
        font-size: 17px;
        padding: 10px 20px;
        background-color: var(--second-color);
        color: #fff;
        border-radius: 5px;
    }

    .slick-active {
        .main-slider__img {
            animation: kbrns_zoomInOut 15s linear 0s infinite alternate;
        }
    }
}
@keyframes kbrns_zoomInOut {
    0% {
        transform: scale(1);
    }
    100% {
        transform: scale(1.2);
    }
}
</style>
