<template>
  <main>
    <h2>Tutti i Posts</h2>
    <ul>
      <li v-for="post in posts" :key="post.id">{{post.title}}</li>
    </ul>
  </main>
</template>

<script>
    export default {
        name: 'Main',
        data() {
          return{
            posts: []
          }
        },
        mounted() {
          axios.get('/api/posts')
          .then((response) => {
            // handle success
            this.posts = response.data.data
          })
          .catch((error) => {
            // handle error
            console.log(error);
          })
        }
    }
</script>