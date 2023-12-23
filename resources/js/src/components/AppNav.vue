<template>
    <nav class="navbar navbar-expand-lg p-0 w-100">
        <div class="container">
            <a href="#" class="navbar-brand">Лига</a>
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
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                        Dark offcanvas
                    </h5>
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
                            <a
                                class="nav-link"
                                aria-current="page"
                                :href="link.href"
                                >{{ link.name }}</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
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
    }
};
</script>

<style lang="scss" scoped>
 .navbar {
     a {
         &:hover {
             color: var(--second-color);
         }
     }
 }
</style>
