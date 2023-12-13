import '../bootstrap';
import { createApp } from 'vue';
import AdminNews  from "@/components/admin/AdminNews.vue"

const app = createApp({});

app.component('admin-news', AdminNews);
app.mount('#app');
