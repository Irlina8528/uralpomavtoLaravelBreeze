import './bootstrap';
import './ymaps'
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import YmapsComponent from './components/YmapsComponent.vue';
import NewOrderComponent from './components/NewOrderComponent.vue';
import NewReviewComponent from './components/NewReviewComponent.vue';
import StarRating from 'vue-star-rating';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

const app = createApp({});
app.component('ymaps-component', YmapsComponent);
app.component('new-order-component', NewOrderComponent);
app.component('new-review-component', NewReviewComponent);
app.component('star-rating', StarRating);
app.mount('#app');




