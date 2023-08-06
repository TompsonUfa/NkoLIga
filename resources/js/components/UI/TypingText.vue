<template>
    <h1 class="title">
        <slot></slot>
        <span :class="this.stopBlink ? 'stop-blink' : null">{{ dynamicText }}</span>
    </h1>
</template>

<script>
export default {
    data() {
        return {
            wordIndex: 0,
            charIndex: 0,
            isDeleting: false,
            dynamicText: "Конференции",
            stopBlink: false,
        }
    },
    props: {
        words: Array,
    },
    mounted() {
        this.typingEffect()
    },
    methods: {
        typingEffect() {
            const currentWord = this.words[this.wordIndex];
            const currentChar = currentWord.substring(0, this.charIndex);
            this.dynamicText = currentChar;
            this.stopBlink = true;
            if (!this.isDeleting && this.charIndex < currentWord.length) {
                this.charIndex++;
                setTimeout(this.typingEffect, 200);
            } else if (this.isDeleting && this.charIndex > 0) {
                this.charIndex--;
                setTimeout(this.typingEffect, 100);
            } else {
                this.isDeleting = !this.isDeleting;
                this.stopBlink = false;
                this.wordIndex = !this.isDeleting ? (this.wordIndex + 1) % this.words.length : this.wordIndex;
                setTimeout(this.typingEffect, 100);
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.title {
    font-size: 35px;

    span {
        position: relative;
        color: var(--first-color);

        &::before {
            content: "";
            position: absolute;
            right: -8px;
            top: 50%;
            height: 30px;
            width: 2px;
            background: var(--first-color);
            transform: translateY(-45%);
            animation: blink 0.7s infinite;
        }
    }
}

.stop-blink::before {
    animation: none !important;
}

@keyframes blink {
    50% {
        opacity: 0;
    }
}
</style>