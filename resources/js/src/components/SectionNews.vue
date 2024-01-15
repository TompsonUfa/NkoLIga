<template>
    <section class="section section__news" id="news">
        <div class="container container-md">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section__title">Новости</h2>
                </div>
                <div class="col-12">
                    <a class="section__link mb-3" href="news">Все новости</a>
                </div>
            </div>
            <div class="news row">
                <div class="col-12 col-lg-6 h-60 h-lg-100 p-0">
                    <template v-for="(item, key) in news" :key="item.id">
                        <div v-if="key === 0" class="news__item news__item_idx_1">
                            <div class="news__img">
                                <img :src="item.image" :alt="item.title"/>
                            </div>
                            <a :href="'/news/' + item.id" class="news__link"></a>
                            <div class="news__content">
                                <div class="news__class">Новость</div>
                                <h4 class="news__title">
                                    {{ item.title }}
                                </h4>
                                <p class="news__date">
                                    {{formatDate(item.created_at)}}
                                </p>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="col-12 col-lg-6 h-40 h-lg-100 pt-1 pt-lg-0 ps-lg-1 overflow-auto p-0">
                    <div class="row h-100 flex-nowrap flex-lg-wrap m-0 2">
                        <template v-for="(item, key) in news" :key="item.id">
                        <div v-if="key === 1" class="col-10 h-sm-100 h-60 col-lg-12 p-0 pb-0 pb-lg-1 pe-1 pe-lg-0">
                                <div class="news__item news__item_idx_2">
                                    <div class="news__img">
                                        <img :src="item.image" :alt="item.title"/>
                                    </div>
                                    <a :href="'/news/' + item.id" class="news__link"></a>
                                    <div class="news__content">
                                        <div class="news__class">Новость</div>
                                        <h4 class="news__title">
                                            {{item.title}}
                                        </h4>
                                        <p class="news__date d-none d-lg-block">
                                            {{formatDate(item.created_at)}}
                                        </p>
                                    </div>
                                </div>
                        </div>
                        <div v-if="key === 2" class="col-10 h-sm-100 h-40 col-lg-6 p-0 pe-1">
                            <div class="news__item news__item_idx_3">
                                <div class="news__img">
                                    <img :src="item.image" :alt="item.title"/>
                                </div>
                                <a :href="'/news/' + item.id" class="news__link"></a>
                                <div class="news__content">
                                    <div class="news__class">Новость</div>
                                    <h4 class="news__title mb-0">
                                        {{item.title}}
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div v-if="key === 3" class="col-10 h-sm-100 h-40 col-lg-6 p-0">
                            <div class="news__item news__item_idx_4">
                                <div class="news__img">
                                    <img :src="item.image" :alt="item.title"/>
                                </div>
                                <a :href="'/news/' + item.id" class="news__link"></a>
                                <div class="news__content">
                                    <div class="news__class">Новость</div>
                                    <h4 class="news__title mb-0">
                                        {{item.title}}
                                    </h4>
                                </div>
                            </div>
                        </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import moment from "moment/moment.js";
import 'moment/locale/ru';
export default {
    name: 'sectionNews',
    props: {
        news: {
            type: Array,
            required: true,
        }
    },
    methods: {
        formatDate(date) {
            return moment(date).format('M MMMM YYYY');
        }
    }

};
</script>

<style lang="scss" scoped>

.news {
    height: 650px;

    &__item {
        position: relative;
        width: 100%;
        height: 100%;
        max-height: 100%;
        color: #fff;
        overflow: hidden;

        &:hover {
            .news__class {
                background: var(--second-color);
            }

            .news__img {
                transform: scale3d(1.1, 1.1, 1);
                -webkit-transform: scale3d(1.1, 1.1, 1);
            }
        }

        &_idx {
            &_2 {
                h4 {
                    font-size: 20px;
                    line-height: 25px;
                }
            }

            &_3,
            &_4 {
                h4 {
                    font-size: 15px;
                    line-height: 20px;
                }
            }
        }
    }

    &__content {
        position: absolute;
        bottom: 0;
        padding: 20px;
        z-index: -1;
    }

    &__img {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        width: 100%;
        height: 100%;
        transition: transform 0.3s;
        -webkit-transition: transform 0.3s;

        img {
            width: inherit;
            height: inherit;
            object-fit: cover;
        }
    }

    &__class {
        font-size: 10px;
        display: inline-block;
        transition: background-color 0.2s ease;
        -webkit-transition: background-color 0.2s ease;
        padding: 3px 7px;
        background-color: rgba(0, 0, 0, 0.7);
        line-height: 13px;
        font-weight: 500;
        text-transform: uppercase;
        pointer-events: auto;
        margin-bottom: 5px;
    }

    &__title {
        font-size: 27px;
        font-weight: 500;
        line-height: 34px;
        margin-bottom: 12px;
    }

    &__date {
        margin-bottom: 0;
    }

    &__link {
        display: block;
        width: 100%;
        height: 100%;
    }
}

@media screen and (max-width: 576px) {
    .news {
        &__item {
            &_idx {
                &_2,
                &_3,
                &_4 {
                    font-size: 14px;

                    h4 {
                        margin-bottom: 0;
                        line-height: 20px;
                        font-size: inherit;
                    }
                }
            }
        }
    }
}
</style>
