<template>
    <section class="detail-news my-3">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 p-0">
                    <breadcrumb/>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 detail-news__header">
                    <div class="detail-news__bg"
                         :style="{ backgroundImage: 'url(' + news.image + ')'}"></div>
                    <div class="detail-news__meta">
                        <div class="detail-news__category">
                            Новость
                        </div>
                        <h2 class="detail-news__title title">{{ this.news.title }}</h2>
                        <div class="detail-news__date">
                            {{formatDate(this.news.created_at)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 detail-news__content">
                    <div v-html="news.content"></div>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
 import Breadcrumb from "@/components/Breadcrumb.vue";
 import axios from "axios";
 import moment from "moment";

 export default {
     name: "showNews",
     components: {Breadcrumb},
     data(){
       return {
           news: [],
       }
     },
     mounted() {
         this.id = this.$route.params.id;
         this.getNews();

     },
     methods: {
         getNews() {
             axios.get(`/api/news/${this.id}`)
                 .then(res => {
                     this.news = res.data.data;
                     console.log(this.news)
                 })
                 .catch(err => {
                     console.log(err)
                 })
         },
         formatDate(date) {
             return moment(date).format('M MMMM YYYY');
         }
     },
 }
</script>

<style lang="scss">
    .detail-news {
        &__header {
            padding-top: 240px;
            padding-bottom: 80px;
            position: relative;
            background-color: #1b1c1e;
        }
        &__bg {
            position: absolute;
            background-attachment:fixed;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            &:after {
                content: "";
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                background: -webkit-gradient(linear, left top, left bottom, from(rgba(27, 28, 30, 0)), color-stop(90%, rgba(27, 28, 30, 0.8)));
                background: linear-gradient(180deg, rgba(27, 28, 30, 0) 0%, rgba(27, 28, 30, 0.8) 90%);
            }
        }
        &__meta {
            position: relative;
            z-index: 2;
            padding: 0 30px;
        }
        &__category {
            clear: both;
            color: #fff;
            display: inline-block;
            font-size: 13px;
            margin-bottom: 15px;
            padding: 5px 8px;
            background: linear-gradient(285deg, #f92a28 27%, #da1752 100%, #fff 100%);
            line-height: 15px;
            text-transform: uppercase;
            font-family: Montserrat, sans-serif;
            font-weight: 600;
        }
        &__title {
            font-size: 30px !important;
            color: #FFF;
            font-weight: 700;
        }
        &__date {
            color: #fff;
            font-weight: 700;
            font-size: 15px;
        }
        &__content {
            * {
                max-width: 100% !important;
            }
        }
    }
</style>
