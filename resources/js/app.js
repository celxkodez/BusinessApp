import Vue from 'vue';
import router from './router.js';
import App from './components/App';
import Home from './components/Home';
import About from './components/About';

require('./bootstrap');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
    components: {
      App, Home, About
    },
    router
});
