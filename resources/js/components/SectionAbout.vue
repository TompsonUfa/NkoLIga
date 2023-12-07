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
                    <div class="slider">
                        <div
                            class="slider__item row"
                            v-for="item in about"
                            :key="item.id"
                        >
                            <div class="col-12 col-lg-6">
                                <div class="slider__content">
                                    <h3 class="slider__title">АНО ЛИГА</h3>
                                    <p class="slider__desc p-0 m-0">{{ item.name }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="slider__view">
                                    <img class="slider__img" :src="item.img" alt="">
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
import "slick-carousel";
export default {
    mounted() {
        this.createSlider();
    },
    data() {
        return {
            about: [
                {
                    id: 1,
                    img: "/images/about/1.jpg",
                    name: "Организация и проведение физкультурно-спортивных, физкультурно-оздоровительных и культурно-зрелищных и досуговых мероприятий",
                },
                {
                    id: 2,
                    img: "/images/about/2.jpg",
                    name: "Организация и проведение соревнований, семинаров по различным видам спорта",
                },
                {
                    id: 3,
                    img: "/images/about/3.jpg",
                    name: "Организация и проведение лекций, семинаров, конференций, тренингов, совещаний, круглых столов, симпозиумов и иных аналогичных мероприятий в соответствии с целями деятельности Организации",
                },
                {
                    id: 4,
                    img: "/images/about/4.jpg",
                    name: "Оказание спортивно-оздоровительных, реабилитационных, восстановительных услуг",
                },
                {
                    id: 5,
                    img: "/images/about/1.jpg",
                    name: "Разработка и реализация программ спортивной подготовки по различным видам спорта",
                },
                {
                    id: 6,
                    img: "/images/about/2.jpg",
                    name: "Составление индивидуальных планов спортивной подготовки спортсменов, находящихся на различных этапах  спортивной подготовки",
                },
                {
                    id: 7,
                    img: "/images/about/3.jpg",
                    name: "Организация, проведение и участие в официальных спортивных мероприятиях",
                },
                {
                    id: 8,
                    img: "/images/about/4.jpg",
                    name: "Организация и проведение спортивно-оздоровительной работы по развитию физической культуры и спорта среди различных групп населения",
                },
                {
                    id: 9,
                    img: "/images/about/1.jpg",
                    name: "Образовательная деятельность по дополнительным образовательным программам в сфере образования, науки, физической культуры, спорта и здоровья",
                },
                {
                    id: 10,
                    img: "/images/about/2.jpg",
                    name: "Содействие подготовке и повышению квалификации специалистов в сфере образования, науки, физической культуры, спорта и здоровья",
                },
                {
                    id: 11,
                    img: "/images/about/3.jpg",
                    name: "Научно-исследовательская деятельность в сфере образования, науки, физической культуры, спорта и здоровья, а также смежных отраслей",
                },
                {
                    id: 12,
                    img: "/images/about/4.jpg",
                    name: "Содействие развитию фундаментальных и прикладных исследований в сфере образования, науки, физической культуры, спорта и здоровья",
                },
                {
                    id: 13,
                    img: "/images/about/1.jpg",
                    name: "Проведение исследований в сфере образования, науки, физической культуры, спорта и здоровья, выполнение комплексных программ, разработка системных проектов",
                },
                {
                    id: 14,
                    img: "/images/about/2.jpg",
                    name: "Оказание консультационных услуг в сфере образования, науки, физической культуры, спорта и здоровья, а также смежных отраслей",
                },
            ],
        };
    },
    methods: {
        createSlider() {
            $(".slider").slick({
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
.about {
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
            padding: 20px;
        }
        &__img {
            width: 100%;
            height: 100%;
            border-radius: 8px;
            object-fit: cover;
        }
        &__content {
            width: 100%;
            padding: 20px;
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
}
</style>
