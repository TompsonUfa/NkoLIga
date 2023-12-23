<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col-2">Название</th>
            <th scope="col-2">Действия</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="(item, number) in items" :key="item.id">
                <th scope="row">{{number + 1}}</th>
                <td class="d-flex gap-3 align-items-center">
                    <div class="table__img">
                        <img :src="item.image" :alt="item.title">
                    </div>
                    <div>
                        {{ item.title }}
                    </div>
                </td>
                <td>
                    <div class="d-flex gap-3">
                        <div @click="$emit('delete-item', item.id)" class="table__btn btn btn-delete">
                            <i class="bi bi-trash"></i>
                        </div>
                        <a :href="''+ $route.name + '/' + item.id + '/edit'" class="table__btn btn btn-edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "AppTable",
        props: {
            items: {
                required: true,
                type: Array,
            }
        }
    }
</script>

<style scoped lang="scss">
    .table {
        &__img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            img {
                width: inherit;
                height: inherit;
                object-fit: cover;
            }
        }
        &__btn {
            font-size: 20px;
        }
        .btn-delete {
            color: var(--second-color);
        }

    }
</style>
