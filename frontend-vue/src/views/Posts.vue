<template>
    <v-data-table
        :headers="headers"
        :items="posts"
        :items-per-page="5"
        class="elevation-1"
    ></v-data-table>
</template>

<script>
import "@/store/index";
export default {
    name: "Posts",
    data() {
        return {
            headers: [
                {
                    text: "Title",
                    align: "left",
                    value: "title",
                },
                { text: "Body", value: "body" },
                { text: "Published", value: "published" },
                { text: "Actions", value: "actions" },
            ],
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
