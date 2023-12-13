<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col-2">Новость</th>
            <th scope="col-2"></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td class="d-flex gap-3 align-items-center">
                    <div class="table__img">
                        <img src="/images/news/3.webp" alt="">
                    </div>
                    <div>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi cumque delectus error
                    </div>
                </td>
                <td>
                    <div class="d-flex gap-3">
                        <div class="table__btn btn btn-delete">
                            <i class="bi bi-trash"></i>
                        </div>
                        <div class="table__btn btn btn-edit">
                            <i class="bi bi-pencil"></i>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "AppTable"
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
