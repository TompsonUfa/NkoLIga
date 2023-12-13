<template>
    <app-sidebar :links="links"></app-sidebar>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-2">
                    <h1 class="title">Создание новости</h1>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <select-img></select-img>
                </div>
                <div class="col-6">
                    <label class="form-label">Название</label>
                    <input v-model="title" type="text" class="form-control" id="title">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <Editor v-model="content"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AppSidebar from "@/components/AppSidebar.vue";
import SelectImg from "@/components/UI/SelectImg.vue";
import Editor from "@/components/Editor.vue";

import { ref } from 'vue';
    export default {
        name: "AdminNewsCreate",
        components: {
            AppSidebar,
            SelectImg,
            Editor
        },
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
                ],
                title: '',
                content: ref(''),
            }
        }
    }
</script>

<style scoped lang="scss">
.main {
    padding: 50px 0;
}
</style>
