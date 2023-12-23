<template>
    <footer class="footer" id="contact">
        <div class="container d-flex justify-content-between">
            <div class="footer__left">
                <ul class="footer__contact contact">
                    <h5 class="contact__title">Контакты</h5>
                    <li class="contact__item">
                        <a class="contact__link" href="tel:+89872495612">8 (777)-777-77-77</a>
                    </li>
                    <li class="contact__item">
                        <a class="contact__link" href="mailto:ivc-bifk@yandex.ru">ivc-bifk@yandex.ru</a>
                    </li>
                </ul>
            </div>
            <div class="footer__right">
                <div class="footer__company">
                    LIGA @ 2023
                </div>
                <ul class="footer__nav">
                    <li v-for="item in links" :key="item.id">
                        <a :href="item.href">{{ item.name }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    props: {
        links: {
            type: Array,
            required: true,
        }
    }
}
</script>

<style lang="scss" scoped>
    .footer {
        padding: 100px 0;
        background-color: #000;
        &__nav {
            padding-left: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
            color: #FFF;
            list-style: none;
            a {
                color: inherit;
                text-decoration: none;
            }
        }
        &__company{
            color: #fff;
            padding-bottom: 5px;
            border-bottom: 2px solid var(--second-color);
            margin-bottom: 10px;
        }
        .contact {
            list-style: none;
            padding: 0;
            &__title {
                color: #fff;
                padding-bottom: 5px;
                border-bottom: 2px solid var(--second-color);
                margin-bottom: 10px;
            }
            &__link {
                color: #fff;
                text-decoration: none;
            }
        }
    }
</style>
