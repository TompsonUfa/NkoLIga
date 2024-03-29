import axios from "axios";

import PublicLayout from "@/layouts/PublicLayout.vue";
import AdminLayout from "@/layouts/AdminLayout.vue";

import Home from "@/pages/Home.vue";
import NewsIndex from "@/pages/News/Index.vue";
import ShowNews from "@/pages/News/Show.vue";
import Auth from "@/pages/Auth.vue"
import AdminBannersIndex from "@/pages/Admin/Banners/Index.vue";
import AdminBannersCreate from "@/pages/Admin/Banners/Create.vue";
import AdminBannersEdit from "@/pages/Admin/Banners/Edit.vue";
import AdminNewsIndex from "@/pages/Admin/News/Index.vue";
import AdminNewsCreate from "@/pages/Admin/News/Create.vue";
import AdminNewsEdit from "@/pages/Admin/News/Edit.vue";
import AdminAboutsIndex from "@/pages/Admin/Abouts/Index.vue";
import AdminAboutsCreate from "@/pages/Admin/Abouts/Create.vue";
import AdminAboutsEdit from "@/pages/Admin/Abouts/Edit.vue";
import AdminTeamIndex from "@/pages/Admin/Team/Index.vue";
import AdminTeamCreate from "@/pages/Admin/Team/Create.vue";
import AdminTeamEdit from "@/pages/Admin/Team/Edit.vue";
import AdminContactsIndex from "@/pages/Admin/Contacts/Index.vue";

const routes = [
    {
        path: '/login',
        component: Auth,
        name: 'login',
        meta: { breadcrumb: 'Авторизация', middleware: 'guest' },
    },
    {
        path: '/',
        component: PublicLayout,
        meta: { breadcrumb: 'Главная'},
        redirect: {name: 'home'},
        children: [
            {
                path: '',
                component: Home,
                name: 'home',
                meta: { ignoreBreadcrumb: true },
            },
        ]
    },
    {
        path: '/news',
        component: PublicLayout,
        redirect: {name: 'news'},
        meta: { breadcrumb: 'Новости' },
        children: [
            {
                path: '',
                name: 'news',
                component: NewsIndex,
            },
            {
                path: ':id',
                name: 'showNews',
                component: ShowNews,
                meta: {
                    breadcrumb: async (route) => {
                        try {
                            const response = await axios.get(`/api/news/${route.params.id}`);
                            const title = response.data.data.title;
                            return title || 'Запись';
                        } catch (error) {
                            console.error('Error fetching title from the database:', error);
                            return 'Запись';
                        }
                    }
                },
            },
        ]
    },
    {
        path: '/admin',
        component: AdminLayout,
        meta: { middleware: 'auth'},
        name: 'admin',
        redirect: { name: 'AdminNews' },
        children: [
            {
                path: 'banners',
                component: AdminBannersIndex,
                name: 'AdminBanners',
                meta: { breadcrumb: 'Список банеров'},
            },
            {
                path: 'banners/create',
                component: AdminBannersCreate,
                name: 'createBanner',
                meta: { breadcrumb: 'Создать банер'},
            },
            {
                path: 'banners/:banner/edit',
                component: AdminBannersEdit,
                name: 'editBanner',
                meta: { breadcrumb: 'Редактировать банер'},
            },
            {
                path: 'news',
                component: AdminNewsIndex,
                name: 'AdminNews',
                meta: { breadcrumb: 'Список новостей'},
            },
            {
                path: 'news/create',
                component: AdminNewsCreate,
                name: 'createNews',
                meta: { breadcrumb: 'Создать новость'},
            },
            {
                path: 'news/:news/edit',
                component: AdminNewsEdit,
                name: 'editNews',
                meta: { breadcrumb: 'Редактировать новость'},
            },
            {
                path: 'abouts',
                component: AdminAboutsIndex,
                name: 'abouts',
                meta: { breadcrumb: 'Чем мы занимаемся'},
            },
            {
                path: 'abouts/create',
                component: AdminAboutsCreate,
                name: 'createAbout',
                meta: { breadcrumb: 'Создать запись'},
            },
            {
                path: 'abouts/:about/edit',
                component: AdminAboutsEdit,
                name: 'editAbout',
                meta: { breadcrumb: 'Редактировать запись'},
            },
            {
                path: 'team',
                component: AdminTeamIndex,
                name: 'team',
                meta: { breadcrumb: 'Наша команда'},
            },
            {
                path: 'team/create',
                component: AdminTeamCreate,
                name: 'create',
                meta: { breadcrumb: 'Создать запись'},
            },
            {
                path: 'team/:team/edit',
                component: AdminTeamEdit,
                name: 'edit',
                meta: { breadcrumb: 'Редактировать запись'},
            },
            {
                path: 'contacts',
                component: AdminContactsIndex,
                name: 'contacts',
                meta: { breadcrumb: 'Наши контакты'},
            },
        ]
    }
]

export default routes;
