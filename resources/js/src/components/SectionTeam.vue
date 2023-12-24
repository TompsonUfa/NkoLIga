<template>
    <section class="section section__team" id="team">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section__title">Наша команда</h2>
                </div>
            </div>
            <div class="row team">
                <div class="col-12 col-lg-6 mb-4 team__item" v-for="item in team" :key="item.id">
                    <div class="row">
                        <div class="col-12 col-lg-6 team__view pb-3 pb-lg-0">
                            <img class="team__img" :src="item.image" :alt="item.title">
                        </div>
                        <div class="col-12 col-lg-6 team__content">
                            <h5 class="team__title">{{ item.title }}</h5>
                            <p class="team__desc">
                                {{item.desc}}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        team: {
            required: true,
            type: Array,
        }
    }
};
</script>

<style lang="scss" scoped>
.team {
    &__view {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    &__img {
        width: 255px;
        height: 308px;
        object-fit: cover;
    }
    &__title {
        font-weight: 700;
        font-size: 1.25rem;
        margin: 0;
    }
    &__desc {
        font-style: normal;
        margin: 20px 0;
    }
    &__link {
        background-color: var(--second-color);
        text-decoration: none;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        transition: 0.3s ease;
        &:hover {
            opacity: 0.8;
        }
    }
}
</style>
