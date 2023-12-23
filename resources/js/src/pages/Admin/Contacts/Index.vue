<template>
    <div class="row">
        <div class="col-12 mb-2">
            <h1 class="title">Наши контакты</h1>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <label class="form-label">Телефон</label>
                <input v-model="form.phone" type="text" class="form-control" id="phone">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <label class="form-label">Email</label>
                <input v-model="form.email" type="email" class="form-control" id="email">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <label class="form-label">Адрес</label>
                <textarea v-model="form.address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
            <button @click="update" class="btn btn-primary">Обновить</button>
        </div>
    </div>
</template>

<script>
import SelectImg from "@/components/UI/SelectImg.vue";
import Editor from "@/components/Editor.vue";


import {ref} from 'vue';

export default {
    name: "AdminAboutsCreate",
    components: {
        SelectImg,
        Editor
    },
    data() {
        return {
            id: ref(),
            form: {
                id: '',
                phone: '',
                address: '',
                email: '',
            },
            created: false,
            errors: [],
        }
    },
    mounted() {
        this.getItem();
    },
    methods: {
        getItem() {
            axios.get(`/api/admin/contacts`)
                .then(res => {
                    if(res.data === ''){
                        this.created = false;
                    } else {
                        const item = res.data.data;
                        this.form.id = item.id;
                        this.form.phone = item.phone;
                        this.form.address = item.address;
                        this.form.email = item.email;
                        this.created = true;
                    }

                })
                .catch(err => {
                    console.log(err)
                })
        },
        update() {
            this.errors = [];

            if (this.created) {
                axios.put(`/api/admin/contacts/${this.form.id}`, this.form)
                    .then((res) => {
                        this.$router.push('/admin/contacts');
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
            } else {
                axios.post('/api/admin/contacts', this.form)
                    .then(res => {

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
}
</script>

<style scoped lang="scss">

.errors {
    list-style: none;
    margin: 0;
    padding: 0;
}
</style>
