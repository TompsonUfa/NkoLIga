<template>
    <section class="section section__about about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section__title">О нас</h2>
                    <p class="section__desc">
                        Lorem Ipsum is simply dummy text the printing and typesetting industry.<br>
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider single-item">
                        <div class="slider__item col-md-4 px-2" v-for="item in abouts" :key="item.id">
                            <div class="slider__img">
                                <img :src="item.image" :alt="item.title">
                            </div>
                            <div class="slider__content">
                                <div class="slider__brand">
                                    LIGA
                                </div>
                                <h4 class="slider__title">
                                    {{ item.title }}
                                </h4>
                                <p class="slider__desc">
                                    {{ item.desc }}
                                </p>
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
            $(".slider").slick({
                dots: false,
                prevArrow:
                    '<button class="slider__btn slider__btn_prev"><svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#000000"></path></g></svg></button>',
                nextArrow:
                    '<button class="slider__btn slider__btn_next"><svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#000000"></path></g></svg></button>',
                slidesToShow: 3,
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
    &__item:hover &__img > img {
        transform: rotate(5deg) scale(1.2);
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
    &__img {
        width: 100%;
        height: 240px;
        overflow: hidden;
        border-radius: 10px;
        img {
            width: 100%;
            height: inherit;
            object-fit: cover;
            transition: .2s ease;
        }
    }
    &__content {
        position: relative;
        top: -15px;
        background: #fff;
        padding: 18px 20px 16px;
        width: 92%;
        margin: 0 auto;
        border-radius: 10px;
        box-shadow: 0 0 15px #cccccc37;
    }
    &__brand {
        clear: both;
        color: #fff;
        display: inline-block;
        font-size: 13px;
        margin-bottom: 5px;
        padding: 5px 8px;
        background: linear-gradient(285deg, #f92a28 27%, #da1752 100%, #fff 100%);
        line-height: 15px;
        text-transform: uppercase;
        font-family: Montserrat, sans-serif;
        font-weight: 600;
    }
    &__title {
        color: #464545;
        font-size: 20px;
    }
    &__desc {
        font-size: 15px;
        font-weight: 400;
        line-height: 24px;
        margin-bottom: 15px;
        color: #666;
    }
}
</style>
