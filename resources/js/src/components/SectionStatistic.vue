<template>
    <section class="section statistic" id="statistic">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="statistic__content">
                        <h4 class="statistic__title">Наши достижения</h4>
                    </div>
                </div>
                <div class="col-12">
                   <div class="row statistic__counters counters">
                       <div class="col-lg-3 col-md-6 col-sm-6">
                           <div class="counters__item">
                               <div class="counters__icon">
                                   <i class="fa-solid fa-check"></i>
                               </div>
                               <div class="counters__content">
                                   <h3 class="counters__title">42</h3>
                                   <p class="counters__desc">Мы организовали и успешно провели мероприятия</p>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-3 col-md-6 col-sm-6">
                           <div class="counters__item">
                               <div class="counters__icon">
                                   <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                               </div>
                               <div class="counters__content">
                                   <h3 class="counters__title">20</h3>
                                   <p class="counters__desc">Уникальных мест для ваших конференций и фестивалей в нашем распоряжении.</p>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-3 col-md-6 col-sm-6">
                           <div class="counters__item">
                               <div class="counters__icon">
                                   <i class="fa fa-users" aria-hidden="true"></i>
                               </div>
                               <div class="counters__content">
                                   <h3 class="counters__title">320</h3>
                                   <p class="counters__desc">Собрали участников, внесли вклад в создание воспоминаний и радости для каждого</p>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-3 col-md-6 col-sm-6">
                           <div class="counters__item">
                               <div class="counters__icon">
                                   <i class="fa-regular fa-calendar-check"></i>
                               </div>
                               <div class="counters__content">
                                   <h3 class="counters__title">50</h3>
                                   <p class="counters__desc">Провели множество конференций с высоким уровнем организации и качественным потоком знаний.</p>
                               </div>
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
    name: "SectionStatistic",
    props: {

    },
    methods: {

    },
};
</script>

<style lang="scss">
    .statistic {
        padding: 71px 0 80px;
        position: relative;
        z-index: 1;
        background: #fff;
        &::before{
            background: url('/images/static.jpg') no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 60%;
            content: "";
        }
        &::after{
            background: #6f293a70;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 60%;
            content: "";
        }
        &__content{
            text-align: center;
            width: 60%;
            margin: 0 auto 50px;
            position: relative;
            z-index: 1;
            color: #fff;
        }
        &__title {
            position: relative;
            padding-bottom: 24px;
            margin-bottom: 20px;
            font-weight: 700;
            &:after {
                position: absolute;
                content: "";
                height: 2px;
                width: 50px;
                background: #fff;
                left: 0;
                right: 0;
                margin: 0 auto;
                bottom: 0;
            }
        }
        &__desc {
            font-size: 14px;
            font-weight: 400;
            line-height: 24px;
            margin-bottom: 15px;
        }
    }
    .counters {
        &__item {
            text-align: center;
            background: #fff;
            padding: 40px 30px 0;
            transition: all ease-in-out .3s;
            position: relative;
            z-index: 1;
            border-radius: 10px;
        }
        i {
            font-size: 3.5rem;
            color: #ef2853;
            margin-bottom: 5px;
            transition: all ease-in-out .3s;
        }
        &__title {
            font-size: 52px;
            margin: 0;
            font-weight: 700;
        }
        &__desc {
            font-size: 15px;
            font-weight: 400;
            line-height: 24px;
            color: #666;
        }
    }
</style>
