<template>
    <section class="section section__about about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section__title">О нас</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider single-item">
                        <div
                            class="slider__item row"
                            v-for="item in abouts"
                            :key="item.id"
                        >
                            <div class="col-12 col-lg-6">
                                <div class="slider__content">
                                    <h3 class="slider__title">АНО ЛИГА</h3>
                                    <p class="slider__desc p-0 m-0">{{ item.title }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="slider__view">
                                    <img class="slider__img" :src="item.image" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import $ from 'jquery';
import "slick-carousel";
import "slick-carousel/slick/slick.scss"
export default {
    mounted() {
        this.createSlider();
    },
    props: {
      abouts: {
          type: Array,
          required: true,
      }
    },
    methods: {
        createSlider() {
            $(".single-item").slick({
                dots: false,
                prevArrow:
                    '<button class="slider__btn slider__btn_prev"><svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#000000"></path></g></svg></button>',
                nextArrow:
                    '<button class="slider__btn slider__btn_next"><svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#000000"></path></g></svg></button>',
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
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
};
</script>

<style lang="scss">
    .slider {
        position: relative;
        border-radius: 15px;

        .slick-list {
            border-radius: 15px;
        }

        &__btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;

            &_prev {
                left: -50px;
            }

            &_next {
                right: -50px;
                transform: rotate(180deg);
            }

            svg {
                path {
                    transition: all 0.3s ease;
                }
            }

            &:hover {
                svg {
                    path {
                        fill: var(--second-color);
                    }
                }
            }

            svg {
                width: 30px;
                height: 30px;
            }
        }

        &__item {
            color: #fff;
            border-radius: 15px;
            display: flex !important;
            justify-content: center;
            align-items: center;
        }

        &__view {
            width: 100%;
            height: 100%;
            padding: 20px;
        }

        &__img {
            width: inherit;
            height: inherit;
            max-height: 550px;
            border-radius: 8px;
            object-fit: cover;
        }

        &__content {
            width: 100%;
            padding: 30px;
        }

        &__title {
            color: var(--second-color);
            font-size: 22px;
            font-weight: 700;
            line-height: 30px;
        }

        &__subtitle {
            color: rgb(102, 102, 102);
            font-size: 26px;
            line-height: 32px;
            font-weight: 700;
        }

        &__desc {
            font-size: 18px;
            line-height: 26px;
            color: rgb(102, 102, 102);
        }
    }
</style>
