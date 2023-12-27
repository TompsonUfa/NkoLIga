<template>
    <section class="section feedback" id="feedback">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="feedback__content">
                        <h4 class="feedback__title">Свяжитесь с нами</h4>
                    </div>
                </div>
                <div class="col-12">
                   <div class="row">
                       <div class="col-12 col-md-6 m-auto">
                           <form class="feedback__form p-md-5" action="">
                               <div class="mb-3">
                                   <label for="name" class="form-label">Имя:</label>
                                   <input type="text" class="form-control" id="name">
                               </div>
                               <div class="mb-3">
                                   <label for="email" class="form-label">Email:</label>
                                   <input type="email" class="form-control" id="email">
                               </div>
                               <div class="mb-3">
                                   <label for="phone" class="form-label">Телефон:</label>
                                   <input type="text" class="form-control" id="phone">
                               </div>
                               <div class="mb-3">
                                   <label for="text" class="form-label">Сообщение:</label>
                                   <textarea name="text" class="form-control"></textarea>
                               </div>
                               <button class="btn btn-primary feedback__btn">Отправить</button>
                           </form>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "SectionFeedback",
};
</script>

<style lang="scss">
    .feedback {
        padding: 71px 0 80px;
        position: relative;
        z-index: 1;
        background: #fff;
        &::before{
            background: url('/images/static.jpg') no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            content: "";
        }
        &::after{
            background: #6f293a70;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            content: "";
        }
        &__form{
            //width: 60%;
            margin: 0 auto 50px;
            position: relative;
            z-index: 1;
            color: #fff;
            background-color: #fff;
            border-radius: 15px;
        }
        &__content {
            text-align: center;
            width: 60%;
            margin: 0 auto 50px;
            position: relative;
            z-index: 1;
            color: #fff;
        }
        &__title {
            position: relative;
            padding-bottom: 24px;
            margin-bottom: 20px;
            font-weight: 700;
            &:after {
                position: absolute;
                content: "";
                height: 2px;
                width: 50px;
                background: #fff;
                left: 0;
                right: 0;
                margin: 0 auto;
                bottom: 0;
            }
        }
        &__form {
            color: #0d0d0d;
            input, textarea {
                &:focus {
                    border-color: var(--second-color);
                    box-shadow: none;
                }
            }
        }
        &__btn {
            background-color: var(--second-color);
            border: 1px solid transparent;
            transition: .2s ease;
            &:hover {
                color: var(--second-color);
                border: 1px solid var(--second-color);
                background-color: inherit;
            }
        }
    }

</style>
