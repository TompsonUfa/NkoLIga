<template>
    <AppLoader v-if="this.loading"/>
    <div v-else class="container my-3">
        <div class="row mb-3">
            <div class="col-12 p-0">
                <breadcrumb/>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-8">
                <h3 class="title">Новости</h3>
                <list-news :news="news"/>
            </div>
            <div class="col-md-4 mt-4 mt-md-0">
                <h3 class="title">Самые просматриваемые</h3>
                <popular-news :news="popularNews"/>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="col-12" v-if="pagination.last_page !== 1">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                        <ul class="pagination">
                            <li @click.prevent="getData(pagination.current_page - 1)" class="page-item"
                                v-if="pagination.current_page !== 1"><a class="page-link" href="#">Назад</a></li>
                            <li :class="link.active ? 'active' : ''" class="page-item" v-for="link in pagination.links">
                                <template v-if="Number(link.label)
                        && (pagination.current_page - link.label < 2
                        && pagination.current_page - link.label > -2) || Number(link.label) === 1 || Number(link.label) === pagination.last_page ">
                                    <a @click.prevent="getData(link.label)" class="page-link" href="#">{{
                                            link.label
                                        }}</a>
                                </template>
                                <template v-if="Number(link.label) &&
                        pagination.current_page !== 3 &&
                        pagination.current_page - link.label === 2 ||
                        Number(link.label) &&
                        pagination.current_page !== pagination.last_page -2 &&
                        pagination.current_page - link.label === -2">
                                    <a class="page-link">...</a>
                                </template>
                            </li>
                            <li @click.prevent="getData(pagination.current_page + 1)" class="page-item"
                                v-if="pagination.current_page !== pagination.last_page"><a class="page-link" href="#">Вперед</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AppLoader from "@/components/AppLoader.vue";
import Breadcrumb from "@/components/Breadcrumb.vue";
import ListNews from "@/components/ListNews.vue";
import axios from "axios";
import PopularNews from "@/components/PopularNews.vue";

export default {
    name: "NewsIndex",
    components: {PopularNews, ListNews, Breadcrumb, AppLoader},
    data() {
        return {
            news: [],
            popularNews: [],
            pagination: [],
            loading: true,
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData(page = 1) {
            Promise.all([
                axios.get('/api/news', {
                    params: {
                        'page': page,
                    }
                }),
                axios.get('/api/news/popular', {
                    params: {
                        'page': page,
                    }
                })
            ])
                .then(([newsResponse, popularNewsResponse]) => {
                    this.news = newsResponse.data.data;
                    this.pagination = newsResponse.data.meta;

                    this.popularNews = popularNewsResponse.data.data;
                })
                .catch(err => {
                    console.log(err);
                })
                .finally(() => {
                    this.loading = false;
                });
        }

    },
}
</script>

<style scoped lang="scss">
.title {
    font-weight: 700;
    position: relative;
    padding: 0 0 20px 0;

    margin-bottom: 30px;

    &:before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 5px;
        background: #c00;
        z-index: 1;
    }

    &:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: #eee;
    }
}

.pagination {
    a {
        &:focus, &:hover {
            box-shadow: none;
            background-color: #ddd;
        }

        font-size: 16px;
        font-weight: 700;
        color: #000;
        float: left;
        padding: 6px 15px;
        text-decoration: none;
        -webkit-transition: background-color 0.3s;
        transition: background-color 0.3s;
        border: 1px solid #eee;
        margin: 0 4px;
    }

    .active {
        a {
            color: #fff;
            background-color: var(--second-color);
        }
    }
}
</style>
