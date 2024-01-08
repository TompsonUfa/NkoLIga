<template>
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="title">Баннеры на главной странице</h1>
                <custom-link :url="'banners/create'" class="btn btn-create">Создать баннер</custom-link>
            </div>
        </div>
        <div class="col-12">
            <news-table @delete-item="this.deleteNews" :items="banners"></news-table>
        </div>
        <div class="col-12" v-if="pagination.last_page !== 1">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li @click.prevent="getListNews(pagination.current_page - 1)" class="page-item"
                        v-if="pagination.current_page !== 1"><a class="page-link" href="#">Назад</a></li>
                    <li :class="link.active ? 'active' : ''" class="page-item" v-for="link in pagination.links">
                        <template v-if="Number(link.label)
                        && (pagination.current_page - link.label < 2
                        && pagination.current_page - link.label > -2) || Number(link.label) === 1 || Number(link.label) === pagination.last_page ">
                            <a @click.prevent="getListNews(link.label)" class="page-link" href="#">{{ link.label }}</a>
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
                    <li @click.prevent="getListNews(pagination.current_page + 1)" class="page-item"
                        v-if="pagination.current_page !== pagination.last_page"><a class="page-link" href="#">Вперед</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
import CustomLink from "@/components/UI/CustomLink.vue";
import NewsTable from "@/components/NewsTable.vue";
import axios from "axios";

export default {
    name: "BannersList",
    components: {NewsTable, CustomLink},
    mounted() {
        this.getListNews();
    },
    data() {
        return {
            banners: [],
            pagination: [],
        }
    },
    methods: {
        getListNews(page = 1) {
            axios.get('/api/admin/banners', {
                params: {
                    'page': page,
                }
            })
                .then(res => {
                    this.banners = res.data.data;
                    this.pagination = res.data.meta;
                })
                .catch((err) => {
                    console.log("Ошибка " + err)
                })

        },
        deleteNews(id){
           axios.delete(`/api/admin/banners/${id}`)
               .then(res => {
                   const index = this.banners.findIndex(item => item.id === id);
                   if (index !== -1) {
                       this.banners.splice(index, 1);
                   }
               })
               .catch(err => {
                   console.log("Ошибка " + err)
               })
        }
    },
}
</script>

<style scoped lang="scss">

</style>
