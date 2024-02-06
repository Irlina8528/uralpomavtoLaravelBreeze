import './bootstrap';


import '../css/bootstrap.min.css'; 
import '../css/app.css'; 
import './ymaps'

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import YmapsComponent from './components/YmapsComponent.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const app = createApp({});


app.component('ymaps-component', YmapsComponent) ;
app.mount('#app');


