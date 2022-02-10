require('./bootstrap');

import { createApp } from 'vue';

import Posts from './components/Posts.vue';

const app = createApp({});

app.component('posts',Posts);

app.mount("#app");


