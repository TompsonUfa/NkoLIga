<template>
    <nav class="navbar navbar-expand-lg p-0 w-100">
        <div class="container">
            <router-link to="/" class="navbar-brand">Liga</router-link>
            <template v-if="this.$route.path === '/'">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar"
                    aria-controls="offcanvasDarkNavbar"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="offcanvas offcanvas-end text-bg-dark"
                    tabindex="-1"
                    id="offcanvasDarkNavbar"
                    aria-labelledby="offcanvasDarkNavbarLabel"
                >
                    <div class="offcanvas-header">
                        <button
                            type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li
                                class="nav-item"
                                v-for="link in links"
                                :key="link.id"
                            >
                                <a class="nav-link" :href="link.href">{{ link.name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </template>
        </div>
    </nav>
</template>

<script>
export default {
    props: {
        links: {
            type: Array,
            required: true,
        }
    },
};
</script>

<style lang="scss" scoped>
.navbar {
    a {
        &:hover {
            color: var(--second-color);
        }
    }

    .navbar-brand {
        font-weight: 700;
        letter-spacing: 1px;
    }
    .navbar-toggler{
        border: transparent;
        box-shadow: none;
    }
    .show  {

        background-color: #000 !important;
        a {
            color: #fff
        }

    }
}
</style>
