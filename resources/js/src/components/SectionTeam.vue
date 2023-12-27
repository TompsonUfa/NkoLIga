<template>
    <section class="section section__team" id="team">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section__title">Наша команда</h2>
                </div>
            </div>
            <div class="row team">
                <div class="col-12 col-md-4 mb-4 team__item" v-for="item in team" :key="item.id">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <div class="team__img">
                                <img :src="item.image" :alt="item.title">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="team__content">
                                <h5 class="team__title">{{ item.title }}</h5>
                                <p class="team__desc">
                                    {{ item.desc }}
                                </p>
                            </div>
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
    &__img {
        img {
            width: 100%;
            height: 350px;
            object-fit: cover;
        }
    }
    &__title {
        text-align: center;
        font-weight: 700;
        font-size: 20px;
    }
    &__desc {
        text-align: center;
        font-size: 13px;
        font-weight: 700;
        color: gray;
    }
}
</style>
