<template>
    <app-loader v-if="this.loading"></app-loader>
    <template v-else>
        <div class="row">
            <div class="col-12 mb-2">
                <h1 class="title">Редактирование записи</h1>
            </div>
            <div class="col-12 mb-3">
                <select-img :image="this.form.image" @select-image="(img) => {this.form.image = img}"></select-img>
            </div>
            <div class="col-12 mb-3">
                <div class="form-group">
                    <label class="form-label">Имя</label>
                    <input v-model="form.title" type="text" class="form-control" id="title">
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="form-group">
                    <label class="form-label">Описание</label>
                    <textarea v-model="form.desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                <button @click="updateItem" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </template>
</template>

<script>
import SelectImg from "@/components/UI/SelectImg.vue";
import Editor from "@/components/Editor.vue";


import {ref} from 'vue';
import AppLoader from "@/components/AppLoader.vue";

export default {
    name: "AdminAboutsCreate",
    components: {
        AppLoader,
        SelectImg,
        Editor
    },
    data() {
        return {
            id: ref(),
            form: {
                image: ref(''),
                title: '',
                desc: '',
            },
            errors: [],
            loading: true,
        }
    },
    mounted() {
        this.id = this.$route.params.team;
        this.getItem(this.id);
    },
    methods: {
        getItem(id) {
            axios.get(`/api/admin/team/${id}`)
                .then(res => {
                    const item = res.data.data;
                    this.form.image = item.image;
                    this.form.title = item.title;
                    this.form.desc = item.desc;
                })
                .catch(err => {
                    console.log(err)
                })
                .finally(() => {
                    this.loading = false;
                })
        },
        updateItem() {
            this.errors = [];
            this.loading = true;
            const formData = new FormData();
            formData.append('title', this.form.title);
            formData.append('desc', this.form.desc);
            formData.append('image', typeof this.form.image === 'object' ? this.form.image : '')
            formData.append("_method", "put");

            axios.post(`/api/admin/team/${this.id}`, formData ,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then((res) => {
                    this.$router.push('/admin/team');
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
