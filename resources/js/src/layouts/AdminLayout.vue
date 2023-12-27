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
                        id: 1, name: 'Новости', value: '/admin/news'
                    },
                    {
                        id: 2, name: 'О нас', value: '/admin/abouts'
                    },
                    {
                        id: 3, name: 'Команда', value: '/admin/team'
                    },
                    {
                        id: 4, name: 'Контакты', value: '/admin/contacts'
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
