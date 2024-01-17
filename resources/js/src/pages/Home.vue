<template>
    <app-loader v-if="this.loading"/>
    <template v-else>
        <section-home v-if="this.banners" :banners="this.banners"></section-home>
        <section-about :abouts="abouts" v-if="abouts.length"></section-about>
        <section-statistic></section-statistic>
        <section-news :news="news"></section-news>
        <section-contact :contact="this.contact"></section-contact>
        <section-team :team="team"></section-team>
    </template>
</template>

<script>
import AppLoader from "@/components/AppLoader.vue";
import SectionTeam from "@/components/SectionTeam.vue";
import SectionHome from "@/components/SectionHome.vue";
import SectionAbout from "@/components/SectionAbout.vue";
import SectionNews from "@/components/SectionNews.vue";
import axios from "axios";
import SectionStatistic from "@/components/SectionStatistic.vue";
import SectionContact from "@/components/SectionContact.vue";

export default {
    components: {AppLoader, SectionContact, SectionStatistic, SectionNews, SectionAbout, SectionHome, SectionTeam},
    data() {
        return {
            banners: [],
            news: [],
            abouts: [],
            team: [],
            contact: [],
            loading: true,
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.get('/get-data')
                    .then(res => {
                        const data = res.data;
                        this.news = data.news;
                        this.abouts = data.abouts;
                        this.team = data.team;
                        this.contact = data.contact;
                        this.banners = data.banners;
                    })
                    .catch(err => {
                        console.log(err)
                    })
                    .finally(() => {
                        this.loading = false;
                    })
            })

        }
    }
}
</script>

<style lang="scss">
.section {
    padding: 50px 0;

    &__link {
        display: inline-block;
        background-color: #222;
        font-size: 12px;
        text-transform: uppercase;
        color: #fff;
        padding: 2px 10px 1px;
        line-height: 22px;
        -webkit-transition: background-color 0.3s;
        transition: background-color 0.3s;
        cursor: pointer;
        text-decoration: none;

        &:hover {
            background-color: var(--second-color);
        }
    }

    &__title {
        margin: 20px 0;
        display: inline-block;
        padding-bottom: 10px;
        border-bottom: 3px solid var(--second-color);
    }

    &__desc {
        font-size: 15px;
        font-weight: 400;
        line-height: 24px;
        margin-bottom: 30px;
        color: #666;

        span {
            color: var(--second-color);
        }
    }
}
</style>
