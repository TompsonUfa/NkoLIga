<template>
    <section class="section section__home home" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="order-last order-md-first col-12 col-lg-6">
                    <TypingText :words="this.words" class="home__title"
                        >Наша организация<br />занимается
                    </TypingText>
                    <a href="#about" class="home__btn">
                        Изучить
                        <svg
                            version="1.1"
                            id="Layer_1"
                            xmlns:x="http://ns.adobe.com/Extensibility/1.0/"
                            xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/"
                            xmlns:graph="http://ns.adobe.com/Graphs/1.0/"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px"
                            y="0px"
                            width="96px"
                            height="96px"
                            viewBox="0 0 96 96"
                            enable-background="new 0 0 96 96"
                            xml:space="preserve"
                        >
                            <switch>
                                <foreignObject
                                    requiredExtensions="http://ns.adobe.com/AdobeIllustrator/10.0/"
                                    x="0"
                                    y="0"
                                    width="1"
                                    height="1"
                                >
                                    <i:pgfRef
                                        xlink:href="#adobe_illustrator_pgf"
                                    >
                                    </i:pgfRef>
                                </foreignObject>
                                <g i:extraneous="self">
                                    <path
                                        d="M44,12v62.344L22.828,53.172c-1.562-1.562-4.094-1.562-5.656,0c-1.562,1.562-1.562,4.095,0,5.657l28,28    c1.562,1.562,4.095,1.562,5.656,0l28-28C79.609,58.048,80,57.024,80,56c0-1.023-0.391-2.047-1.172-2.828    c-1.562-1.562-4.095-1.562-5.656,0L52,74.344V12c0-2.208-1.791-4-4-4S44,9.791,44,12z"
                                    />
                                </g>
                            </switch>
                        </svg>
                    </a>
                </div>
                <div
                    class="order-first mb-4 mb-md-0 order-md-last col-12 col-lg-6"
                >
                    <img
                        class="home__img"
                        src="/images/home.jpg"
                        alt="АНО ЛИГА"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import TypingText from "@/components/UI/TypingText.vue";
export default {
    components: {
        TypingText,
    },
    data() {
        return {
            words: [
                "Мероприятиями",
                "Семинарами",
                "Конференциями",
                "Фестивалями",
            ],
        };
    },
};
</script>

<style lang="scss">
.home {
    padding-top: 0 !important;
    height: calc(100vh - 55px);
    display: flex;
    justify-content: center;
    align-items: center;

    &__img {
        width: 100%;
        border-radius: 15px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }

    &__btn {
        display: inline-block;
        border-radius: 5px;
        padding: 10px 20px;
        margin-top: 20px;
        font-size: 16px;
        background-color: var(--second-color);
        border: none;
        opacity: 1;
        color: #fff;
        font-weight: bold;
        text-decoration: none;

        &:hover {
            background-color: var(--second-color);
            opacity: 0.7;
            color: #fff;
        }

        svg {
            width: 20px;
            height: 20px;
            fill: #fff;
        }
    }
}
</style>
