<template>
    <div class="news">
        <div v-for="(item, idx) in news" :key="idx" class="news__item">
            <template v-if="idx < 3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="news__prev">
                            <router-link :to="'news/'+ item.id" class="news__link">
                                <img :src="item.image" :alt="item.title" class="news__img w-100">
                            </router-link>
                        </div>
                    </div>
                    <div class="col-md-8 mt-3 mt-md-0">
                        <div class="news__content">
                            <div class="news__meta mb-2">
                                {{formatDate(item.created_at)}}
                            </div>
                            <div class="news__text">
                                <h5 class="title news__title" style="font-size: 16px">
                                    <router-link :to="'news/'+ item.id" class="news__link">
                                        {{item.title}}
                                    </router-link>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <template v-if="idx === 3">
                <div class="row">
                    <div class="col-12">
                        <div class="news__prev" style="height: 200px;">
                            <router-link :to="'news/'+ item.id" class="news__link">
                                <img :src="item.image" style="height: 200px;" :alt="item.title" class="news__img w-100">
                            </router-link>
                        </div>
                    </div>
                    <div class="col-12 pl-0 mt-3">
                        <div class="news__content">
                            <div class="news__category mb-3">
                                Новость
                            </div>
                            <div class="news__meta mb-2">
                                {{formatDate(item.created_at)}}
                            </div>
                            <div class="news__text">
                                <h5 class="title news__title">
                                    <router-link :to="'news/'+ item.id" class="news__link">
                                        {{item.title}}
                                    </router-link>
                                </h5>
                                <p class="news__desc">
                                   {{item.desc}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
    import moment from "moment/moment.js";
    import 'moment/locale/ru';
    export default {
        name: "PopularNews",
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
    }
</script>

<style scoped lang="scss">
    .news {
        &__item {
            margin-top: 30px;
            &:hover {
                .news__img {
                    transform: scale3d(1.1, 1.1, 1);
                    -webkit-transform: scale3d(1.1, 1.1, 1);
                    -moz-transform: scale3d(1.1, 1.1, 1) rotate(0.02deg);
                }
            }
        }
        &__prev{
            max-width: 100%;
            height: 78px;
            overflow: hidden;
        }
        &__img {
            max-width: 100%;
            height: 78px;
            -o-object-fit: cover;
            object-fit: cover;
            background-color: #000;
            margin-bottom: 0;
            -webkit-transition: 0.2s ease-in-out;
            transition: 0.2s ease-in-out;
        }
        &__category{
            clear: both;
            color: #fff;
            display: inline-block;
            font-size: 10px;
            margin-bottom: 7px;
            padding: 5px 8px;
            background: linear-gradient(285deg, #f92a28 27%, #da1752 100%, #fff 100%);
            line-height: 15px;
            text-transform: uppercase;
            font-family: Montserrat, sans-serif;
            font-weight: 600;
        }
        &__meta {
            font-size: 12px;
            font-weight: 700;
            font-family: Montserrat, sans-serif;
            line-height: 1;
            margin: 0;
            padding: 0;
            list-style: none;
            letter-spacing: 0.5px;
            text-transform: capitalize;
        }
        &__title {
            font-family: Montserrat, sans-serif;
            font-weight: 700;
            margin-bottom: 10px;
            a {
                color: #000;
                text-decoration: none;
                text-transform: capitalize;
                transition: .2s ease;
                &:hover {
                    color: var(--second-color);
                }
            }
        }
        &__desc {
            line-height: 24px;
            font-size: 14px;
            text-align: left;
        }
    }
    @media screen and (max-width: 767px) {
        .news {
            &__prev{
                height: 230px;
                img {
                    height: 100%;
                }
            }
        }
    }
</style>
