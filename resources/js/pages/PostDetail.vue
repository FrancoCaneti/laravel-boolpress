<template>
  <div class="container">
    <div v-if="post">
      <h1>{{ post.title }}</h1>
    </div>
    <div v-else>Loading...</div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "PostDetail",
  data() {
    return {
      post: null,
    };
  },
  created() {
    this.getPostDetails();
  },
  methods: {
    getPostDetails() {
      axios
        .get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
        .then((res) => {
          this.post = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style>
</style>