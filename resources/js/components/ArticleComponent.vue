<template>
    <div class="row mt-5">
        <div class="col-12 p-3">
            <img :src="article.img" class="border rounded mx-auto d-block" alt="">
            <h5 class="mt-5">{{ article.title }}</h5>
            <p>
                <span class="tag" v-for="(tag, index) in article.tags">
                    <span v-if="tagLen == (index + 1)">{{ tag.label }}</span>
                    <span v-else="{{ tag.label }}"> | </span>
                </span>
            </p>
            <p class="card-text">{{ article.body }}</p>
            <p>Published: <i>{{ article.created_at }}</i></p>

            <div class="mt-3">
<!--                <span class="badge bg-primary">{{ likes }} <i class="far fa-thumbs-up"></i></span>-->
<!--                <span class="badge bg-danger">{{ views }} <i class="far fa-eye"></i></span>-->
                <likes-component></likes-component>
                <views-component></views-component>
            </div>
        </div>
    </div>
</template>

<script>
import {mapState} from 'vuex'

export default {
    computed: mapState({
        article: state => state.article.article,
        tagLen: state => state.article.article.tags.length,
        // views() {
        //     return this.$store.getters.articleViews
        // },
        // likes() {
        //     return this.$store.getters.articleLikes
        // }
    }),
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style scoped>

</style>
