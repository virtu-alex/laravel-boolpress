<template>
    <div id="post-detail-page">
        <h1>Dettaglio post</h1>
        <AppLoader v-if="isLoading" />
        <PostCard v-else-if="!isLoading && post" :post="post" />
    </div>
</template>
<script>
import PostCard from "../posts/PostCard.vue";
import AppLoader from "../AppLoader.vue";

export default {
    name: "PostDetailPage",
    components: { AppLoader, PostCard },
    data() {
        return {
            post: null,
            isLoading: false,
        };
    },
    methods: {
        fetchPost() {
            this.isLoading = true;
            axios
                .get("http://localhost:8000/api/posts/" + this.$route.params.slug)
                .then((res) => {
                    this.post = res.data;
                })
                .catch((err) => {
                    console.error(err);
                })
                .then(() => {
                    this.isLoading = false;
                });
        },
    },
    mounted() {
        this.fetchPost();
    },
};
</script>
<style lang=""></style>
