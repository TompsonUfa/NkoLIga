<template>
    <div class="row">
        <div class="col-12 mb-2">
            <h1 class="title">Создание новости</h1>
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
                <Editor v-model="form.content"/>
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

<script>
import AppSidebar from "@/components/AppSidebar.vue";
import SelectImg from "@/components/UI/SelectImg.vue";
import Editor from "@/components/Editor.vue";


import {ref} from 'vue';

export default {
    name: "AdminNewsCreate",
    components: {
        AppSidebar,
        SelectImg,
        Editor
    },
    data() {
        return {
            form: {
                image: ref(''),
                title: '',
                content: '',
            },
            errors: [],
        }
    },
    methods: {
        createNews() {
            this.errors = [];
            axios.post('/api/admin/news', this.form, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
                .then((res) => {
                   this.$router.push('/admin');
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
