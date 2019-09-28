import Vue from "vue";
import VueRouter from "vue-router";
import ExampleComponent from "./components/ExampleComponent";
import Home from "./components/Home";
import About from "./components/About";

Vue.use(VueRouter);


export default new VueRouter({

    routes: [
      {
        path:'/',
        component: ExampleComponent
      },
      {
        path:'/home',
        component: Home
      },
      {
        path:'/about',
        component: About
      }
   ],
    mode: 'history'

});
