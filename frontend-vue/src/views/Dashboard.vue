<template>
    <h1>Dashboard page</h1>
</template>

<script>
import "@/store/index";
export default {
    name: "Dashboard",
    data() {
        return {
            posts: [],
        };
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            this.$store.dispatch("fetchPosts").then((response) => {
                this.posts = this.$store.getters.posts;
            });
        },
    },
};
</script>
