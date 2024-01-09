<template>
    <footer class="footer" id="contact">
        <div class="container d-flex justify-content-between">
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
        },
    },
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
