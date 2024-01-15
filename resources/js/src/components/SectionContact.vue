<template>
    <section class="section contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="row contact__content">
                       <div class="col-12 col-md-6 p-md-0">
                           <h4 class="contact__title">Наши контакты</h4>
                           <div class="contact__list">
                               <div class="contact__item">
                                   <div class="contact__icon">
                                       <i class="fa-solid fa-phone"></i>
                                   </div>
                                   <div class="contact__meta">
                                       <span>ТЕЛЕФОН</span>
                                       <a :href="'tel:+'+ contact.phone">+{{contact.phone}}</a>
                                   </div>
                               </div>
                               <div class="contact__item">
                                   <div class="contact__icon">
                                       <i class="fa-solid fa-location-dot"></i>
                                   </div>
                                   <div class="contact__meta">
                                       <span>Адрес</span>
                                       <p class="mb-0">{{contact.address}}</p>
                                   </div>
                               </div>
                               <div class="contact__item">
                                   <div class="contact__icon">
                                       <i class="fa-solid fa-envelope"></i>
                                   </div>
                                   <div class="contact__meta">
                                       <span>Email</span>
                                       <a :href="'mailto:' + contact.email">{{contact.email}}</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-12 col-md-6 p-md-0 d-none d-md-block">
                           <iframe class="contact__map" src="https://yandex.ru/map-widget/v1/?um=constructor%3Acf6f5836d26e5e64a59dffd541bbbfd6af2e536d0ace1e5978308912f118e1b6&amp;source=constructor" frameborder="0"></iframe>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "SectionContact",
    props: {
        contact : {
            type: Object
        }
    }
};
</script>

<style lang="scss">
    .contact {
        padding: 71px 0 80px;
        position: relative;
        z-index: 1;
        background: #fff;
        &::before{
            background: url('/public/images/static.jpg') no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            content: "";
        }
        &::after{
            background: #6f293a70;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            content: "";
        }

        &__content {
            width: 100%;
            margin: 0 auto !important;
            position: relative;
            z-index: 1;
            background-color: #fff;
            padding: 40px 30px;
        }
        &__list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        &__item {
            display: flex;
            align-items: center;
            gap: 15px;
            i {
                font-size: 20px;
                width: 30px;
                height: 30px;
                color: var(--second-color);
            }
            span {
                display: block;
                font-weight: 700;
                text-transform: uppercase;
            }
            a {
                text-decoration: none;
                color: #0d0d0d;
            }
        }
        &__map {
            border: 1px solid #fff;
            width: 100%;
            height: 500px;
        }
        &__title {
            position: relative;
            text-align: center;
            padding-bottom: 24px;
            margin-bottom: 20px;
            font-weight: 700;
        }
        &__btn {
            background-color: var(--second-color);
            border: 1px solid transparent;
            transition: .2s ease;
            &:hover {
                color: var(--second-color);
                border: 1px solid var(--second-color);
                background-color: inherit;
            }
        }
    }

</style>
