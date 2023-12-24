<template>
    <section-home></section-home>
    <section-news :news="news"></section-news>
    <section-about :abouts="abouts" v-if="abouts.length"></section-about>
    <section-team :team="team"></section-team>
</template>

<script>
import SectionTeam from "@/components/SectionTeam.vue";
import SectionHome from "@/components/SectionHome.vue";
import SectionAbout from "@/components/SectionAbout.vue";
import SectionNews from "@/components/SectionNews.vue";
import axios from "axios";

export default {
    components: {SectionNews, SectionAbout, SectionHome, SectionTeam},
    data() {
        return {
            news: [],
            abouts: [],
            team: [],
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
                    })
                    .catch(err => {
                        console.log(err)
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
        margin: 35px 0;
        display: inline-block;
        padding-bottom: 10px;
        border-bottom: 3px solid var(--second-color);
    }

    &__desc {
        font-size: 18px;
        margin-bottom: 35px;
        font-weight: 600;

        span {
            color: var(--second-color);
        }
    }
}
</style>
