<template>
    <section class="section section__project" id="project">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section__title">Наши проекты</h2>
                </div>
            </div>
            <div class="row project">
                <div class="col-lg-4 project__item">
                    <div class="project__img">
                        <img src="/images/project/1.jpeg" alt="Проект 1" />
                    </div>
                    <div class="project__content">
                        <h3 class="project__title">Lorem ipsum dolor sit</h3>
                        <a href="/project" class="project__link"></a>
                    </div>
                </div>
                <div class="col-lg-4 project__item">
                    <div class="project__img">
                        <img src="/images/project/2.jpeg" alt="Проект 2" />
                    </div>
                    <div class="project__content">
                        <h3 class="project__title">Lorem ipsum dolor sit</h3>
                        <a href="/project" class="project__link"></a>
                    </div>
                </div>
                <div class="col-lg-4 project__item">
                    <div class="project__img">
                        <img src="/images/project/3.jpeg" alt="Проект 3" />
                    </div>
                    <div class="project__content">
                        <h3 class="project__title">Lorem ipsum dolor sit</h3>
                        <a href="/project" class="project__link"></a>
                    </div>
                </div>
                <div class="col-lg-4 project__item">
                    <div class="project__img">
                        <img src="/images/project/4.jpeg" alt="Проект 4" />
                    </div>
                    <div class="project__content">
                        <h3 class="project__title">Lorem ipsum dolor sit</h3>
                        <a href="/project" class="project__link"></a>
                    </div>
                </div>
                <div class="col-lg-4 project__item">
                    <div class="project__img">
                        <img src="/images/project/5.jpeg" alt="Проект 5" />
                    </div>
                    <div class="project__content">
                        <h3 class="project__title">Lorem ipsum dolor sit</h3>
                        <a href="/project" class="project__link"></a>
                    </div>
                </div>
                <div class="col-lg-4 project__item">
                    <div class="project__img">
                        <img src="/images/project/6.jpeg" alt="Проект 6" />
                    </div>
                    <div class="project__content">
                        <h3 class="project__title">Lorem ipsum dolor sit</h3>
                    </div>
                    <a href="/project" class="project__link"></a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.project {
    &__item {
        position: relative;
        height: 300px;
        padding: 20px;
        overflow: hidden;
        cursor: pointer;
        &:hover {
            .project__content {
                transform: translateY(0%) translateX(-50%);
            }
            .project__img {
                img {
                    transform: scale3d(1.1, 1.1, 1);
                    -webkit-transform: scale3d(1.1, 1.1, 1);
                }
            }
        }
    }
    &__img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        img {
            width: inherit;
            height: inherit;
            object-fit: cover;
            transition: transform 0.3s;
            -webkit-transition: transform 0.3s;
        }
    }
    &__content {
        width: 85%;
        padding: 10px 15px;
        position: absolute;
        bottom: 20px;
        background-color: #fff;
        left: 50%;
        transform: translateY(200%) translateX(-50%);
        border-radius: 5px;
        transition: transform 0.3s;
        -webkit-transition: transform 0.3s;
    }
    &__title {
        font-size: 17px;
    }
    &__link {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        height: 100%;
    }
}
</style>
