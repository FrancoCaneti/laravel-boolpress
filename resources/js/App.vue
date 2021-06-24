<template>
  <div>
    <Header />
    <main>
      <div class="container">
        <h1>BLOG</h1>
        <article v-for="post in posts" :key="post.id">
          <h2>{{ post.title }}</h2>
          <div>{{ posts.created_at }}</div>
          <a href="">Read more</a>
        </article>
      </div>
    </main>
  </div>
</template>

<script>
import axios from "axios";
import Header from "./components/Header.vue";

export default {
  name: "App",
  components: {
    Header,
  },
  data() {
    return {
      posts: [],
    };
  },
  created() {
    //console.log(axios);
    this.getPosts();
  },
  methods: {
    getPosts() {
      //Get post from Api
      axios
        .get("http://127.0.0.1:8000/api/posts")
        .then((res) => {
          console.log(res.data);
          this.posts = res.data;
        })
        .cathc((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss">
@import "../sass/frontoffice/utilities.scss";

body {
  font-family: sans-serif;
}
</style>