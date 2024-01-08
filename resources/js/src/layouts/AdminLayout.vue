<template>
    <app-sidebar :links="links"></app-sidebar>
    <div class="main">
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import AppSidebar from "@/components/AppSidebar.vue";
    import {mapActions} from "vuex";
    export default {
        name: 'AdminLayout',
        components: {AppSidebar},
        data(){
            return {
                links: [
                    {
                        id: 1, name: 'Баннеры', value: '/admin/banners'
                    },
                    {
                        id: 2, name: 'Новости', value: '/admin/news'
                    },
                    {
                        id: 3, name: 'О нас', value: '/admin/abouts'
                    },
                    {
                        id: 4, name: 'Команда', value: '/admin/team'
                    },
                    {
                        id: 5, name: 'Контакты', value: '/admin/contacts'
                    },
                ]
            }
        },
    }
</script>

<style scoped lang="scss">
    .main {
        padding: 50px 0 50px 300px;
    }
</style>
