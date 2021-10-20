<template>
    <div class="container">
        <header>
            <h1 class="text-center">My Blog</h1>
        </header>
        <main>
            <section id="posts-list">
                <h2>Posts List</h2>
                <div v-for="post in posts" :key="post.id" class="card mb-3">
                  <div class="card-header">
                    {{ post.title }}
                  </div>
                  <div class="card-body">
                    <blockquote class="blockquote mb-0">
                      <p>{{ post.content}}</p>
                      <footer class="blockquote-footer text-right">{{ getFormattedDate(post.created_at) }}</footer>
                    </blockquote>
                  </div>
                </div>
            </section>

        </main>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'App',
        data() {
            return {
                posts: [],
            }
        },
        methods: {
            getPosts() {
                axios
                .get('http://127.0.0.1:8000/api/posts')
                .then((res) => {
                    this.posts = res.data;
                })
                .catch(err => {
                    console.error(err);
                });
            },
            getFormattedDate(date) {
                const postDate = new Date(date);
                const postDay = postDate.getDate();
                const postMonth = postDate.getMonth() + 1;
                const postYear = postDate.getFullYear();

                const formattedDate = `${postDay}/${postMonth}/${postYear}`;
                return formattedDate;
            },
        },
        created() {
            this.getPosts();
        }
    }
</script>
