<template>
        <ul class="breadcrumb">
            <breadcrumb-item class="breadcrumb__item" :to="'/'">
                <i class="fa-solid fa-house-chimney"></i>
                Главная
            </breadcrumb-item>
            <breadcrumb-item  :key="idx"
                             class="breadcrumb__item" v-for="(item, idx) in this.breadcrumb" :to=item.to>
               {{item.text}}
            </breadcrumb-item>
        </ul>
</template>

<script>
import BreadcrumbItem from "@/components/BreadcrumbItem.vue";
export default {
    name: "Breadcrumb",
    components: {BreadcrumbItem},
    data() {
        return {
            breadcrumb: [],
        }
    },
    created() {
        this.getRoute()
    },
    watch: {
        $route(){
            this.getRoute();
        }
    },
    methods: {
        async getRoute() {
            try {
                let pathArray = this.$route.path.split("/");
                pathArray.shift();

                let breadcrumbs = await pathArray.reduce(async (breadcrumbArray, path, idx) => {
                    let matchedRoute = this.$route.matched[idx];
                    const label = typeof matchedRoute.meta.breadcrumb === 'function'
                        ? await matchedRoute.meta.breadcrumb(this.$route)
                        : matchedRoute.meta.breadcrumb || path;

                    (await breadcrumbArray).push({
                        path: path,
                        to: (await breadcrumbArray)[idx - 1]
                            ? "/" + (await breadcrumbArray)[idx - 1].path + "/" + path
                            : "/" + path,
                        text: label,
                    });

                    return breadcrumbArray;
                }, Promise.resolve([]));

                this.breadcrumb = breadcrumbs;
            } catch (error) {
                console.error('Error in getRoute:', error);
            }
        }
    },
}
</script>

<style lang="scss">
    .breadcrumb {
        list-style: none;
        margin: 0;
        padding: 15px;
        background-color: #f8f9fa;
        &__item {
            display: flex;
            font-size: 14px;
            font-weight: 600;
            text-transform: capitalize;
            font-family: Montserrat, sans-serif;
            .router-link-exact-active  {
                color: var(--second-color);
            }
            &::after{
                content: "\f105";
                font-family: 'FontAwesome';
                display: inline-block;
                position: relative;
                font-size: 14px;
                margin: 0 6px;
            }
            &:last-child {
                &::after{
                    content: none;
                }
            }

            a {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 5px;
                color: #000;
                text-decoration: none;
                transition: .2s ease;
                &:hover {
                    color: var(--second-color);
                }
                i {
                    font-size: 11px;
                }
            }
        }
    }
</style>
