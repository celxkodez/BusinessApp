import Vue from 'vue';
import router from './router.js';
//import App from './App';



require('./bootstrap');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
    router,
    // render: h=>h(App)
});
