<template>
    <div class="editor">
        <menu-bar class="editor__header" :editor="editor" />
        <editor-content class="editor__content" :editor="editor" />
        <div class="editor__footer">
            <div class="character-count" v-if="editor">
                {{ editor.storage.characterCount.characters() }}/{{ limit }} Знаков
                <br>
                {{ editor.storage.characterCount.words() }} Слов
            </div>
        </div>
    </div>

</template>

<script>

import { Editor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Highlight from '@tiptap/extension-highlight'
import TaskItem from '@tiptap/extension-task-item'
import TaskList from '@tiptap/extension-task-list'
import CharacterCount from '@tiptap/extension-character-count'
import Image from '@tiptap/extension-image'
import MenuBar from "@/components/MenuBar.vue";

export default {
    components: {
        EditorContent,
        MenuBar
    },

    props: {
        modelValue: {
            type: String,
            default: '',
        },
    },
    emits: ['update:modelValue'],

    watch: {
        modelValue(value) {

            const isSame = this.editor.getHTML() === value

            if (isSame) {
                return
            }

            this.editor.commands.setContent(value, false)
        },
    },

    data() {
        return {
            editor: null,
            limit: 2048,
        }
    },

    mounted() {
        this.editor = new Editor({
            content: this.modelValue,
            extensions: [
                StarterKit.configure({
                    history: false,
                }),
                Highlight,
                TaskList,
                TaskItem,
                CharacterCount.configure({
                    limit: this.limit,
                }),
                Image,
            ],
            onUpdate: () => {
                this.$emit('update:modelValue', this.editor.getHTML())
            },

        })
    },

    beforeUnmount() {
        this.editor.destroy()
    },
}
</script>

<style lang="scss">
.editor {
    background-color: #FFF;
    border: 3px solid #0D0D0D;
    border-radius: 0.75rem;
    color: #0D0D0D;
    display: flex;
    flex-direction: column;
    max-height: 26rem;

    &__header {
        align-items: center;
        background: #0d0d0d;
        border-bottom: 3px solid #0d0d0d;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
        display: flex;
        flex: 0 0 auto;
        flex-wrap: wrap;
        padding: 0.25rem;
    }

    &__content {
        flex: 1 1 auto;
        overflow-x: hidden;
        overflow-y: auto;
        padding: 1.25rem 1rem;
        -webkit-overflow-scrolling: touch;
    }

    &__footer {
        align-items: center;
        border-top: 3px solid #0D0D0D;
        color: #0D0D0D;
        display: flex;
        flex: 0 0 auto;
        flex-wrap: wrap;
        font-size: 12px;
        font-weight: 600;
        justify-content: space-between;
        padding: 0.25rem 0.75rem;
        white-space: nowrap;
    }

    /* Some information about the status */
    &__status {
        align-items: center;
        border-radius: 5px;
        display: flex;

        &::before {
            background: rgba(#0D0D0D, 0.5);
            border-radius: 50%;
            content: ' ';
            display: inline-block;
            flex: 0 0 auto;
            height: 0.5rem;
            margin-right: 0.5rem;
            width: 0.5rem;
        }

        &--connecting::before {
            background: #616161;
        }

        &--connected::before {
            background: #B9F18D;
        }
    }

    &__name {
        button {
            background: none;
            border: none;
            border-radius: 0.4rem;
            color: #0D0D0D;
            font: inherit;
            font-size: 12px;
            font-weight: 600;
            padding: 0.25rem 0.5rem;

            &:hover {
                background-color: #0D0D0D;
                color: #FFF;
            }
        }
    }
}

/* Give a remote user a caret */
.collaboration-cursor__caret {
    border-left: 1px solid #0D0D0D;
    border-right: 1px solid #0D0D0D;
    margin-left: -1px;
    margin-right: -1px;
    pointer-events: none;
    position: relative;
    word-break: normal;
}

/* Render the username above the caret */
.collaboration-cursor__label {
    border-radius: 3px 3px 3px 0;
    color: #0D0D0D;
    font-size: 12px;
    font-style: normal;
    font-weight: 600;
    left: -1px;
    line-height: normal;
    padding: 0.1rem 0.3rem;
    position: absolute;
    top: -1.4em;
    user-select: none;
    white-space: nowrap;
}

/* Basic editor styles */
.tiptap {
    > * + * {
        margin-top: 0.75em;
    }

    ul,
    ol {
        padding: 0 1rem;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        line-height: 1.1;
    }

    code {
        background-color: rgba(#616161, 0.1);
        color: #616161;
    }

    pre {
        background: #0D0D0D;
        border-radius: 0.5rem;
        color: #FFF;
        font-family: 'JetBrainsMono', monospace;
        padding: 0.75rem 1rem;

        code {
            background: none;
            color: inherit;
            font-size: 0.8rem;
            padding: 0;
        }
    }

    mark {
        background-color: #FAF594;
    }

    img {
        height: auto;
        max-width: 100%;
    }

    hr {
        margin: 1rem 0;
    }

    blockquote {
        border-left: 2px solid rgba(#0D0D0D, 0.1);
        padding-left: 1rem;
    }

    hr {
        border: none;
        border-top: 2px solid rgba(#0D0D0D, 0.1);
        margin: 2rem 0;
    }

    ul[data-type="taskList"] {
        list-style: none;
        padding: 0;

        li {
            align-items: center;
            display: flex;

            > label {
                flex: 0 0 auto;
                margin-right: 0.5rem;
                user-select: none;
            }

            > div {
                flex: 1 1 auto;
            }
        }
    }
}
</style>
