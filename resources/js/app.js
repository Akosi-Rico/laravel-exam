import './bootstrap';
import { createApp } from 'vue';
import index from './components/index.vue';
import test1 from './components/test1.vue';
createApp({})
  .component('parent', index)
  .component('test1', test1)
  .mount('#app');


