<template>
    <app-loader v-if="this.loading"></app-loader>
    <template v-else>
        <div class="row">
            <div class="col-12 mb-2">
                <h1 class="title">Создание баннера</h1>
            </div>
            <div class="col-12 mb-3">
                <select-img @select-image="(img) => {this.form.image = img}"></select-img>
            </div>
            <div class="col-12 mb-3">
                <div class="form-group">
                    <label class="form-label">Название</label>
                    <input v-model="form.title" type="text" class="form-control" id="title">
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="form-group">
                    <label class="form-label">Описание</label>
                    <input v-model="form.desc" type="text" class="form-control" id="desc">
                </div>
            </div>
            <div class="col-12" v-if="this.errors.length > 0">
                <div class="alert alert-danger" role="alert">
                    <ul class="errors">
                        <li v-for="(error, key) in errors" :key=key>
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <button @click="createNews" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </template>
</template>

<script>
import AppSidebar from "@/components/AppSidebar.vue";
import SelectImg from "@/components/UI/SelectImg.vue";
import Editor from "@/components/Editor.vue";


import {ref} from 'vue';
import AppLoader from "@/components/AppLoader.vue";

export default {
    name: "AdminNewsCreate",
    components: {
        AppLoader,
        AppSidebar,
        SelectImg,
        Editor
    },
    data() {
        return {
            form: {
                image: ref(''),
                title: '',
                desc: '',
            },
            errors: [],
            loading: false,
        }
    },
    methods: {
        createNews() {
            this.errors = [];
            this.loading = true;
            axios.post('/api/admin/banners', this.form, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
                .then((res) => {
                   this.$router.push('/admin/banners');
                })
                .catch((err) => {
                    if (err.response && err.response.status === 422) {
                        for (const field in err.response.data.errors) {
                            this.errors.push(err.response.data.errors[field][0]);
                        }
                    } else {
                        console.error(err);
                    }
                })
                .finally(() => {
                    this.loading = false;
                })
        }
    }
}
</script>

<style scoped lang="scss">

.errors {
    list-style: none;
    margin: 0;
    padding: 0;
}
</style>
