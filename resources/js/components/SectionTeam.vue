<template>
    <section class="section section__team" id="team">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section__title">Наша команда</h2>
                </div>
                <div class="col-12 team">
                    <div class="team__item p-4">
                        <div class="team__img mb-3">
                            <img
                                src="/images/team/1.jpeg"
                                alt="Первый сотрудник"
                            />
                        </div>
                        <h4 class="team__title mb-3">Виктори Лоунс</h4>
                        <p class="team__desc">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Cum est deleniti accusantium ratione.
                        </p>
                    </div>
                    <div class="team__item p-4">
                        <div class="team__img mb-3">
                            <img
                                src="/images/team/2.jpg"
                                alt="Первый сотрудник"
                            />
                        </div>
                        <h4 class="team__title mb-3">Алиса Бонс</h4>
                        <p class="team__desc">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Cum est deleniti accusantium ratione.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.team {
    display: flex;
    justify-content: center;
    gap: 20px;

    &__item {
        width: 350px;
        min-height: 400px;
        overflow: hidden;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }
    &__img {
        width: 100%;
        height: 100%;
        max-height: 200px;
        img {
            width: inherit;
            height: inherit;
            object-fit: cover;
        }
    }
    &__title {
        color: var(--first-color);
    }
}
</style>
