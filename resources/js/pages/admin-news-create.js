import '../bootstrap';
import { createApp } from 'vue';
import AdminNewsCreate  from "@/components/admin/AdminNewsCreate.vue"

const app = createApp({});

app.component('admin-news-create', AdminNewsCreate);

app.mount('#app');
