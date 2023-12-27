<template>
    <section class="section statistic" id="statistic">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="statistic__content">
                        <h4 class="statistic__title">Наши достижения</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row statistic__counters counters">
                        <div ref="counters" class="col-lg-3 col-md-6 col-sm-6" v-for="statistic in statistics">
                            <div class="counters__item">
                                <div class="counters__icon">
                                    <i :class="statistic.icon"></i>
                                </div>
                                <div class="counters__content">
                                    <h3 class="counters__title">{{ statistic.counter }}</h3>
                                    <p class="counters__desc">{{ statistic.desc }}</p>
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
import InfiniteScroll from 'v-infinite-scroll';
import 'v-infinite-scroll/dist/v-infinite-scroll.css';

export default {
    name: "SectionStatistic",
    data() {
        return {
            statistics: [
                {
                    id: 1,
                    icon: "fa-solid fa-check",
                    counter: 42,
                    desc: "Мы организовали и успешно провели мероприятия."
                },
                {
                    id: 2,
                    icon: "fa fa-map-marker-alt",
                    counter: 20,
                    desc: "Уникальных мест для ваших конференций и фестивалей в нашем распоряжении."
                },
                {
                    id: 3,
                    icon: "fa fa-users",
                    counter: 220,
                    desc: "Собрали участников, внесли вклад в создание воспоминаний и радости для каждого."
                },
                {
                    id: 4,
                    icon: "fa-regular fa-calendar-check",
                    counter: 50,
                    desc: "Провели множество конференций с высоким уровнем организации и качественным потоком знаний."
                },
            ],
            inViewport: false,
            countersStarted: false,
        }
    },
    mounted() {
        window.addEventListener('scroll', this.startCounters);
    },
    destroyed() {
        window.removeEventListener('scroll', this.startCounters);
    },
    methods: {
        startCounters() {
            if (this.isElementInViewport() && !this.countersStarted) {
                this.countersStarted = true;
                window.removeEventListener('scroll', this.startCounters);
                this.statistics.forEach((statistic) => {
                    this.animateCounter(statistic);
                });
            }
        },
        isElementInViewport() {
            const counters = document.querySelector('.counters')
            const rect = counters.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <=
                (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        },
        animateCounter(statistic) {
            const startCounter = 0;
            const endCounter = statistic.counter; // Set the target counter value

            let currentCounter = startCounter;

            const counterInterval = setInterval(() => {
                if (currentCounter <= endCounter) {
                    statistic.counter = currentCounter;
                    currentCounter++;
                } else {
                    clearInterval(counterInterval);
                }
            }, 20);
        },
    },
};
</script>

<style lang="scss">
.statistic {
    padding: 50px 0 0 20px !important;
    position: relative;
    z-index: 1;
    background: #fff;

    &::before {
        background: url('/images/static.jpg') no-repeat;
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 60%;
        content: "";
    }

    &::after {
        background: #6f293a70;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 60%;
        content: "";
    }

    &__content {
        text-align: center;
        width: 60%;
        margin: 0 auto 50px;
        position: relative;
        z-index: 1;
        color: #fff;
    }

    &__title {
        position: relative;
        padding-bottom: 24px;
        margin-bottom: 20px;
        font-weight: 700;

        &:after {
            position: absolute;
            content: "";
            height: 2px;
            width: 50px;
            background: #fff;
            left: 0;
            right: 0;
            margin: 0 auto;
            bottom: 0;
        }
    }

    &__desc {
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        margin-bottom: 15px;
    }
}

.counters {
    &__item {
        text-align: center;
        background: #fff;
        padding: 40px 30px 0;
        transition: all ease-in-out .3s;
        position: relative;
        z-index: 1;
        border-radius: 10px;
    }

    i {
        font-size: 3.5rem;
        color: #ef2853;
        margin-bottom: 5px;
        transition: all ease-in-out .3s;
    }

    &__title {
        font-size: 52px;
        margin: 0;
        font-weight: 700;
    }

    &__desc {
        font-size: 15px;
        font-weight: 400;
        line-height: 24px;
        color: #666;
    }
}
</style>
