import '../bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import Index from "@/components/auth/AuthIndex.vue"

app.component('auth-index', Index);
app.mount('#app');
