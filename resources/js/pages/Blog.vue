<template>
  <div class="container">
    <h1>Blog</h1>

    <article v-for="post in posts" :key="post.id">
      <h2>{{ post.title }}</h2>
      <div>{{ /*formatDate(*/ post.create_at }}</div>
      <!--<a href="">Read more</a>-->
      <router-link :to="{ name: 'post-detail', params: { slug: post.slug } }"
        >Read more</router-link
      >
    </article>
    <section class="navigation">
      <button
        v-show="pagination.current > 1"
        @click="getPosts(pagination.current - 1)"
      >
        Prev
      </button>

      <button
        v-for="i in pagination.last"
        :key="`page-${i}`"
        @click="getPosts(i)"
        :class="{ 'active-page': i == pagination.current }"
      >
        {{ i }}
      </button>

      <button
        v-show="pagination.current < pagination.last"
        @click="getPosts(pagination.current + 1)"
      >
        Next
      </button>
    </section>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Blog",
  data() {
    return {
      posts: [],
      pagination: {},
    };
  },
  created() {
    //console.log(axios);
    this.getPosts();
  },
  methods: {
    getPosts(page = 1) {
      //Get post from Api
      axios
        .get(`http://127.0.0.1:8000/api/posts?page=${page}`)
        .then((res) => {
          console.log(res.data);
          this.posts = res.data.data;
          this.pagination = {
            current: res.data.current_page,
            last: res.data.last_page,
          };
        })
        .catch((err) => {
          console.log(err);
        });
    },
    /*formatDate(date) {
      const postDate = new Date(date);
      let day = postDate.getDate();
      let month = postDate.getMonth() + 1;
      let year = postDate.getFullYear();

      return `${day}/${month}/${year}`;
    },*/
  },
};
</script>

<style>
</style>