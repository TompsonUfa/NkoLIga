import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import Index from "@/App.vue"

app.component('index-vue', Index);
app.mount('#app');
