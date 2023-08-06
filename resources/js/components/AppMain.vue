<template>
    <main class="main">
        <section-home></section-home>
        <section-about></section-about>
        <section-news></section-news>
    </main>
</template>

<script>
import SectionHome from "@/components/SectionHome.vue"
import SectionAbout from "@/components/SectionAbout.vue"
import SectionNews from "@/components/SectionNews.vue"
export default {
    components: {
        SectionHome,
        SectionAbout,
        SectionNews
    },
}
</script>

<style lang="scss" >
.main {
    padding-top: var(--header-height);
}

.section {
    padding-top: var(--header-height);

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