<template>
    <main class="main">
        <section-home></section-home>
        <section-about></section-about>
        <section-news></section-news>
        <section-team></section-team>
        <section-project></section-project>
    </main>
</template>

<script>
import SectionHome from "@/components/SectionHome.vue";
import SectionAbout from "@/components/SectionAbout.vue";
import SectionNews from "@/components/SectionNews.vue";
import SectionTeam from "@/components/SectionTeam.vue";
import SectionProject from "@/components/SectionProject.vue";
export default {
    components: {
        SectionHome,
        SectionAbout,
        SectionNews,
        SectionTeam,
        SectionProject,
    },
};
</script>

<style lang="scss">
.main {
    padding-top: var(--header-height);
}

.section {
    padding-top: var(--header-height);
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
        border-bottom: 3px solid var(--first-color);
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
