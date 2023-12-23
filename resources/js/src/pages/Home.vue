<template>
    <main class="main">
        <section-home></section-home>
        <section-news></section-news>
        <section-about></section-about>
        <section-team></section-team>
    </main>
</template>

<script>
import SectionTeam from "@/components/SectionTeam.vue";
import SectionHome from "@/components/SectionHome.vue";
import SectionAbout from "@/components/SectionAbout.vue";
import SectionNews from "@/components/SectionNews.vue";
 export  default {
     components: {SectionNews, SectionAbout, SectionHome, SectionTeam}
 }
</script>

<style lang="scss">
.main {
    padding-top: var(--header-height);
}
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
