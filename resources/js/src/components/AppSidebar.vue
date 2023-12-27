<template>
    <div class="sidebar">
        <div class="sidebar__content">
            <div class="sidebar__brand">
                LIGA
            </div>
            <ul class="sidebar__list">
                <li v-for="link in links" :key="link.id" class="sidebar__item">
                    <a class="sidebar__link" :href=link.value>{{link.name}}</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AppSidebar",
        props: {
            links: {
                required: true,
                type: Array,
            }
        }
    }
</script>

<style scoped lang="scss">
    .sidebar {
        position: fixed;
        width: 300px;
        max-width: 300px;
        height: 100vh;
        background-color: #000;
        &__brand {
            width: 100%;
            text-transform: uppercase;
            color: #fff;
            font-size: 30px;
            text-align: center;
            padding: 20px 0;
        }
        &__list {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 20px;
        }
        &__item {

            &:hover {
                background-color: var(--second-color);
            }
        }
        &__link {
            display: block;
            padding: 10px 40px;
            color: #fff;
            text-decoration: none;
        }
    }
</style>
