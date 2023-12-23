<template>
    <div>
        <template v-for="(item, index) in items">
            <div class="divider" v-if="item.type === 'divider'" :key="`divider${index}`" />
            <menu-item v-else :key="index" v-bind="item" />
        </template>
    </div>
</template>

<script>
import MenuItem from './MenuItem.vue'
export default {
    name: "MenuBar",
    components: {
        MenuItem,
    },
    props: {
        editor: {
            required: true,
        },
    },
    data() {
        return {
            items: [
                {
                    icon: 'ri-bold',
                    title: 'Bold',
                    action: () => this.editor.chain().focus().toggleBold().run(),
                    isActive: () => this.editor.isActive('bold'),
                },
                {
                    icon: 'ri-italic',
                    title: 'Italic',
                    action: () => this.editor.chain().focus().toggleItalic().run(),
                    isActive: () => this.editor.isActive('italic'),
                },
                {
                    icon: 'ri-strikethrough',
                    title: 'Strike',
                    action: () => this.editor.chain().focus().toggleStrike().run(),
                    isActive: () => this.editor.isActive('strike'),
                },
                {
                    icon: 'ri-code-view',
                    title: 'Code',
                    action: () => this.editor.chain().focus().toggleCode().run(),
                    isActive: () => this.editor.isActive('code'),
                },
                {
                    icon: 'ri-mark-pen-line',
                    title: 'Highlight',
                    action: () => this.editor.chain().focus().toggleHighlight().run(),
                    isActive: () => this.editor.isActive('highlight'),
                },
                {
                    type: 'divider',
                },
                {
                    icon: 'ri-h-1',
                    title: 'Heading 1',
                    action: () => this.editor.chain().focus().toggleHeading({ level: 1 }).run(),
                    isActive: () => this.editor.isActive('heading', { level: 1 }),
                },
                {
                    icon: 'ri-h-2',
                    title: 'Heading 2',
                    action: () => this.editor.chain().focus().toggleHeading({ level: 2 }).run(),
                    isActive: () => this.editor.isActive('heading', { level: 2 }),
                },
                {
                    icon: 'ri-paragraph',
                    title: 'Paragraph',
                    action: () => this.editor.chain().focus().setParagraph().run(),
                    isActive: () => this.editor.isActive('paragraph'),
                },
                {
                    icon: 'ri-list-unordered',
                    title: 'Bullet List',
                    action: () => this.editor.chain().focus().toggleBulletList().run(),
                    isActive: () => this.editor.isActive('bulletList'),
                },
                {
                    icon: 'ri-list-ordered',
                    title: 'Ordered List',
                    action: () => this.editor.chain().focus().toggleOrderedList().run(),
                    isActive: () => this.editor.isActive('orderedList'),
                },
                {
                    icon: 'ri-list-check-2',
                    title: 'Task List',
                    action: () => this.editor.chain().focus().toggleTaskList().run(),
                    isActive: () => this.editor.isActive('taskList'),
                },
                {
                    icon: 'ri-code-box-line',
                    title: 'Code Block',
                    action: () => this.editor.chain().focus().toggleCodeBlock().run(),
                    isActive: () => this.editor.isActive('codeBlock'),
                },
                {
                    type: 'divider',
                },
                {
                    icon: 'ri-double-quotes-l',
                    title: 'Blockquote',
                    action: () => this.editor.chain().focus().toggleBlockquote().run(),
                    isActive: () => this.editor.isActive('blockquote'),
                },
                {
                    icon: 'ri-separator',
                    title: 'Horizontal Rule',
                    action: () => this.editor.chain().focus().setHorizontalRule().run(),
                },
                {
                    type: 'divider',
                },
                {
                    icon: 'ri-text-wrap',
                    title: 'Hard Break',
                    action: () => this.editor.chain().focus().setHardBreak().run(),
                },
                {
                    icon: 'ri-format-clear',
                    title: 'Clear Format',
                    action: () => this.editor.chain()
                        .focus()
                        .clearNodes()
                        .unsetAllMarks()
                        .run(),
                },
                {
                    type: 'divider',
                },
                {
                    icon: 'ri-file-image-line',
                    title: "insert image",
                    action:() => {
                        const url = window.prompt('URL')
                        if (url) {
                            this.editor.chain().focus().setImage({ src: url }).run()
                        }
                    }
                }
            ],
        }
    },
}
</script>

<style scoped lang="scss">
.divider {
    background-color: rgba(#fff, 0.25);
    height: 1.25rem;
    margin-left: 0.5rem;
    margin-right: 0.75rem;
    width: 1px;
}
</style>
