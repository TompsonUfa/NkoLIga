<template>
    <footer class="footer" id="contact">
        <div class="container">
            <div class="row">
                <div class="col col-md-3">
                    <div class="footer__title">
                        АНО Центр «ЛИГА»
                    </div>
                    <ul class="footer__nav">
                        <li v-for="item in links" :key="item.id">
                            <a :href="item.href">{{ item.name }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col col-md-3">
                    <div class="footer__title">
                        Наши соцсети
                    </div>
                    <div class="footer__socials socials">
                        <div class="socials__item">
                            <a href="ttps://vk.com/club221768247">
                                <i class="socials__icon fa-brands fa-vk"></i>
                            </a>
                        </div>
                    </div>
                </div>
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
        &__title{
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
        .socials{
            display: flex;
            gap: 10px;
            &__icon {
                font-size: 25px;
            }
        }
        a {
            transition: .3s ease;
            color: #fff;
            &:hover {
                color: var(--second-color);
            }
        }
    }
</style>
