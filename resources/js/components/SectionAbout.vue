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
                    <p class="section__desc text-center">
                        <span>АНО ЛИГА</span>
                        осуществляет деятельность в области образования, науки,
                        спорта, физической культуры и здоровья.
                    </p>
                    <div class="slider">
                        <div
                            class="slider__item"
                            v-for="item in about"
                            :key="item.id"
                        >
                            <h4 class="slider__title">Направление</h4>
                            <p class="slider__desc">{{ item.name }}</p>
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
                    name: "Организация и проведение физкультурно-спортивных, физкультурно-оздоровительных и культурно-зрелищных и досуговых мероприятий",
                },
                {
                    id: 2,
                    name: "Организация и проведение соревнований, семинаров по различным видам спорта",
                },
                {
                    id: 3,
                    name: "Организация и проведение лекций, семинаров, конференций, тренингов, совещаний, круглых столов, симпозиумов и иных аналогичных мероприятий в соответствии с целями деятельности Организации",
                },
                {
                    id: 4,
                    name: "Оказание спортивно-оздоровительных, реабилитационных, восстановительных услуг",
                },
                {
                    id: 5,
                    name: "Разработка и реализация программ спортивной подготовки по различным видам спорта",
                },
                {
                    id: 6,
                    name: "Составление индивидуальных планов спортивной подготовки спортсменов, находящихся на различных этапах  спортивной подготовки",
                },
                {
                    id: 7,
                    name: "Организация, проведение и участие в официальных спортивных мероприятиях",
                },
                {
                    id: 8,
                    name: "Организация и проведение спортивно-оздоровительной работы по развитию физической культуры и спорта среди различных групп населения",
                },
                {
                    id: 9,
                    name: "Образовательная деятельность по дополнительным образовательным программам в сфере образования, науки, физической культуры, спорта и здоровья",
                },
                {
                    id: 10,
                    name: "Содействие подготовке и повышению квалификации специалистов в сфере образования, науки, физической культуры, спорта и здоровья",
                },
                {
                    id: 11,
                    name: "Научно-исследовательская деятельность в сфере образования, науки, физической культуры, спорта и здоровья, а также смежных отраслей",
                },
                {
                    id: 12,
                    name: "Содействие развитию фундаментальных и прикладных исследований в сфере образования, науки, физической культуры, спорта и здоровья",
                },
                {
                    id: 13,
                    name: "Проведение исследований в сфере образования, науки, физической культуры, спорта и здоровья, выполнение комплексных программ, разработка системных проектов",
                },
                {
                    id: 14,
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
                slidesToShow: 3,
                slidesToScroll: 3,
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
    &__img {
        width: 100%;
    }

    .slider {
        position: relative;
        border-radius: 15px;

        .slick-slide {
            margin: 0 15px;
        }

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
            width: 300px;
            min-height: 330px;
            background-color: var(--dark-color);
            color: #fff;
            padding: 30px;
            border-radius: 15px;
        }

        &__title {
            font-size: 25px;
            font-weight: bold;
        }

        &__desc {
            font-size: 17px;
            font-weight: bold;
            color: var(--text-color);
        }
    }
}
</style>
