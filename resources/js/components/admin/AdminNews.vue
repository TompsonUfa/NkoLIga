<template>
    <app-sidebar :links="links"></app-sidebar>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="title">Новости</h1>
                        <custom-link :url="'news/create'" class="btn btn-create">Создать новость</custom-link>
                    </div>
                </div>
                <div class="col-12">
                    <news-table></news-table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AppSidebar from "@/components/AppSidebar.vue";
import NewsTable from "@/components/NewsTable.vue";
import CustomLink from "@/components/UI/CustomLink.vue";
export default {
    components: {CustomLink, AppSidebar, NewsTable},
    data(){
        return {
            links: [
                {
                    id: 1, name: 'Новости', value: '/admin/news'
                },
                {
                    id: 2, name: 'О нас', value: '/admin/about'
                },
                {
                    id: 3, name: 'Команда', value: '/admin/team'
                },
                {
                    id: 4, name: 'Контакты', value: '/admin/contacts'
                },
            ]
        }
    }
}
</script>

<style scoped lang="scss">
    .main {
        padding: 50px 0;
    }
</style>
